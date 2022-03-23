<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() 
    {
        $shops = Shop::paginate(32);
        return view('pages.shop', [
            'shops' => $shops
        ]);
    }

    public function detail(Request $request, $id) 
    {
        $shop = Shop::all()->where('slug', $id)->firstOrFail();
        $products = Product::with(['galleries', 'shop'])->where('shops_id', $shop->id)->paginate(16);
        $user = User::find($shop->users_id);

        return view('pages.shop-detail', [
            'shop' => $shop,
            'products' => $products,
            'user' => $user
        ]);
    }
}
