<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index() 
    {
        $transaction = Transaction::whereHas('user', function($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        return view('pages.dashboard-transactions', [
            'transaction_data' => $transaction,
        ]);
    }

    public function detail(Request $request, $id) 
    {
        $transaction = Transaction::with(['transactionDetail'])->findOrFail($id);

        $products = TransactionDetail::with(['transaction.user','product.galleries'])->where('transactions_id', $id)->get();

        $shippings_status = TransactionDetail::where('transactions_id', $id)->value('shipping_status');

        $resi_code = TransactionDetail::where('transactions_id', $id)->value('resi');

        // return dd($products);

        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction,
            'products' => $products,
            'shippings_status' => $shippings_status,
            'resi_code' => $resi_code
        ]);
    }
}
