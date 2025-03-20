<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function accountStatement()
    {
        // Fetch the transactions for the authenticated user, paginated (latest first)
        $transactions = Transaction::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc') // Order by latest first
            ->paginate(10); // Paginate 10 transactions per page

        return view('admin.statement', compact('transactions'));
    }
}
