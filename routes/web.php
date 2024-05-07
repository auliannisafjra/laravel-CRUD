<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/user/{userId}', [ProductController::class, 'user'])->name('products.user');
Route::get('products/{userId}/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/{userId}/store', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{userId}/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('products/{userId}/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('profile/{userId}', [ProductController::class, 'profile'])->name('products.profile');
