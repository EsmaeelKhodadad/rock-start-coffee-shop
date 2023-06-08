<?php

use App\Http\Controllers\API\V1\ProductController;
use Illuminate\Support\Facades\Route;

Route::group([], static function () {
    Route::prefix('products')->group(static function () {
        Route::get('/', [ProductController::class, 'index']);
    });
    Route::prefix('orders')->group(static function () {
        Route::post('/', [ProductController::class, 'index']);
    });
});
