<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tweets', [TweetController::class,'index']);
Route::get('tweets/{tweet}', [TweetController::class,'show']);
Route::get('tweets/search/{word}', [TweetController::class,'search']);
Route::get('tweets/siborikomi/{word}', [TweetController::class,'siborikomi']);
Route::get('tweets/category/{word}', [TweetController::class,'category']);
Route::post('tweets/store', [TweetController::class,'store']);
Route::post('tweets/comment/store', [CommentController::class,'store']);
Route::get('tweets/comment/{tweet}', [CommentController::class,'index']);
