<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        return view('pages.shop');
    }

    public function detail() {
        return view('pages.shop-detail');
    }
}
