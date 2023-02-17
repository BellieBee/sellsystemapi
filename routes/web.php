<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Product CRUD
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    // Sell Form
    Route::get('/sell', [SellController::class, 'index'])->name('sell.index');
    Route::post('/sell', [SellController::class, 'store'])->name('sell.store');
    // Bills
    Route::get('/bill', [BillController::class, 'index'])->name('bill.index');
    Route::post('/bill', [BillController::class, 'store'])->name('bill.store');
    Route::get('/bill/{id}', [BillController::class, 'show'])->name('bill.show');
});

require __DIR__.'/auth.php';
