<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() 
    {
        $transaction_success = Transaction::where('transaction_status', 'SUCCESS')->whereHas('user', function($query) {
                                $query->where('id', Auth::user()->id);
                            })->get();

        $expenditure = $transaction_success->reduce(function ($carry, $item) {
            return $carry + $item->total_price;
        });

        $transaction = Transaction::whereHas('user', function($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        return view('pages.dashboard', [
            'transaction_count' => $transaction->count(),
            'transaction_data' => $transaction,
            'expenditure' => $expenditure
        ]);
    }
}
