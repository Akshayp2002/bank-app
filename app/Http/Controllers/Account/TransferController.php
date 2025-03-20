<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {
        $account = Auth::user()->account;
        return view('admin.transfer', compact('account'));
    }

    // Handle the transfer logic
    public function transfer(Request $request)
    {
        $request->validate([
            'amount'                   => 'required|numeric|min:0.01',
            'recipient_account_number' => 'required|numeric|exists:accounts,account_number',
        ]);

        // Fetch the senders account
        $senderAccount = Auth::user()->account;

        // Fetch the recipient's account
        $recipientAccount = Account::where('account_number', $request->recipient_account_number)->first();

        // Check if the sender has enough balance
        if ($senderAccount->balance < $request->amount) {
            return redirect()->route('admin.transfer.form')->withErrors(['error' => 'Insufficient balance for the transfer.']);
        }

        // Deduct from the senders account
        $senderAccount->balance -= $request->amount;
        $senderAccount->save();

        // Add to the recipients account
        $recipientAccount->balance += $request->amount;
        $recipientAccount->save();

        // Record the senders transaction
        Transaction::create([
            'user_id'     => Auth::id(),
            'type'        => 'transfer',
            'amount'      => $request->amount,
            'receiver_id' => $recipientAccount->user_id,                                   // The user receiving the funds
            'description' => 'Transfer to account ' . $recipientAccount->account_number,
        ]);

        // Record the recipient's transaction
        Transaction::create([
            'user_id'     => $recipientAccount->user_id,
            'type'        => 'transfer',
            'amount'      => $request->amount,
            'receiver_id' => null,
            'description' => 'Transfer from account ' . $senderAccount->account_number,
        ]);

        // Redirect back with success message
        return redirect()->route('admin.dashboard')->with('success', 'Transfer successful!');
    }
}
