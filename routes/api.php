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

Route::group(['prefix' => 'topics'], function(){
    Route::get('', [App\Http\Controllers\TopicController::class, 'index']);
    Route::post('create', [App\Http\Controllers\TopicController::class, 'create']);
});
Route::post('subscribe/{topicName}', [App\Http\Controllers\SubscriptionController::class, 'create']);
Route::post('publish/{topicName}', [App\Http\Controllers\MessageController::class, 'publish']);
