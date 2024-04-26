<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/
//Home routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [HomeController::class, 'showRegisterPage']);
Route::post('/register', [HomeController::class, 'register']);
Route::get('/login', [HomeController::class, 'showLoginPage']);
Route::post('/login', [HomeController::class, 'login']);
Route::get('/logout', [HomeController::class, 'logout']);

//Prouct routes

Route::middleware(['auth'])->group(function () {
    Route::get('/add-product', [ProductController::class, 'showAddProductPage']);
    Route::post('/add-product', [ProductController::class, 'addProduct']);
});

Route::get('/all-products', [ProductController::class, 'showAllProducts']);


// Admin routes

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'showAdminPage']);
});
