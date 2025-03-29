<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//route for users


Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('home');

Route::get('dashboard', function () {
    $products = Product::latest()->take(6)->get();

    return Inertia::render('Dashboard', [
        'products' => $products,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

// CART
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart', [CartController::class, 'store'])
    ->name('cart.store');

Route::delete('/cart/{id}', [CartController::class, 'destroy'])
    ->name('cart.destroy');

// CHECKOUT / ORDERS
Route::get('/checkout', [OrderController::class, 'create'])
    ->name('checkout.create');
Route::post('/checkout', [OrderController::class, 'store'])
    ->name('checkout.store');

//end

//route for admin
//Route::group(['prefix'])
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');

    // Optional: show, edit, update, destroy
    Route::get('/products/{product}', [AdminProductController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

//end

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
