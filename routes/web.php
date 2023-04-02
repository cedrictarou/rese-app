<?php

use App\Http\Controllers\Admin\ShopAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ShopController::class, 'index'])->name('index');

Route::get('/detail/done', [ShopController::class, 'done'])->name('done');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');
Route::post('/detail/{shop_id}', [ShopController::class, 'reservation'])->middleware(['auth'])->name('reservation');


// reviewを保存する
Route::post('/review/{reserve_id}', [ReviewController::class, 'review'])->middleware(['auth'])->name('review');

Route::get('/mypage', [UserController::class, 'index'])->middleware(['auth'])->name('mypage');
// 予約の管理
Route::get('/reserve/{reserve_id}', [ReserveController::class, 'show'])->middleware(['auth'])->name('show');
Route::put('/reserve/{reserve_id}', [ReserveController::class, 'update'])->middleware(['auth'])->name('update');
Route::put('/reserve/{reserve_id}/cancel', [ReserveController::class, 'cancel'])->middleware(['auth'])->name('cancel');

Route::get('/thanks', [RegisteredUserController::class, 'thanks'])->name('thanks');

Route::post('/likes/{shop_id}', [LikeController::class, 'like'])->middleware(['auth'])->name('like');
Route::delete('/likes/{shop_id}', [LikeController::class, 'unlike'])->middleware(['auth'])->name('unlike');


// 店舗管理者とアプリ管理者のみアクセス可能
Route::prefix('shop-admin')->middleware(['auth', 'shopAdmin'])->group(function () {
    // 店舗情報を管理するためのルート
    Route::get('/', [ShopAdminController::class, 'index'])->name('shop-admin.index');

    // 登録されている店舗情報の詳細情報を見る、予約状況を確認、編集するためのルート
    Route::get('{shop_id}', [ShopAdminController::class, 'show'])->name('shop-admin.show');

    // 新規店舗情報を登録するためのルート
    Route::post('{shop_id}', [ShopAdminController::class, 'store'])->name('shop-admin.store');

    // 登録されている店舗の情報を編集するためのルート
    Route::get('{shop_id}/edit', [ShopAdminController::class, 'edit'])->name('shop-admin.edit');

    // 登録されている店舗の情報をupdateするためのルート
    Route::put('{shop_id}', [ShopAdminController::class, 'update'])->name('shop-admin.update');

    // 登録されている店舗の情報を削除するためのルート
    Route::delete('{shop_id}', [ShopAdminController::class, 'destroy'])->name('shop-admin.destroy');
});

// アプリ管理者
// Route::get('/admin', [AdminController::class, 'admin'])->middleware(['auth', 'admin'])->name('admin');

require __DIR__ . '/auth.php';
