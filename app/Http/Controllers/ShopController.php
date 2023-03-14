<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Reserve;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
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

        // session()->flash('message', '予約を完了しました。');
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
