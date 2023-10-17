<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\BrandChartController;
use \App\Http\Controllers\BrandGraphController;
use \App\Http\Controllers\BrandController;
use \App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductController::class, 'productList'])->name('products.list');
Route::get('/search', [ProductController::class, 'search']);
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::get("detail/{id}", [ProductController::class,'detail']);
Route::get("orderadd", [ProductController::class,'orderAdd'])->name('cart.orderadd');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('save', [CartController::class, 'saveCart'])->name('cart.save');
Route::get('brand-chart',[BrandChartController::class,'index1'])->name('index1');
Route::get('brand-graph',[BrandGraphController::class,'index2'])->name('index2');
Route::get("orderadd", [ProductController::class,'orderAdd'])->name('cart.orderadd');
Route::post("orderplace", [ProductController::class,'orderPlace']);
Route::get("orderlist", [ProductController::class,'orderlist'])->name('orderlist');
Route::get('/', function () {
    return view('welcome');
});

Route::resource('brand',BrandController::class);
Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
Route::resource('brand',BrandController::class);
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::resource('category',CategoryController::class);
Route::get('category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/dashboard', [ProductController::class, 'productRecommend'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
