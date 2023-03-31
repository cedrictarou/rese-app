<?php

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


// 店舗管理者のみアクセス可能
Route::get('/admin/{shop_id}', [AdminController::class, 'shopAdmin'])->middleware(['auth'])->name('shopAdmin');
// アプリ管理者
Route::get('/admin', [AdminController::class, 'admin'])->middleware(['auth'])->name('admin');

require __DIR__ . '/auth.php';
