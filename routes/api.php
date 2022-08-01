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

Route::post('product/create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::patch('product/patch/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::get('product/getall', [\App\Http\Controllers\ProductController::class, 'getAllProducts']);
Route::get('product/{id}', [\App\Http\Controllers\ProductController::class, 'getProduct']);
Route::delete('product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);
