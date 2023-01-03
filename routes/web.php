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
Route::get('@{username}', [App\Http\Controllers\UserController::class, 'show']);

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search']);

Route::get('/report', [App\Http\Controllers\ReportController::class, 'manage']);
Route::post('/report', [App\Http\Controllers\ReportController::class, 'store']);
Route::post('/report/update', [App\Http\Controllers\ReportController::class, 'update']);
Route::post('/ban', [App\Http\Controllers\UserController::class, 'updateStatus']);

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('user/edit', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('user/edit', [App\Http\Controllers\UserController::class, 'update']);
    Route::put('user/edit/business', [App\Http\Controllers\UserController::class, 'updateType']);
    Route::resource('post', App\Http\Controllers\PostController::class);

    // Route::resource('report', App\Http\Controllers\ReportPostController::class);
    // Route::put('/report/post/{post_id}', [App\Http\Controllers\ReportController::class, 'reportPost']);
    // Route::put('/report/user/{user_id}', [App\Http\Controllers\ReportController::class, 'reportUser']);

    Route::get('/follow/{user_id}', [App\Http\Controllers\UserController::class, 'follow']);
    Route::get('/like/{post_id}', [App\Http\Controllers\LikeController::class, 'toggle']);
});

