<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reserve;
use App\Models\Shop;
use Carbon\Carbon;
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

    public function show($reserve_id)
    {
        $reserve = Reserve::find($reserve_id);
        $shop = $reserve->shop;
        if ($reserve) {
            // お店の予約があれば
            return view('pages.edit', compact('shop', 'reserve'));
            # code...
        } else {
            return view('pages.mypage');
        }
    }

    public function update($reserve_id, Request $request)
    {

        $reserve = Reserve::find($reserve_id);
        $shop = $reserve->shop;
        $user_id = Auth::id();
        $date = $request->input('date');
        $time = $request->input('time');
        $num_of_people = $request->input('num_of_people');

        // 日付と時間を合わせる処理
        $date_time = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);
        if ($reserve) {
            $reserve->update([
                "user_id" => $user_id,
                "shop_id" => $shop['id'],
                "date_time" => $date_time,
                "num_of_people" => intval($num_of_people),
            ]);
            session()->flash('message', '予約を変更しました。');
            return redirect()->route('mypage');
        } else {
            return view('pages.mypage');
        }
    }
}
