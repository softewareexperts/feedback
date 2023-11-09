<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/add/item', [App\Http\Controllers\HomeController::class, 'addItem'])->name('add.item');
Route::get('/all/items', [App\Http\Controllers\HomeController::class, 'allItem'])->name('all.item');
Route::get('/handle/items/{id}', [App\Http\Controllers\HomeController::class, 'handleItem'])->name('handle.item');
Route::get('/disable/items/{id}', [App\Http\Controllers\HomeController::class, 'disableItem'])->name('disable.item');
Route::get('/disable/feeds/{id}', [App\Http\Controllers\HomeController::class, 'disableFeedback'])->name('disable.feed');




Route::post('/post/product', [App\Http\Controllers\HomeController::class, 'addProduct'])->name('post.product');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/item/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('item.detail');
Route::post('/submit/feedback/{id}', [App\Http\Controllers\HomeController::class, 'storeFeedback'])->name('submit.feedback');


