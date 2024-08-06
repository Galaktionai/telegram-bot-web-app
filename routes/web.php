<?php

use App\Http\Controllers\Client\IndexController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index')->middleware(['auth', 'admin']);

    Route::group(['prefix' => 'orders'], function() {
        Route::get('/', \App\Http\Controllers\Order\IndexController::class)->name('order.index')->middleware(['auth', 'admin']);
        Route::get('/create', \App\Http\Controllers\Order\CreateController::class)->name('order.create')->middleware(['auth', 'admin']);
        Route::post('/', \App\Http\Controllers\Order\StoreController::class)->name('order.store')->middleware(['auth', 'admin']);
        Route::get('/{order}/edit', \App\Http\Controllers\Order\EditController::class)->name('order.edit')->middleware(['auth', 'admin']);
        Route::get('/{order}', \App\Http\Controllers\Order\ShowController::class)->name('order.show')->middleware(['auth', 'admin']);
        Route::patch('/{order}', \App\Http\Controllers\Order\UpdateController::class)->name('order.update')->middleware(['auth', 'admin']);
        Route::delete('/{order}', \App\Http\Controllers\Order\DeleteController::class)->name('order.delete')->middleware(['auth', 'admin']);
    });

    Route::group(['prefix' => 'order_products'], function() {
        Route::delete('/{order_product}', \App\Http\Controllers\orderProduct\DeleteController::class)->name('order_product.delete')->middleware(['auth', 'admin']);
    });



    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index')->middleware(['auth', 'admin']);
        Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create')->middleware(['auth', 'admin']);
        Route::post('/', \App\Http\Controllers\Category\StoreController::class)->name('category.store')->middleware(['auth', 'admin']);
        Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit')->middleware(['auth', 'admin']);
        Route::get('/{category}', \App\Http\Controllers\Category\ShowController::class)->name('category.show')->middleware(['auth', 'admin']);
        Route::patch('/{category}', \App\Http\Controllers\Category\UpdateController::class)->name('category.update')->middleware(['auth', 'admin']);
        Route::delete('/{category}', \App\Http\Controllers\Category\DeleteController::class)->name('category.delete')->middleware(['auth', 'admin']);
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', \App\Http\Controllers\User\IndexController::class)->name('user.index')->middleware(['auth', 'admin']);
        Route::get('/create', \App\Http\Controllers\User\CreateController::class)->name('user.create')->middleware(['auth', 'admin']);
        Route::post('/', \App\Http\Controllers\User\StoreController::class)->name('user.store')->middleware(['auth', 'admin']);
        Route::get('/{user}/edit', \App\Http\Controllers\User\EditController::class)->name('user.edit')->middleware(['auth', 'admin']);
        Route::get('/{user}', \App\Http\Controllers\User\ShowController::class)->name('user.show')->middleware(['auth', 'admin']);
        Route::patch('/{user}', \App\Http\Controllers\User\UpdateController::class)->name('user.update')->middleware(['auth', 'admin']);
        Route::delete('/{user}', \App\Http\Controllers\User\DeleteController::class)->name('user.delete')->middleware(['auth', 'admin']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('/', \App\Http\Controllers\Product\IndexController::class)->name('product.index')->middleware(['auth', 'admin']);
        Route::get('/create', \App\Http\Controllers\Product\CreateController::class)->name('product.create')->middleware(['auth', 'admin']);
        Route::post('/', \App\Http\Controllers\Product\StoreController::class)->name('product.store')->middleware(['auth', 'admin']);
        Route::get('/{product}/edit', \App\Http\Controllers\Product\EditController::class)->name('product.edit')->middleware(['auth', 'admin']);
        Route::get('/{product}', \App\Http\Controllers\Product\ShowController::class)->name('product.show')->middleware(['auth', 'admin']);
        Route::patch('/{product}', \App\Http\Controllers\Product\UpdateController::class)->name('product.update')->middleware(['auth', 'admin']);
        Route::delete('/{product}', \App\Http\Controllers\Product\DeleteController::class)->name('product.delete')->middleware(['auth', 'admin']);
    });
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('{page}', IndexController::class)->where('page', '.*');