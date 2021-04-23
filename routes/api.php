<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'subscriptions'], function(){
    Route::post('create', [App\Http\Controllers\SubscriptionController::class, 'create']);
});

Route::group(['prefix' => 'messages'], function(){
    Route::post('publish', [App\Http\Controllers\MessageController::class, 'publish']);
});

Route::group(['prefix' => 'topics'], function(){
    Route::post('', [App\Http\Controllers\TopicController::class, 'index']);
    Route::post('create', [App\Http\Controllers\TopicController::class, 'create']);
});
