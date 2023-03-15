<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($shop_id)
    {
        if (!Auth::check()) {
            redirect()->route('login');
        }

        $user_id = Auth::id();
        Like::create([
            "user_id" => $user_id,
            "shop_id" => intval($shop_id)
        ]);
        return response()->noContent();
    }

    public function unlike($shop_id)
    {
        if (!Auth::check()) {
            redirect()->route('login');
        }

        $user_id = Auth::id();
        $like = Like::where('user_id', $user_id)->where('shop_id', intval($shop_id))->first();

        if (!$like) {
            return response()->json([
                "message" => "like not found"
            ], 404);
        }

        $like->delete();

        return response()->noContent();
    }
}
