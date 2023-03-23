<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Reserve;
use App\Models\Review;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ShopService;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // search用
        $search = $request->only(['genre', 'region', 'words']);

        // 検索フォームのselect用
        $regions = ShopService::getRegions();
        $genres = ShopService::getGenres();

        // 検索キーを残しておく
        $request->session()->put('search_key', $search);

        if (!Auth::check()) {
            // ログインしていない場合
            $shops = Shop::search($search)->with('reviews')->get();
        } else {
            // ログインしている場合
            $user_id = Auth::id();
            // 各お店のいいね数とログイン中のユーザーがいいねを押しているかどうかを判定
            $shops = Shop::search($search)->with('reviews')->get();
        }

        return view('pages.index', compact('shops', 'genres', 'regions'));
    }

    public function detail($shop_id)
    {
        $shop = Shop::find($shop_id);

        // お店ごとのコメントやratingを取得する
        $reviews = Review::where('shop_id', $shop_id)->get();
        return view('pages.detail', compact('shop', 'reviews'));
    }

    public function reservation(Request $request, $shop_id)
    {
        $user_id = Auth::id();
        $date = $request->input('date');
        $time = $request->input('time');
        $num_of_people = $request->input('num_of_people');
        // 日付と時間を合わせる処理
        $date_time = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);
        Reserve::create([
            "user_id" => $user_id,
            "shop_id" => $shop_id,
            "date_time" => $date_time,
            "num_of_people" => $num_of_people,
        ]);

        return redirect()->route('done');
    }
    public function done()
    {
        return view('pages.done');
    }

    public function cancel($reserve_id)
    {
        Reserve::find($reserve_id)->delete();
        session()->flash('message', '予約をキャンセルしました。');
        return redirect()->route('index');
    }

    public function review(ReviewRequest $request, $shop_id)
    {
        $user_id = Auth::id();
        $rating = $request->input('rating');
        $comment = $request->input('comment');
        Review::create([
            "user_id" => $user_id,
            "shop_id" => $shop_id,
            "rating" => $rating,
            "comment" => $comment,
        ]);
        session()->flash('message', 'レビューを投稿しました。');
        return redirect()->route('detail', ['shop_id' => $shop_id]);
    }
}
