<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    public function account()
    {
        return view('pages.shop.dashboard-account');
    }
}
