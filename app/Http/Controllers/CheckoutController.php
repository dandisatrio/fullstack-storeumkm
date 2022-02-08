<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request) 
    {
        $user = Auth::user();
        $user->update($request->except('total_price'));

        $code = 'CODE-' . mt_rand(0000,9999);
        $carts = Cart::with(['product','user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'shipping_price' => 30000,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000,9999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'quantity' => 0,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx
            ]);
        };

        Cart::where('users_id', Auth::user()->id)->delete();

        return redirect()->route('success');
    }
}
