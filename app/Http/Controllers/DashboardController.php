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
        $transaction = Transaction::whereHas('user', function($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        $expenditure = $transaction->reduce(function ($carry, $item) {
            return $item->total_price;
        });

        return view('pages.dashboard', [
            'transaction_count' => $transaction->count(),
            'expenditure' => $expenditure
        ]);
    }
}
