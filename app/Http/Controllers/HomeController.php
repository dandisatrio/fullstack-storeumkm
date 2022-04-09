<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shops = Shop::take(6)->get();
        $products = Product::with(['galleries'])->take(8)->orderBy('created_at','desc')->get();

        return view('pages.home', [
            'shops' => $shops,
            'products' => $products
        ]);
    }

    public function search()
    {
        $products = Product::latest();

        if(request('search')) {
            $products->where('name', 'like', '%' . request('search') . '%');
        }

        return view('pages.search', [
            'products' => $products->get()
        ]);
    }
}
