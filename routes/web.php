<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::namespace('App\Http\Controllers\Public')->group(function() {
    Route::get('/', IndexController::class)->name('index');
});

// Cart
Route::namespace('App\Http\Controllers\Public\Cart')->group(function() {
    Route::get('/cart', CartController::class)->name('cart');
    Route::get('/add-to-cart/{product}', AddController::class)->name('addtocart');
    Route::get('/update-cart/{product}', UpdateController::class)->name('updatecart');
    Route::get('/delete/{product}', DeleteController::class)->name('delete');
});


// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', AdminController::class)->name('admin.index');
    Route::namespace('App\Http\Controllers\Category')->group(function () {  
        Route::get('/categories', IndexController::class)->name('categories.index');
        Route::get('/categories/create', CreateController::class)->name('categories.create');
        Route::post('/categories', StoreController::class)->name('categories.store');
        Route::get('/categories/{category}/edit', EditController::class)->name('categories.edit');
        Route::patch('/categories/{category}', UpdateController::class)->name('categories.update');
        Route::delete('/categories/{category}', DestroyController::class)->name('categories.destroy');
    });
    Route::namespace('App\Http\Controllers\Tag')->group(function () {  
        Route::get('/tags', IndexController::class)->name('tags.index');
        Route::get('/tags/create', CreateController::class)->name('tags.create');
        Route::post('/tags', StoreController::class)->name('tags.store');
        Route::get('/tags/{tag}/edit', EditController::class)->name('tags.edit');
        Route::patch('/tags/{tag}', UpdateController::class)->name('tags.update');
        Route::delete('/tags/{tag}', DestroyController::class)->name('tags.destroy');
    });
    Route::namespace('App\Http\Controllers\Color')->group(function () {  
        Route::get('/colors', IndexController::class)->name('colors.index');
        Route::get('/colors/create', CreateController::class)->name('colors.create');
        Route::post('/colors', StoreController::class)->name('colors.store');
        Route::get('/colors/{color}/edit', EditController::class)->name('colors.edit');
        Route::patch('/colors/{color}', UpdateController::class)->name('colors.update');
        Route::delete('/colors/{color}', DestroyController::class)->name('colors.destroy');
    });
    Route::namespace('App\Http\Controllers\User')->group(function () {  
        Route::get('/users', IndexController::class)->name('users.index');
        Route::get('/users/create', CreateController::class)->name('users.create');
        Route::post('/users', StoreController::class)->name('users.store');
        Route::get('/users/{user}', ShowController::class)->name('users.show');
        Route::get('/users/{user}/edit', EditController::class)->name('users.edit');
        Route::patch('/users/{user}', UpdateController::class)->name('users.update');
        Route::delete('/users/{user}', DestroyController::class)->name('users.destroy');
    });
    Route::namespace('App\Http\Controllers\Product')->group(function () {  
        Route::get('/products', IndexController::class)->name('products.index');
        Route::get('/products/create', CreateController::class)->name('products.create');
        Route::post('/products', StoreController::class)->name('products.store');
        Route::get('/products/{product}', ShowController::class)->name('products.show');
        Route::get('/products/{product}/edit', EditController::class)->name('products.edit');
        Route::patch('/products/{product}', UpdateController::class)->name('products.update');
        Route::delete('/products/{product}', DestroyController::class)->name('products.destroy');
    });
});

// Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';