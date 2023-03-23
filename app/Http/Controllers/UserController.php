<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Models\Like;
use App\Models\Reserve;
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
        // $reviews = $shop->reviews;

        if ($reserve) {
            // お店の予約があれば

            // 予約な時間を作成する
            $now = Carbon::now(); //現在時刻
            $timeOptionsForReservation = [];
            for ($hour = $now->hour; $hour <= 20; $hour++) {
                for ($minute = 0; $minute <= 30; $minute += 30) {
                    $time = sprintf('%02d:%02d', $hour, $minute);
                    $timeOptionsForReservation[] = $time;
                }
            }

            return view('pages.edit-reseve', compact('shop', 'reserve', 'timeOptionsForReservation'));
        } else {
            // お店の予約がなければ
            return view('pages.mypage', compact('reviews'));
        }
    }

    public function update($reserve_id, ReserveRequest $request)
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
