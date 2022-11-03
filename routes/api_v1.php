<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function (){
    Route::get('categories', [\App\Http\Controllers\Api\v1\CategoryController::class, 'index']);
    Route::get('category/{id}', [\App\Http\Controllers\Api\v1\CategoryController::class, 'show']);
    Route::post('category', [\App\Http\Controllers\Api\v1\CategoryController::class, 'store']);
    Route::patch('category/{id}', [\App\Http\Controllers\Api\v1\CategoryController::class, 'update']);
    Route::delete('category/{id}', [\App\Http\Controllers\Api\v1\CategoryController::class, 'delete']);

    Route::get('products', [\App\Http\Controllers\Api\v1\ProductController::class, 'index']);
    Route::get('product/{id}', [\App\Http\Controllers\Api\v1\ProductController::class, 'show']);
    Route::post('product', [\App\Http\Controllers\Api\v1\ProductController::class, 'store']);
    Route::patch('product/{id}', [\App\Http\Controllers\Api\v1\ProductController::class, 'update']);
    Route::delete('product/{id}', [\App\Http\Controllers\Api\v1\ProductController::class, 'delete']);
});
