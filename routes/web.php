<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
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

Route::redirect('/', '/login');

Route::get('/login', [UserController::class, 'getLoginView'])->name('login');

Route::post('/register', [UserController::class, 'register'])->name('post.register');
Route::post('/login', [UserController::class, 'login'])->name('post.login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', '/dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/search', [DashboardController::class, 'search'])->name('search');

    Route::get('/manufacturer', [ManufacturerController::class, 'index'])->name('manufacturer');

    Route::post('/create-product', [ProductController::class, 'createProduct'])->name('create.product');

    Route::get('/product/{product}', [ProductController::class, 'index'])->name('detail.product');

    Route::post('/update-product/{product}', [ProductController::class, 'updateProduct'])->name('update.product');

    Route::delete('/delete-product/{product}', [ProductController::class, 'deleteProduct'])->name('delete.product');

    Route::get('/manufacturer/{manufacturer}', [ManufacturerController::class, 'index'])->name('manufacturer');

    Route::get('manufacturer', [ManufacturerController::class, 'createManufacturerPage'])->name('create.manufacturer.page');

    Route::post('/create-manufacturer', [ManufacturerController::class, 'createManufacturer'])->name('create.manufacturer');

    Route::delete('/manufacturer/{manufacturer}', [ManufacturerController::class, 'deleteManufacturer'])->name('delete.manufacturer');
});
