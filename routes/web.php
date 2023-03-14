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
Route::post('/detail/{shop_id}', [ShopController::class, 'reservation'])->name('reservation');
Route::delete('/detail/{shop_id}', [ShopController::class, 'cancel'])->name('cancel');

Route::get('/mypage', [UserController::class, 'index'])->name('mypage');

Route::get('/thanks', [RegisteredUserController::class, 'thanks'])->name('thanks');

Route::post('/likes/{shop_id}', [LikeController::class, 'like'])->name('like');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
