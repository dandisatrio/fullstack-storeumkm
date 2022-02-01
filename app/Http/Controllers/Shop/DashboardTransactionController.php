<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    public function index() {
        return view('pages.shop.dashboard-transactions');
    }

    public function detail() {
        return view('pages.shop.dashboard-transactions-details');
    }
}
