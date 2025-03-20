<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
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
            'amount'          => 'required|numeric|min:0.01',
            'recipient_email' => 'required|email|exists:users,email',
        ]);
        $senderAccount = Auth::user()->account;
        $recipientUser = User::where('email', $request->recipient_email)->first();

        // Check if the recipient exists
        if (!$recipientUser) {
            return redirect()->route('admin.transfer.form')->withErrors(['error' => 'Recipient not found.']);
        }

        // Fetch the recipients account
        $recipientAccount = $recipientUser->account;

        // Check if the sender has enough balance
        if ($senderAccount->balance < $request->amount) {
            return redirect()->route('admin.transfer.form')->withErrors(['error' => 'Insufficient balance for the transfer.']);
        }

        // Deduct from the sender's account
        $senderAccount->balance -= $request->amount;
        $senderAccount->save();

        // Add to the recipient's account
        $recipientAccount->balance += $request->amount;
        $recipientAccount->save();

        // Record the senders transaction
        Transaction::create([
            'user_id'     => Auth::id(),
            'type'        => 'transfer',
            'amount'      => $request->amount,
            'receiver_id' => $recipientAccount->user_id,
            'description' => 'Transfer to ' . $recipientUser->email,
        ]);

        // Record the recipients transaction
        Transaction::create([
            'user_id'     => $recipientAccount->user_id,
            'type'        => 'transfer',
            'amount'      => $request->amount,
            'receiver_id' => null,
            'description' => 'Transfer from ' . $senderAccount->account_number,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Transfer successful!');
    }
}
