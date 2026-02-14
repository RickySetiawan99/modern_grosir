<?php

use App\Http\Controllers\Api\Reseller\CartController;
use App\Http\Controllers\Api\Reseller\CatalogController;
use App\Http\Controllers\Api\Reseller\NotificationController;
use App\Http\Controllers\Api\Reseller\OrderController;
use App\Http\Controllers\Api\Reseller\ProfileController;
use App\Http\Controllers\Api\Reseller\WalletController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'apiLogin']);

Route::middleware(['auth:sanctum', 'role:reseller'])->prefix('reseller')->group(function () {
    Route::post('/logout', [AuthController::class, 'apiLogout']);
    
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    
    Route::get('/categories', [CatalogController::class, 'categories']);
    Route::get('/products', [CatalogController::class, 'index']);
    Route::get('/products/{id}', [CatalogController::class, 'show']);

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::post('/add', [CartController::class, 'store']);
        Route::put('/update/{id}', [CartController::class, 'update']);
        Route::delete('/remove/{id}', [CartController::class, 'destroy']);
        Route::post('/checkout', [OrderController::class, 'store']);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
    });

    Route::get('/wallet', [WalletController::class, 'index']);
    Route::get('/transactions', [WalletController::class, 'transactions']);
    Route::get('/notifications', [NotificationController::class, 'index']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
