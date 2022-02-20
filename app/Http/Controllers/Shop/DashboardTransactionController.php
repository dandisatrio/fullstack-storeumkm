<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $data = $request->all();        

        // $item = TransactionDetail::with(['transaction'])->where('transactions_id', $id)->get();

        // $data['shipping_status'] = $request->shipping_status;

        // $item->update($data);

        // $item = Transaction::with(['transactionDetail'])->findOrFail($id);                                                                                                                                                       

        // $item = Transaction::with(['transactionDetail'])->whereHas('transactionDetail', function($query) use ($id) {
        //     $query->where('transactions_id', $id);
        // })->findOrFail($id);

        // $item->update($data);
        
        // return dd($item);

        // return redirect()->route('dashboard-shop-transaction-details', $id);
    }
}
