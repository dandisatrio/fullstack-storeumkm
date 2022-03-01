<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardSettingController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        return view('pages.shop.dashboard-account', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        if($request->password)
        {
            $data['password'] =  bcrypt($request->password);
        }
        else 
        {
            unset($data['password']);
        }
        
        $item->update($data);
        
        $item_shop = Shop::where('users_id', Auth::user()->id)->first();
        
        $data['photo'] = $request->file('photo')->store('assets/shop', 'public');

        $data['slug'] = Str::slug($request->name);
        
        $item_shop->update($data);

        return redirect()->route($redirect);
    }
}
