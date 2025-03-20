<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawlController extends Controller
{
    public function index()
    {
        $account = Auth::user()->account;
        return view('admin.withdrawl', compact('account'));
    }

    // Handle the withdrawal logic
    public function withdrawal(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);
        $user    = Auth::user();
        $account = $user->account;
        $amount = $request->amount;

        // Check if the user has sufficient balance
        if ($account->balance < $amount) {
            return redirect()->back()->withErrors(['error' => 'Insufficient balance.']);
        }
        // Update the account balance
        $account->balance -= $amount;
        $account->save();

        // Record the withdrawal transaction
        Transaction::create([
            'user_id'     => $user->id,
            'type'        => 'withdrawal',
            'amount'      => $amount,
            'receiver_id' => null,
            'description' => $request->description ?? 'Withdrawal from account',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Withdrawal successful! Your new balance is ' . $account->balance);
    }
}
