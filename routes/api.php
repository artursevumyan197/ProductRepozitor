<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ImageController;


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

Route::get('products/index', [ProductController::class, 'index']);

Route::post('/products/', [ProductController::class, 'create']);

Route::delete('/products/{id}', [ProductController::class, 'delete']);

Route::put('/products/{id}', [ProductController::class, 'update']);

Route::get('/products/{id}', [ProductController::class, 'show']);














