<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

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


Route::get('all_products',[ApiController::class, 'index']);
Route::post('add_cart_data',[ApiController::class, 'store_to_cart']);
Route::get('/user_cart_data/{id}',[ApiController::class, 'show_user_cart'])->name('user_cart_data');
