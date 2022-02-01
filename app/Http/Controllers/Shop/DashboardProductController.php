<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index()
    {
        return view('pages.shop.dashboard-products');
    }

    public function detail()
    {
        return view('pages.shop.dashboard-products-details');
    }

    public function create()
    {
        return view('pages.shop.dashboard-products-create');
    }
}
