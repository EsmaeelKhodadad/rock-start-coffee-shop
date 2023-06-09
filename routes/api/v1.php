<?php

use App\Http\Controllers\API\V1\OrderController;
use App\Http\Controllers\API\V1\ProductController;
use Illuminate\Support\Facades\Route;

Route::group([], static function () {
    Route::prefix('products')->group(static function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
    });
    Route::prefix('orders')->group(static function () {
        Route::post('/', [OrderController::class, 'store'])->name('order.store');
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::delete('/{order_id}/cancel', [OrderController::class, 'delete'])->name('order.delete');
        Route::middleware('admin')->group(static function () {
            Route::patch('/{order_id}', [OrderController::class, 'update'])->name('order.update');
        });
    });
});
