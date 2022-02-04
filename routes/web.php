<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\Shop\DashboardController as ShopDashboardController;
use App\Http\Controllers\Shop\DashboardProductController;
use App\Http\Controllers\Shop\DashboardSettingController as ShopDashboardSettingController;
use App\Http\Controllers\Shop\DashboardTransactionController as ShopDashboardTransactionController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/shops', [ShopController::class, 'index'])->name('shops');
Route::get('/shop-details/{id}', [ShopController::class, 'detail'])->name('shop-details');
Route::get('/product-details/{id}', [ProductDetailController::class, 'index'])->name('product-details');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])
    ->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'detail'])
    ->name('dashboard-transaction-details');
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])
    ->name('dashboard-account');


Route::get('/dashboard-shop/products', [DashboardProductController::class, 'index'])
    ->name('dashboard-shop-products');
Route::get('/dashboard-shop/products/create', [DashboardProductController::class, 'create'])
    ->name('dashboard-shop-product-create');
Route::get('/dashboard-shop/products/{id}', [DashboardProductController::class, 'detail'])
    ->name('dashboard-shop-product-details');
Route::get('/dashboard-shop/transactions', [ShopDashboardTransactionController::class, 'index'])
    ->name('dashboard-shop-transactions');
Route::get('/dashboard-shop/transactions/{id}', [ShopDashboardTransactionController::class, 'detail'])
    ->name('dashboard-shop-transaction-details');
Route::get('/dashboard-shop/account', [ShopDashboardSettingController::class, 'account'])
    ->name('dashboard-shop-account');

Route::prefix('seller')
    ->group(function() {
        Route::get('/', [ShopDashboardController::class, 'index'])->name('dashboard-shop');
});

    // ->middleware(['auth', 'admin'])
Route::prefix('admin')
    ->group(function() {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('category', AdminCategoryController::class);
        Route::resource('user', UserController::class);
        Route::resource('product', ProductController::class);
        Route::resource('product-gallery', ProductGalleryController::class);
    });

Auth::routes();

