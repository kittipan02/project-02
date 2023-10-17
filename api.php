<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\ProductApiController;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// API routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::resource('/brand', BrandApiController::class);
Route::get('/brand/search/{name}', [BrandApiController::class,'search']);

Route::resource('/category', CategoryApiController::class);
Route::get('/category/search/{name}', [CategoryApiController::class,'search']);

Route::resource('/products', ProductApiController::class);
Route::get('/products/search/{name}', [ProductApiController::class,'search']);