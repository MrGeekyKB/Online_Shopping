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
})->name('admin');

Route::get('/admin/add', function () {
    return view('admin/add_product');
});


Route::get('/admin/test', function () {
    return view('admin/test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//admin
Route::resource('products', ProductsController::class);
Route::post('form_add_images',  [ProductsController::class, 'store_images']);
Route::get('step2',  [ProductsController::class, 'index_step2']);
Route::get('step3',  [ProductsController::class, 'index_step3']);
Route::post('publish',  [ProductsController::class, 'publish']);

Route::get('my_products',  [ProductsController::class, 'index_my_products']);


//user
Route::get('all_products',  [ProductsController::class, 'index_user_all_products']);
Route::get('/product/{id}', [ProductsController::class, 'show_user'])->name('displayProduct');
Route::post('add_to_cart',  [ProductsController::class, 'store_to_cart'])->name('add_to_cart');
Route::get('/cart/{id}', [ProductsController::class, 'show_user_cart'])->name('displayCart');
Route::get('/cart/remove/{id}', [ProductsController::class, 'cart_item_remove'])->name('removeProduct');
Route::get('checkout', [ProductsController::class, 'checkout'])->name('checkout');

require __DIR__.'/auth.php';
