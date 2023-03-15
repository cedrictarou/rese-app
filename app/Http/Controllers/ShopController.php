<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Reserve;
use App\Models\Shop;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            // ログインしていない場合
            $shops = Shop::all();
            return view('pages.index', compact('shops'));
        }
        // ログインしている場合
        $user_id = Auth::id();
        // 各お店のいいね数とログイン中のユーザーがいいねを押しているかどうかを判定
        $shops = Shop::with(['likes' => function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        }])->with('likes')->get()->map(function ($shop) {
            $shop->is_liked = $shop->likes->isNotEmpty();
            return $shop;
        });
        return view('pages.index', compact('shops'));
    }

    public function detail($shop_id)
    {
        $shop = Shop::find($shop_id);
        return view('pages.detail', compact('shop'));
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
}
