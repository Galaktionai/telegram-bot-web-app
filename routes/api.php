<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', \App\Http\Controllers\API\User\IndexController::class);
Route::get('/users/{user}', \App\Http\Controllers\API\User\ShowController::class);

Route::get('/products', \App\Http\Controllers\API\Product\IndexController::class);
Route::get('/products/{product}', \App\Http\Controllers\API\Product\ShowController::class);

Route::get('/orders', \App\Http\Controllers\API\Orders\IndexController::class);
Route::get('/orders/{order}', \App\Http\Controllers\API\Orders\DetailController::class);
Route::get('/orders/products', \App\Http\Controllers\API\Orders\DetailController::class);
Route::get('/orders', \App\Http\Controllers\API\Orders\ShowController::class);

// Route::group(['namespace' => 'Order', 'prefix' => 'order'], function() {
//     Route::get('/', 'StoreController');
// });


Route::group(['prefix' => 'order'], function(){
    Route::post('/', App\Http\Controllers\API\Order\StoreController::class);
});

Route::group(['prefix' => 'order_products'], function(){
    Route::post('/', App\Http\Controllers\API\OrderProduct\StoreController::class);
});

Route::get('/get', App\Http\Controllers\GetController::class)->middleware('auth:sanctum');
