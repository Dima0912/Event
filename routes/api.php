<?php

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

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/login', [\App\Http\Controllers\JWTController::class, 'login'])->name('login');
    Route::post('/logout', [\App\Http\Controllers\JWTController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\JWTController::class, 'refresh']);
    Route::post('/profile', [\App\Http\Controllers\JWTController::class, 'profile']);
});

Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::prefix('events')->group(function () {
        Route::get('', [\App\Http\Controllers\EventController::class, 'index']);
        Route::post('', [\App\Http\Controllers\EventController::class, 'store']);
        Route::get('/{id}', [\App\Http\Controllers\EventController::class, 'show']);
        Route::put('/{id}', [\App\Http\Controllers\EventController::class, 'update']);
        Route::delete('/{id}', [\App\Http\Controllers\EventController::class, 'destroy']);
    });
});


Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::prefix('users')->group(function () {
        Route::get('', [\App\Http\Controllers\UserController::class, 'index']);
        Route::post('', [\App\Http\Controllers\UserController::class, 'store']);
        Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'show']);
        Route::put('/{id}', [\App\Http\Controllers\UserController::class, 'update']);
        Route::delete('/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
    });
});



