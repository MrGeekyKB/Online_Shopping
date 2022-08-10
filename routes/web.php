<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::get('/admin/add', function () {
    return view('admin/add_product');
});


Route::get('/admin/test', function () {
    return view('admin/test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products', ProductsController::class);
Route::post('form_add_images',  [ProductsController::class, 'store_images']);
Route::get('step2',  [ProductsController::class, 'index_step2']);

require __DIR__.'/auth.php';
