<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
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

Route::get('/', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::get('explore', [ExploreController::class, 'index'])
    ->middleware('auth')
    ->name('explore');

Route::get('notifications', function () {
    return view('main.coming_soon');
})->name('notifications');

Route::get('messages', function () {
    return view('main.coming_soon');
})->name('messages');

Route::get('bookmarks', function () {
    return view('main.coming_soon');
})->name('bookmarks');

Route::get('lists', function () {
    return view('main.coming_soon');
})->name('lists');

Route::get('profile', function () {
    return view('main.coming_soon');
})->name('profile');


Route::post('/store-tweet', [TweetController::class, 'store'])
    ->middleware('auth')
    ->name('store-tweet');
