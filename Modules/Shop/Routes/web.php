<?php

use App\Http\Controllers\Modules\Shop\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\ProductController;
use Modules\Shop\Http\Controllers\ShopController;

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

Route::get('/product', [ProductController::class, 'index'])->name('product.index');


Route::get('carts',[CartController::class, 'index'])->name('carts.index');


Route::prefix('shop')->group(function() {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
});

// Route::group(['middleware' => ['role:1']], function() { // 1 for admin
//     Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
//     // Tambahkan route khusus admin di sini
// });

// Route::group(['middleware' => ['role:0']], function() { // 0 for customer
//     Route::get('/customer', 'CustomerController@index')->name('customer.dashboard');
//     // Tambahkan route khusus customer di sini
// });
