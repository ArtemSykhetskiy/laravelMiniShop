<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function (){
    Route::get('categories', [\App\Http\Controllers\Api\v1\CategoryController::class, 'index']);
    Route::get('category/{category}', [\App\Http\Controllers\Api\v1\CategoryController::class, 'show']);
    Route::post('category', [\App\Http\Controllers\Api\v1\CategoryController::class, 'store']);

    Route::get('products', [\App\Http\Controllers\Api\v1\ProductController::class, 'index']);
    Route::get('product/{product}', [\App\Http\Controllers\Api\v1\ProductController::class, 'show']);
});
