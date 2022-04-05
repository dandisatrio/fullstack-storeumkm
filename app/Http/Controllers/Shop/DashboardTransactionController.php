<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class DashboardTransactionController extends Controller
{
    public function index() 
    {
        $transaction_data = Transaction::with(['transactionDetail.product.shop.user'])->whereHas('transactionDetail.product.shop.user', function($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        return view('pages.shop.dashboard-transactions', [
            'transaction_data' => $transaction_data,
        ]);
    }

    public function detail(Request $request, $id) 
    {
        $products = TransactionDetail::with(['transaction','product.galleries'])->where('transactions_id', $id)->get();

        $transaction = Transaction::with(['transactionDetail'])->findOrFail($id);

        return view('pages.shop.dashboard-transactions-details', [
            'products' => $products,
            'transaction' => $transaction,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-shop-transaction-details', $id);
    }

    public function generate_pdf()
    {
    	$transactions = Transaction::with(['transactionDetail.product.shop.user'])->whereHas('transactionDetail.product.shop.user', function($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        $print = PDF::loadView('pages.shop.dashboard-transactions-print', [
            'transactions' => $transactions,
        ]);

        return $print->stream();
    }
}
