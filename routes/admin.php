<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoriesController;



Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'getDashboard']);
    Route::get('/users', [UserController::class, 'getUsers']);


    Route::get('/products', [ProductController::class, 'getHome']);
    Route::get('/product/add', [ProductController::class, 'getProductAdd']);
    /* Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); */

    // ... Otras rutas ...

    Route::get('/categories/{module}', [CategoriesController::class, 'getHome']);
    Route::post('/category/add', [CategoriesController::class, 'postCategoryAdd']);
    Route::get('/category/{id}/edit', [CategoriesController::class, 'getEditCategory'])->name('admin.categories.edit');
    Route::post('/category/{id}/edit', [CategoriesController::class, 'postEditCategory']);
    Route::get('/category/{id}/delete', [CategoriesController::class, 'getDeleteCategory'])->name('admin.categories.delete');
    Route::put('/category/{id}/edit', [CategoriesController::class, 'postEditCategory']);
    
});
