<?php

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

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/detail/{shop_id}', function () {
    return view('pages.detail');
});

Route::get('/mypage', function () {
    return view('pages.mypage');
});

Route::get('/thanks', function () {
    return view('pages.thanks');
});

Route::get('/done', function () {
    return view('pages.done');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
