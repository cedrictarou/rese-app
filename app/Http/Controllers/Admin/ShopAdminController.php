<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Region;
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
        $regions = Region::all();
        $genres = Genre::all();

        return view('pages.shop-admin.create', compact('regions', 'genres'));
    }

    public function store(Request $request)
    {
        // 新しい店舗情報をデータベースに登録する処理
        $dir = 'images';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $file_dir = 'storage/' . $dir . '/' . $file_name;
        Shop::create([
            'name' => $request->name,
            'region_id' => $request->region_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'image' => $file_dir,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('shop-admin.index')->with('message', '新しい店舗情報を登録しました。');
    }

    public function edit($shop_id)
    {
        // 既存の店舗情報を編集するためのビューを返す処理
        $shop = Shop::find($shop_id);
        $regions = Region::all();
        $genres = Genre::all();

        return view('pages.shop-admin.edit', compact('shop', 'regions', 'genres'));
    }

    public function update(Request $request, $shop_id)
    {
        // 既存の店舗情報をデータベースに更新する処理
        $shop = Shop::find($shop_id);
        // 取得したファイル名で保存
        // 画像がアップロードされた場合
        if ($request->hasFile('image')) {
            $dir = 'images';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $file_dir = 'storage/' . $dir . '/' . $file_name;
            $shop->image = $file_dir;
        }

        $shop->update([
            'name' => $request->name,
            'region_id' => $request->region_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'image' => $shop->image,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('shop-admin.show', ['shop_id' => $shop_id])->with('message', '店舗情報を更新しました。');
    }

    public function destroy($shop_id)
    {
        // 既存の店舗情報をデータベースから削除する処理
        Shop::destroy($shop_id);
        return redirect()->route('shop-admin.index')->with('message', '店舗情報を削除しました。');
    }
}
