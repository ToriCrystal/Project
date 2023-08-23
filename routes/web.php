<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


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

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


Route::get('/', [ProductController::class, 'index']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('/product/filter', [ProductController::class, 'filter'])->name('filter');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth.checklogin');
Route::get('/addtocart/{id}', [CartController::class, 'index'])->name('addcart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/category/{id}', [ProductController::class, 'category'])->name('category');
Route::get('/deletecart/{id}', [CartController::class, 'deletecart'])->name('deleteCart');
Route::post('/updatecart', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/checkout', [CartController::class, 'checkOut'])->name('checkOut')->middleware('auth.checklogin');
Route::post('/checkoutprocess', [CartController::class, 'checkOutProcess'])->name('checkOutProcess')->middleware('auth.checklogin');
Route::get('/product/search', [ProductController::class, 'search'])->name('search');
Route::post('/detail/comment/{id}', [ProductController::class, 'comment'])->name('comment')->middleware('auth.checklogin');


Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/admin/customer', [AdminController::class, 'customer'])->name('customer')->middleware('admin');
Route::get('/admin/comment', [AdminController::class, 'comment'])->name('comment')->middleware('admin');
Route::get('/admin/category', [AdminController::class, 'category'])->name('category')->middleware('admin');
Route::get('/admin/product', [AdminController::class, 'product'])->name('product')->middleware('admin');
Route::delete('/admin/product/{id_sp}', [AdminController::class, 'destroyProduct'])->name('product.destroy')->middleware('admin');
Route::get('/admin/product/{id_sp}/edit', [AdminController::class, 'editProduct'])->name('product.edit')->middleware('admin');
Route::post('/admin/product/{id_sp}', [AdminController::class, 'editProduct_'])->name('product.update')->middleware('admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
