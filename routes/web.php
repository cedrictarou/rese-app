<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LikeController;
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
Route::delete('/detail/{shop_id}', [ShopController::class, 'cancel'])->middleware(['auth'])->name('cancel');

Route::get('/mypage', [UserController::class, 'index'])->middleware(['auth'])->name('mypage');
Route::get('/mypage/reserve/{reserve_id}', [UserController::class, 'show'])->middleware(['auth'])->name('show');
Route::put('/mypage/reserve/{reserve_id}', [UserController::class, 'update'])->middleware(['auth'])->name('update');


Route::get('/thanks', [RegisteredUserController::class, 'thanks'])->name('thanks');

Route::post('/likes/{shop_id}', [LikeController::class, 'like'])->middleware(['auth'])->name('like');
Route::delete('/likes/{shop_id}', [LikeController::class, 'unlike'])->middleware(['auth'])->name('unlike');


require __DIR__ . '/auth.php';
