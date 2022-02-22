<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

       
        
        $transaction = Transaction::with(['transactionDetail.product.shop.user'])->whereHas('transactionDetail.product.shop.user', function ($query) {
            $query->where('id', Auth::user()->id);
        })->where('shipping_status', 'success')->sum('total_price');

        if ($transaction == null) {
            $total = 0;
        } else {
            $total = $transaction - 30000;
        }

        $transaction_data = Transaction::with(['transactionDetail.product.shop.user'])->whereHas('transactionDetail.product.shop.user', function($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        return view('pages.shop.dashboard', [
            'transaction_count' => $transaction_data->count(),
            'revenue' => $total,
            'transaction_data' => $transaction_data,
        ]);
    }
}
