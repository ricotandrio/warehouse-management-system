<?php

use App\Http\Controllers\Product\ManufacturerController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\DashboardController;
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

Route::get('/form/page/create-product', [ProductController::class, 'viewCreateProductPage'])->name('create.product.page');
Route::post('/form/action/create-product', [ProductController::class, 'create'])->name('create.product.action');

Route::get('/form/page/create-manufacturer', [ManufacturerController::class, 'viewCreateManufacturerPage'])->name('create.manufacturer.page');
Route::post('/form/action/create-manufacturer', [ManufacturerController::class, 'create'])->name('create.manufacturer.action');

Route::get('/form/page/create-product-category', [ProductCategoryController::class, 'viewCreateProductCategoryPage'])->name('create.product-category.page');
Route::post('/form/action/create-product-category', [ProductCategoryController::class, 'create'])->name('create.product-category.action');
