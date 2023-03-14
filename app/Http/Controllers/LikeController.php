<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($shop_id)
    {
        $user_id = Auth::id();
        $like = Like::create([
            "user_id" => $user_id,
            "shop_id" => intval($shop_id)
        ]);
        // return redirect()->route('index');
        return response()->json([
            "message" => "success",
            "like" => $like,
        ]);
    }
}
