<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TestimonialProduct;
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

        $products = TransactionDetail::with(['transaction','product.galleries'])->where('transactions_id', $id)->get();

        // return dd($products);

        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction,
            'products' => $products
        ]);
    }

    public function review(Request $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        TestimonialProduct::create($data);

        // return dd($data);

        return redirect()->back();
    }
}
