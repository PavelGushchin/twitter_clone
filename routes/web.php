<?php

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

Route::get('/', [HomepageController::class, 'show'])
    ->middleware(['auth'])
    ->name('homepage');

//Route::get('/create-tweet/{content}', [TweetController::class, 'store']);
Route::post('/store-tweet', [TweetController::class, 'store'])
    ->middleware('auth')
    ->name('store-tweet');

require __DIR__.'/auth.php';
