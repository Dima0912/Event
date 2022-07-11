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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/login', [\App\Http\Controllers\JWTController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\JWTController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\JWTController::class, 'refresh']);
    Route::post('/profile', [\App\Http\Controllers\JWTController::class, 'profile']);
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::prefix('events')->group(function () {
        Route::get('index', [\App\Http\Controllers\EventController::class, 'index']);
        Route::post('create', [\App\Http\Controllers\EventController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\EventController::class, 'store']);
        Route::get('show/{id}', [\App\Http\Controllers\EventController::class, 'show']);
        Route::post('edit', [\App\Http\Controllers\EventController::class, 'edit']);
        Route::put('update', [\App\Http\Controllers\EventController::class, 'update']);
        Route::delete('destroy', [\App\Http\Controllers\EventController::class, 'delete']);
    });
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::prefix('users')->group(function () {
        Route::post('index', [\App\Http\Controllers\UserController::class, 'index']);
        Route::post('create', [\App\Http\Controllers\UserController::class, 'create']);
        Route::post('store', [\App\Http\Controllers\UserController::class, 'store']);
        Route::get('show/{id}', [\App\Http\Controllers\UserController::class, 'show']);
        Route::post('edit', [\App\Http\Controllers\UserController::class, 'edit']);
        Route::put('update', [\App\Http\Controllers\UserController::class, 'update']);
        Route::delete('destroy', [\App\Http\Controllers\UserController::class, 'delete']);
    });
});
