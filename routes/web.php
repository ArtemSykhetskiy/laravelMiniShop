<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('locale/{locale}', [\App\Http\Controllers\HomeController::class, 'changeLocale'])->name('locale');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('products', [\App\Http\Controllers\ProductsController::class, 'index'])->name('products');
    Route::get('product/{product}', [\App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
    Route::get('categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');
    Route::get('categories/{category}', [\App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show');

    Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('cart/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('cart/{product}/count', [\App\Http\Controllers\CartController::class, 'countUpdate'])->name('cart.count.update');

    Route::get('checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout')->middleware('auth');
    Route::post('checkout/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('checkout.create')->middleware('auth');
    Route::get('thankyou',function (){
        return view('cart/thankYou');
    })->name('thankYou');


    Route::get('wishlist', [\App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist')->middleware('auth');
    Route::post('wishlist/{product}/add', [\App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add')->middleware('auth');
    Route::delete('wishlist/{product}/delete', [\App\Http\Controllers\WishlistController::class, 'delete'])->name('wishlist.remove')->middleware('auth');

    Route::get('auth/facebook', [\App\Http\Controllers\SocialController::class, 'facebookRedirect'])->name('fb.redirect');
    Route::get('auth/facebook/callback', [\App\Http\Controllers\SocialController::class, 'loginWithFacebook'])->name('login.redirect');

    Route::middleware('auth')->group(function (){
        Route::get('profile', [\App\Http\Controllers\User\UserController::class, 'index'])->name('profile');
        Route::get('profile/edit/{user}', [\App\Http\Controllers\User\UserController::class, 'edit'])->name('profile.edit')->middleware('can:update,user');
        Route::put('profile/update/{user}', [\App\Http\Controllers\User\UserController::class, 'update'])->name('profile.update');
        Route::get('profile/order/{order}', [\App\Http\Controllers\User\UserController::class, 'show'])->name('profile.order.show');
        Route::put('profile/order/{order}', [\App\Http\Controllers\User\UserController::class, 'cancel'])->name('profile.order.cancel');

    });

    Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
        Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class )->except('show');
        Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class )->except('show');

        Route::get('orders', [\App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('orders');
        Route::get('order/edit/{order}', [\App\Http\Controllers\Admin\OrdersController::class, 'edit'])->name('order.edit');
        Route::put('order/update/{order}', [\App\Http\Controllers\Admin\OrdersController::class, 'update'])->name('order.update');

        Route::get('promocodes', [\App\Http\Controllers\Admin\PromocodeController::class, 'index'])->name('promocodes.index');
        Route::get('promocodes/create', [\App\Http\Controllers\Admin\PromocodeController::class, 'create'])->name('promocodes.create');
        Route::post('promocodes/store', [\App\Http\Controllers\Admin\PromocodeController::class, 'store'])->name('promocodes.store');
        Route::get('promocodes/{promocode}', [\App\Http\Controllers\Admin\PromocodeController::class, 'show'])->name('promocodes.show');
        Route::delete('promocodes/{promocode}', [\App\Http\Controllers\Admin\PromocodeController::class, 'destroy'])->name('promocodes.destroy');
        Route::post('promocodes/apply', [\App\Http\Controllers\Admin\PromocodeController::class, 'apply'])->name('promocodes.apply');


        Route::get('tokens', [\App\Http\Controllers\Api\v1\TokenController::class, 'index'])->name('tokens');
        Route::post('tokens/create', [\App\Http\Controllers\Api\v1\TokenController::class, 'create'])->name('tokens.create');

    });
});



