<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Reserve;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review(ReviewRequest $request, $reserve_id)
    {
        $reserve = Reserve::find($reserve_id);
        $user_id = Auth::id();
        $rating = $request->input('rating');
        $comment = $request->input('comment');
        Review::create([
            "user_id" => $user_id,
            "shop_id" => $reserve['shop_id'],
            "reserve_id" => $reserve_id,
            "rating" => $rating,
            "comment" => $comment,
        ]);
        session()->flash('message', 'レビューを投稿しました。');
        return redirect()->route('mypage');
    }
}
