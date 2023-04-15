<?php

use App\Http\Controllers\Admin\ShopAdminController;
use App\Http\Controllers\Admin\AdminController;
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
Route::get('/thanks', [RegisteredUserController::class, 'thanks'])->name('thanks');

Route::group(['middleware' => 'auth'], function () {
    // Mypageの処理
    Route::get('/mypage', [UserController::class, 'index'])->name('mypage');
    // レビュー機能の処理
    Route::post('/review/{reserve_id}', [ReviewController::class, 'review'])->name('review');
    // 予約
    Route::post('/detail/{shop_id}', [ShopController::class, 'reservation'])->name('reservation');
    // 予約の確認・編集処理
    Route::get('/reserve/{reserve_id}', [ReserveController::class, 'show'])->name('show');
    Route::put('/reserve/{reserve_id}', [ReserveController::class, 'update'])->name('update');
    Route::put('/reserve/{reserve_id}/cancel', [ReserveController::class, 'cancel'])->name('cancel');
    Route::put('/reserve/{reserve_id}/came', [ReserveController::class, 'came'])->name('came');
    // お気に入り登録処理
    Route::post('/likes/{shop_id}', [LikeController::class, 'like'])->name('like');
    Route::delete('/likes/{shop_id}', [LikeController::class, 'unlike'])->name('unlike');
});

// 店舗管理者とアプリ管理者のみアクセス可能
Route::prefix('shop-admin')->middleware(['auth', 'shopAdmin'])->group(function () {
    Route::get('/', [ShopAdminController::class, 'index'])->name('shop-admin.index');
    Route::get('/create', [ShopAdminController::class, 'create'])->name('shop-admin.create');
    Route::post('/create', [ShopAdminController::class, 'store'])->name('shop-admin.store');
    Route::get('{shop_id}', [ShopAdminController::class, 'show'])->name('shop-admin.show');
    Route::get('{shop_id}/edit', [ShopAdminController::class, 'edit'])->name('shop-admin.edit');
    Route::put('{shop_id}', [ShopAdminController::class, 'update'])->name('shop-admin.update');
    Route::delete('{shop_id}', [ShopAdminController::class, 'destroy'])->name('shop-admin.destroy');
});

// アプリ管理者
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // 店舗管理者一覧
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/users', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/users/{user_id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/users/{user_id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/users/{user_id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/users/{user_id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__ . '/auth.php';
