<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\ChangeUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('ghost')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/getjson', function (){
        return response()->json([
            "успешно" => "аааа"
        ]);
    });
});

Route::get('/login/fail', function (){
   return response()->json([
       "error" => [
           "code" => 403,
           "message" => "Login failed"
       ]
   ]);
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/change', [ChangeController::class, 'store']);
Route::post('/change/user', [ChangeUserController::class, 'store']);
