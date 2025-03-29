<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//route for users


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//end

//route for admin
//Route::group(['prefix'])
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
//end

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
