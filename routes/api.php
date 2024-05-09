<?php

use App\Http\Controllers\AmiiboController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('jwt.verification')->group(function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('list', [UserController::class, 'index'])->name('userList');
    });

    Route::group(['prefix' => 'amiibo'], function(){
        Route::get('list', [AmiiboController::class, 'index']);
    });

    Route::group(['prefix' => 'countries'], function(){
        Route::get('list', [CountryController::class, 'index']);
    });
});



