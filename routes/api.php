<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\ChangeUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('admin')->group(function(){
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store']);
        Route::post('/change', [ChangeController::class, 'store']);
        Route::post('/change/user', [ChangeUserController::class, 'store']);
        Route::get('/change/{code}/orders', [OrderController::class, 'index']);
    });

    Route::middleware('waiter')->group(function(){
        Route::post('/orders/book', [OrderController::class, 'store']);
        Route::get('/orders/{code}', [OrderController::class, 'show']);
        Route::get('/change/{code}/orders', [OrderController::class, 'showChange']);
        Route::put('/orders/book/{code}', [OrderController::class, 'update']);
        Route::post('/orders/{code}/dish', [OrderController::class, 'storeInOrder']);
        Route::delete('/orders/{code}/dish', [OrderController::class, 'destroy']);
    });

    Route::middleware('cook')->group(function(){
        Route::get('/change/{code}/orders', [OrderController::class, 'showChangeAccept']);
        Route::put('/orders/book/{code}', [OrderController::class, 'update']);
    });
});

