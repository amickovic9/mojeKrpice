<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\RepliesController;

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
Route::get('/product/{product}', [ProductController::class, 'showProduct']);

//Prouct routes

Route::middleware(['auth'])->group(function () {
    Route::get('/add-product', [ProductController::class, 'showAddProductPage']);
    Route::post('/add-product', [ProductController::class, 'addProduct']);
    Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart']);
    Route::get('/my-cart', [CartController::class, 'showMyCart']);
    Route::get('/remove-from-cart/{cart}', [CartController::class, 'removeFromCart']);
    Route::post('/make-order', [OrderController::class, 'showMakeOrderPage']);
    Route::post('/submit-order', [OrderController::class, 'makeOrder']);
    Route::get('/my-products', [ProductController::class, 'showMyProductsPage']);
    Route::get('/delete-product/{product}', [ProductController::class, 'deleteProduct']);
    Route::get('/edit-product/{product}', [ProductController::class, 'showEditProductPage']);
    Route::post('/edit-product/{product}', [ProductController::class, 'updateProduct']);
    Route::post('/update-order/{order}', [OrderController::class, 'updateOrder']);
    Route::get('/my-orders', [OrderController::class, 'showMyOrdersPage']);
    Route::get('/edit-order/{order}', [OrderController::class, 'showEditOrderPage']);
    Route::post('/edit-order/{order}', [OrderController::class, 'editOrder']);
    Route::get('/delete-order/{order}', [OrderController::class, 'deleteOrder']);
    Route::get('/contact-us', [ContactMessagesController::class, 'showContactUsPage']);
    Route::post('/contact-us', [ContactMessagesController::class, 'createContactMessage']);
    Route::get('/contact-us/{contact}', [ContactMessagesController::class, 'showContactMessage']);
    Route::post('/reply', [RepliesController::class, 'addReply']);
});

Route::get('/all-products', [ProductController::class, 'showAllProducts']);


// Admin routes


Route::prefix('/admin')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'showAdminPage']);
    Route::get('/statistic', [AdminController::class, 'showStatisticPage']);
    Route::get('/users', [AdminController::class, 'showUsersPage']);
    Route::get('/products', [AdminController::class, 'showProductsPage']);
    Route::get('/delete-product/{product}', [AdminController::class, 'deleteProduct']);
    Route::get('/edit-product/{product}', [AdminController::class, 'showEditProductPage']);
    Route::post('/edit-product/{product}', [AdminController::class, 'editProduct']);
    Route::get('/delete-user/{user}', [AdminController::class, 'deleteUser']);
    Route::get('/edit-user/{user}', [AdminController::class, 'showEditUserPage']);
    Route::put('/edit-user/{user}', [AdminController::class, 'updateUser']);
    Route::get('/orders', [AdminController::class, 'showOrdersPage']);
    Route::get('/delete-order/{order}', [AdminController::class, 'deleteOrder']);
    Route::get('/edit-order/{order}', [AdminController::class, 'showEditOrderPage']);
    Route::put('/edit-order/{order}', [AdminController::class, 'updateOrder']);
    Route::get('/messages', [AdminController::class, 'showMessagesPage']);
    Route::get('/message/{message}', [AdminController::class, 'showMessage']);
});
