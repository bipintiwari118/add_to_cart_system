<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('/', [ProductController::class, 'index'])->name('products.index');
route::get('/cart', [CartController::class, 'index'])->name('cart.index');
route::get('/add/cart/{productId}', [CartController::class, 'addCart'])->name('add.cart');
route::get('/add/quantity/{productId}', [CartController::class, 'addQuantity'])->name('add.quantity');
route::get('/sub/quantity/{productId}', [CartController::class, 'subQuantity'])->name('sub.quantity');
route::get('/product/remove/{productId}', [CartController::class, 'cartRemove'])->name('cart.remove');
route::get('/product/remove', [CartController::class, 'removeAll'])->name('all.remove');




Route::get('/contact', function () {
    return view('contact');
})->name('contact');
