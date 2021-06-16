<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RetweetController;
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
    ->name('home');

Route::get('explore', [ExploreController::class, 'index'])
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


Route::post('tweets', [TweetController::class, 'store'])
    ->name('tweets.store');


Route::post('likes/{tweet}', [LikeController::class, 'addLike'])
    ->name('likes.add');

Route::delete('likes/{tweet}', [LikeController::class, 'removeLike'])
    ->name('likes.remove');


Route::post('retweets/{tweet}', [RetweetController::class, 'addRetweet'])
    ->name('retweets.add');

Route::delete('retweets/{tweet}', [RetweetController::class, 'removeRetweet'])
    ->name('retweets.remove');
