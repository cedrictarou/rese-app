<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $like_shops = Like::where('user_id', $user_id)->with('shop')->get();

        $reserves = Reserve::where('user_id', $user_id)->with('shop')->get();

        return view('pages.mypage', compact('like_shops', 'reserves'));
    }
}
