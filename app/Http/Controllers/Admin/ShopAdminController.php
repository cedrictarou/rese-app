<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopAdminController extends Controller
{
    public function index()
    {
        // 店舗情報の一覧を表示するための処理
        $user = Auth::user();
        $shops = Shop::where('user_id', $user->id)->get();
        return view('pages.shop-admin.index', compact('shops'));
    }

    public function show($shop_id)
    {
        // 指定された店舗の詳細情報を表示するための処理
        $shop = Shop::find($shop_id);
        return view('pages.shop-admin.show', compact('shop'));
    }

    public function create()
    {
        // 新しい店舗情報を入力するためのビューを返す処理

        return view('pages.shop-admin.create');
    }

    public function store(Request $request)
    {
        // 新しい店舗情報をデータベースに登録する処理
        return redirect()->route('pages.shop-admin.index')->with('success', '新しい店舗情報を登録しました。');
    }

    public function edit($shop_id)
    {
        // 既存の店舗情報を編集するためのビューを返す処理
        $shop = Shop::find($shop_id);
        return view('pages.shop-admin.edit', compact('shop'));
    }

    public function update(Request $request, $shop_id)
    {
        // 既存の店舗情報をデータベースに更新する処理
        return redirect()->route('pages.shop-admin.show', ['shop_id' => $shop_id])->with('success', '店舗情報を更新しました。');
    }

    public function destroy($shop_id)
    {
        // 既存の店舗情報をデータベースから削除する処理
        return redirect()->route('pages.shop-admin.index')->with('success', '店舗情報を削除しました。');
    }
}