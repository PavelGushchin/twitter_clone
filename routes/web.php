<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\RetweetController;
use App\Http\Controllers\TweetController;
use App\Models\Relationship;
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


Route::post('tweet', [TweetController::class, 'store'])
    ->name('tweet.store');


Route::post('like/{tweet}', [LikeController::class, 'addLike'])
    ->name('like.add');

Route::delete('like/{tweet}', [LikeController::class, 'removeLike'])
    ->name('like.remove');

Route::get('like/{tweet}', function () {
    abort(404);
});


Route::post('retweet/{tweet}', [RetweetController::class, 'addRetweet'])
    ->name('retweet.add');

Route::delete('retweet/{tweet}', [RetweetController::class, 'removeRetweet'])
    ->name('retweet.remove');

Route::get('retweet/{tweet}', function () {
    abort(404);
});


Route::post('follow/{user}', [RelationshipController::class, 'follow'])
    ->name('follow.user');

Route::get('follow/{user}', function () {
    abort(404);
});


Route::post('unfollow/{user}', [RelationshipController::class, 'unfollow'])
    ->name('unfollow.user');

Route::get('unfollow/{user}', function () {
    abort(404);
});
