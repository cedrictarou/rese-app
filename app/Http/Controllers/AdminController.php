<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function shopAdmin()
    {
        return view('pages.shop-admin');
    }

    public function admin()
    // 管理者のみアクセス可能
    {
        $shops = Shop::with('user')->get();
        return view('pages.admin', compact('shops'));
    }
}
