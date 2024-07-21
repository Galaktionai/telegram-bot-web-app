<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function() {
    //Route::get('/get', 'GetController');
});

Route::get('/users', \App\Http\Controllers\API\User\IndexController::class);
Route::get('/users/{user}', \App\Http\Controllers\API\User\ShowController::class);

Route::get('/products', \App\Http\Controllers\API\Product\IndexController::class);
Route::get('/products/{product}', \App\Http\Controllers\API\Product\ShowController::class);