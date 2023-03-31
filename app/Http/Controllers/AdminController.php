<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function shopAdmin()
    {
        return view('pages.shop-admin');
    }
    public function admin()
    {
        return view('pages.admin');
    }
}
