<?php

use Authentication\Infrastructure\Entrypoint\Http\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Category\Infrastructure\Entrypoint\Http\CategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [AuthenticationController::class, 'register']);
});

Route::group([
    'prefix' => 'v1',
    'middleware' => ['auth:sanctum']
], function () {
    Route::resource('categories', CategoryController::class);
});
