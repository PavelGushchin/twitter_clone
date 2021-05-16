<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomepageController;
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

Route::get('/', [HomepageController::class, 'index'])
    ->middleware(['auth'])
    ->name('homepage');

Route::get('explore', [ExploreController::class, 'index'])
    ->middleware('auth')
    ->name('explore');

Route::get('notifications', function () {
    return view('coming_soon');
})->name('notifications');

Route::get('messages', function () {
    return view('coming_soon');
})->name('messages');

Route::get('profile', function () {
    return view('coming_soon');
})->name('profile');


//Route::get('/create-tweet/{content}', [TweetController::class, 'store']);
Route::post('/store-tweet', [TweetController::class, 'store'])
    ->middleware('auth')
    ->name('store-tweet');
