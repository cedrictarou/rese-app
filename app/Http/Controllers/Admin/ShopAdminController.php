<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Models\Genre;
use App\Models\Region;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopAdminController extends Controller
{
    public function index()
    {
        // 店舗情報の一覧を表示するための処理
        $user = Auth::user();
        $user  = User::with('shops')->find($user['id']);
        return view('pages.shop-admin.index', compact('user'));
    }

    public function show($shop_id)
    {
        // 指定された店舗の詳細情報を表示するための処理
        $shop = Shop::with('reserves', 'reviews')->find($shop_id);
        return view('pages.shop-admin.show', compact('shop'));
    }

    public function create()
    {
        $regions = Region::all();
        $genres = Genre::all();

        return view('pages.shop-admin.create', compact('regions', 'genres'));
    }

    public function store(ShopRequest $request)
    {
        $dir = 'images';
        // アップロードされたファイルを取得
        $file = $request->file('image');

        // if ($file) {
        //     // アップロードされた画像を保存
        //     $file_name = $file->getClientOriginalName();
        //     $file->storeAs('public/' . $dir, $file_name);
        //     $file_dir = 'storage/' . $dir . '/' . $file_name;
        // } else {
        //     // デフォルト画像を保存
        //     $file_dir = 'storage/' . $dir . '/default-image.jpg';
        // }
        if ($file) {
            // アップロードされた画像を保存
            $file_name = $file->getClientOriginalName();
            Storage::disk('s3')->putFileAs($dir, $file, $file_name);
            $file_dir = Storage::disk('s3')->url($dir . '/' . $file_name);
        } else {
            // デフォルト画像を保存
            $file_dir = Storage::disk('s3')->url($dir . '/default-image.jpg');
        }
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
        $shop = Shop::find($shop_id);
        $regions = Region::all();
        $genres = Genre::all();

        return view('pages.shop-admin.edit', compact('shop', 'regions', 'genres'));
    }

    public function update(ShopRequest $request, $shop_id)
    {
        $shop = Shop::find($shop_id);
        // if ($request->hasFile('image')) {
        //     $dir = 'images';
        //     $file_name = $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('public/' . $dir, $file_name);
        //     $file_dir = 'storage/' . $dir . '/' . $file_name;
        //     $shop->image = $file_dir;
        // }
        if ($request->hasFile('image')) {
            $dir = 'images';
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();

            // ファイルをS3ディスクに保存
            $file_path = $file->storeAs($dir, $file_name, 's3');

            // Storage::url()メソッドを使用して、保存されたファイルへのURLを生成
            $file_url = Storage::disk('s3')->url($file_path);

            $shop->image = $file_url;
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
        Shop::destroy($shop_id);
        return redirect()->route('shop-admin.index')->with('message', '店舗情報を削除しました。');
    }
}
