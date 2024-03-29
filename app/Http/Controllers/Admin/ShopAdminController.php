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
        if ($file) {
            // アップロードされた画像を保存
            $file_name = $file->getClientOriginalName();

            if (config('app.env') === 'local') {
                // 開発環境: ローカルストレージにファイルをアップロード
                $request->file('image')->storeAs('public/' . $dir, $file_name);
                $file_dir = 'storage/' . $dir . '/' . $file_name;
            } else {
                // 本番環境: S3にファイルをアップロード
                Storage::disk('s3')->putFileAs($dir, $file, $file_name);
                $file_dir = Storage::disk('s3')->url($dir . '/' . $file_name);
            }
        } else {
            // デフォルト画像を保存
            if (config('app.env') === 'local') {
                // 開発環境: ローカルストレージのデフォルト画像のURL
                $file_dir = 'storage/' . $dir . '/default-image.jpg';
            } else {
                // 本番環境: S3のデフォルト画像のURL
                $file_dir = Storage::disk('s3')->url($dir . '/default-image.jpg');
            }
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
        // アップロードされたファイルを取得
        $file = $request->file('image');
        if ($file) {
            $dir = 'images';
            $file_name = $file->getClientOriginalName();

            if (config('app.env') === 'local') {
                // 開発環境: ローカルストレージにファイルをアップロード
                $file->storeAs('public/' . $dir, $file_name);
                $file_dir = 'storage/' . $dir . '/' . $file_name;
                $shop->image = $file_dir;
            } else {
                // 古い画像ファイルの削除
                Storage::disk('s3')->delete($shop->image);
                // 本番環境: S3にファイルをアップロード
                $path = Storage::disk('s3')->putFileAs($dir, $request->file('image'), $file_name, 'public');
                $file_url = Storage::disk('s3')->url($path);
                $shop->image = $file_url;
            }
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
        $user = Auth::user();
        $shop = Shop::find($shop_id);
        $shop_admin = $shop->user['id'];
        Shop::destroy($shop_id);

        if ($user->role_id === 2) {
            return redirect()->route('shop-admin.index')->with('message', '店舗情報を削除しました。');
        } else
            return redirect()->route('admin.show', $shop_admin)->with('message', '店舗情報を削除しました。');
    }
}
