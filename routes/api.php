<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RestaurantApiController;
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

Route::namespace('api')
    ->prefix('restaurants')
    ->group(function(){
        Route::get('/',[RestaurantApiController::class, 'index']);
        Route::get('/{slug}', [RestaurantApiController::class, 'show']);
    });

Route::namespace('api')
    ->prefix('categories')
    ->group(function(){
        Route::get('/', [CategoryApiController::class, 'index']);
        // Route::get('/{id}', [CategoryApiController::class, 'show']);
    });

Route::namespace('api')
    ->prefix('payment')
    ->group(function(){
        Route::get('/generate', [PaymentController::class, 'generate']);
        Route::post('/pay', [PaymentController::class, 'sendPayment']);
    });
