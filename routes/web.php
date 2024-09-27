<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Product\ManufacturerController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
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

Route::middleware(['admin'])->prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'viewAdminDashboardPage'])->name('dashboard.admin.page');


    Route::get('/product/{product_id}/update-stock', [ProductController::class, 'viewUpdateStockPage'])->name('update-stock.page');

    Route::put('/product/{product_id}/update-stock', [ProductController::class, 'updateStock'])->name('update-stock.action');

    Route::get('/user/{user_id}', function (string $user_id) {
        $user = User::find($user_id);

        return view('profile', ['user' => $user]);
    })->name('user.profile.by.admin.page');

    Route::put('/user/{user_id}', [UserController::class, 'updateUserRole'])->name('user.profile.update.action');
});

Route::get('/', [DashboardController::class, 'viewDashboardPage'])->name('dashboard.viewer.page');

Route::get('/form/page/create-product', [ProductController::class, 'viewCreateProductPage'])->name('create.product.page');
Route::post('/form/action/create-product', [ProductController::class, 'create'])->name('create.product.action');

Route::get('/form/page/create-manufacturer', [ManufacturerController::class, 'viewCreateManufacturerPage'])->name('create.manufacturer.page');
Route::post('/form/action/create-manufacturer', [ManufacturerController::class, 'create'])->name('create.manufacturer.action');

Route::get('/form/page/create-product-category', [ProductCategoryController::class, 'viewCreateProductCategoryPage'])->name('create.product-category.page');
Route::post('/form/action/create-product-category', [ProductCategoryController::class, 'create'])->name('create.product-category.action');

Route::get('/product/{product_id}', [ProductController::class, 'viewProductDetailPage'])->name('view.product.detail.page');

Route::get('/login', [LoginController::class, 'viewloginPage'])->name('login.page');
Route::post('/login', [LoginController::class, 'login'])->name('login.action');

Route::get('/register', [RegisterController::class, 'viewRegisterPage'])->name('register.page');
Route::post('/register', [RegisterController::class, 'register'])->name('register.action');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy.page');

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions.page');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us.page');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout.action');

Route::delete('/product/{product_id}', [ProductController::class, 'delete'])->name('delete.product.action');

Route::get('/profile', function () {
    return view('profile', ['user' => auth()->user()]);
})->name('user.profile.page');

Route::get('/product-categories', [ProductCategoryController::class, 'viewProductCategoriesPage'])->name('product-categories.page');

Route::get('/product-category/{category_id}', function (string $category_id) {})->name('product-category.product.page');
