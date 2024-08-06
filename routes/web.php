<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/login', [UserController::class, 'getLoginView'])->name('login');

Route::post('/register', [UserController::class, 'register'])->name('post.register');
Route::post('/login', [UserController::class, 'login'])->name('post.login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', '/dashboard');

    Route::get('/dashboard/{page?}/{limit?}', [DashboardController::class, 'getDashboardView'])
        ->name('dashboard')
        ->where(['page' => '[0-9]+', 'limit' => '[0-9]+']);

    Route::get('search/{query}/{page?}/{limit?}', [DashboardController::class, 'getDashboardQueryView'])
        ->name('search.dashboard')
        ->where(['page' => '[0-9]+', 'limit' => '[0-9]+']); 
});
