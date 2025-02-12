<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    
});

