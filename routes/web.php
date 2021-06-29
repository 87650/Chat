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
    return view('welcome');
});

Auth::routes();





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']] , function() {
Route::get('/', [App\Http\Controllers\Admin\DashbordController::class, 'dashboard']);
});
Route::get('/chat', [App\Http\Controllers\Chat::class, 'chat']);
Route::get('/json/channal', [App\Http\Controllers\Chat::class, 'chennal']);
Route::post('/json/chanal', [App\Http\Controllers\Chat::class, 'chanal']);
Route::get('/json/chanal1', [App\Http\Controllers\Chat::class, 'chennal1']);
Route::post('/json/message', [App\Http\Controllers\Chat::class, 'mes']);
