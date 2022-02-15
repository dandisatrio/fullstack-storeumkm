<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries','category'])
                            ->whereHas('shop.user', function($query) {
                                $query->where('id', Auth::user()->id);})
                            ->get();

        return view('pages.shop.dashboard-products', [
            'products' => $products,
        ]);
    }

    public function detail(Request $request, $id)
    {
        $product = Product::with(['galleries', 'shop.user', 'category'])->findOrFail($id);
        $categories = Category::all();

        $shop_id = Product::with(['shop'])
                            ->whereHas('shop.user', function($query) {
                                $query->where('id', Auth::user()->id);})
                            ->first()
                            ->shop->id;

        return view('pages.shop.dashboard-products-details', [
            'product' => $product,
            'categories' => $categories,
            'shop_id' => $shop_id,
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-shop-product-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id) 
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-shop-product-details', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        $shop_id = Product::with(['shop'])
                            ->whereHas('shop.user', function($query) {
                                $query->where('id', Auth::user()->id);})
                            ->first()
                            ->shop->id;

        return view('pages.shop.dashboard-products-create', [
            'categories' => $categories,
            'shop_id' => $shop_id,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];

        ProductGallery::create($gallery);

        // return dd($data);

        return redirect()->route('dashboard-shop-products');
    } 

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();        

        $item = Product::findOrFail($id);
        
        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('dashboard-shop-products');
    }
}
