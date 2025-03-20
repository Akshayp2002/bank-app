<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        $account = Auth::user()->account;
        return view('admin.deposit', compact('account'));
    }

    public function deposit(Request $request)
    {
        try {
            $request->validate([
                'amount' => 'required|numeric|min:0.01',
            ]);
            $user = Auth::user();
            // Fetch the user's account
            $account = Account::where('user_id', $user->id)->first();

            if (!$account) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Account not found.',
                ], 404);
            }
            // Get the deposit amount from the request
            $amount = $request->amount;

            // Update the account balance
            $account->balance += $amount;
            $account->save();

            // Record the transaction in the transactions table
            Transaction::create([
                'user_id'     => $user->id,
                'type'        => 'deposit',
                'amount'      => $amount,
                'receiver_id' => null,
                'description' => $request->description ?? 'Deposit to account',
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'Amount deposited successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Something went wrong. Please try again.');
        }
    }
}
