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
        $transaction_success = TransactionDetail::with(['product.shop.user'])->whereHas('product.shop.user', function($query) {
            $query->where('id', Auth::user()->id);
        })->where('shipping_status', 'SUCCESS')->get();

        $revenue = $transaction_success->reduce(function ($carry, $item) {
            return $carry + $item->price;
        });

        // $transaction = TransactionDetail::with(['product.shop.user'])->whereHas('product.shop.user', function($query) {
        //     $query->where('id', Auth::user()->id);
        // })->get();

        $transaction_data = Transaction::with(['transactionDetail.product.shop.user'])->whereHas('transactionDetail.product.shop.user', function($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        // return dd($transaction);

        return view('pages.shop.dashboard', [
            'transaction_count' => $transaction_data->count(),
            'revenue' => $revenue,
            'transaction_data' => $transaction_data,
        ]);
    }
}
