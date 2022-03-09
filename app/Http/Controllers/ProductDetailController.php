<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\TestimonialProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends Controller
{
    public function index(Request $request, $id) 
    {
        $product = Product::with(['galleries', 'shop'])->where('slug', $id)->firstOrFail();
        $reviews = TestimonialProduct::where('products_id', $product->id)->get();

        return view('pages.product-detail', [
            'product' => $product,
            'reviews' => $reviews
        ]);
    }

    public function add(Request $request, $id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
