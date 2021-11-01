<?php

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
Route::prefix('admin')->group(function () {
    Route::get('login',[App\Http\Controllers\Admin\LoginController::class,'index'])->name('login');
    Route::post('login',[App\Http\Controllers\Admin\LoginController::class,'login'])->name('login');
    Route::middleware(['validate'])->group(function () {
        Route::get('/logout',[App\Http\Controllers\Admin\LoginController::class,'logout']);
        //Home
        Route::get('',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');
        Route::get('/home',[App\Http\Controllers\Admin\HomeController::class,'index']);
        //Users
        Route::get('/users',[App\Http\Controllers\Admin\UserController::class,'index']);
        Route::get('/user-lists',[App\Http\Controllers\Admin\UserController::class,'list']);
        Route::get('/users/{id}',[App\Http\Controllers\Admin\UserController::class,'showUser']);
        Route::post('/add-user',[App\Http\Controllers\Admin\UserController::class,'addUser']);
        Route::post('/edit-user/{id}',[App\Http\Controllers\Admin\UserController::class,'editUser']);
        Route::get('/delete-user/{id}',[App\Http\Controllers\Admin\UserController::class,'deleteUser']);
        Route::post('/user-search',[App\Http\Controllers\Admin\UserController::class,'search']);
        //clients
        Route::get('/clients',[App\Http\Controllers\Admin\ClientController::class,'index']);
        Route::get('/client-lists',[App\Http\Controllers\Admin\ClientController::class,'list']);
        Route::get('/client-lists/action',[App\Http\Controllers\Admin\ClientController::class,'status']);
        Route::post('/client-search',[App\Http\Controllers\Admin\ClientController::class,'search']);
        //profile
        Route::get('/profile/{id}',[App\Http\Controllers\Admin\ProfileController::class,'myProfile']);
        Route::post('/edit-profile/{id}',[App\Http\Controllers\Admin\ProfileController::class,'edit']);
        //product
        Route::get('/products',[App\Http\Controllers\Admin\ProductController::class,'index']);
        Route::post('/add-product',[App\Http\Controllers\Admin\ProductController::class,'addProduct']);
        Route::get('/products/{id}',[App\Http\Controllers\Admin\ProductController::class,'showProduct']);
        Route::post('/edit-product/{id}',[App\Http\Controllers\Admin\ProductController::class,'editProduct']);
        Route::get('/delete-product/{id}',[App\Http\Controllers\Admin\ProductController::class,'deleteProduct']);
        Route::post('/product-search',[App\Http\Controllers\Admin\ProductController::class,'search']);
        //size
        Route::post('/add-size',[App\Http\Controllers\Admin\SizeController::class,'addSize']);
        Route::get('/edit-size/{id}',[App\Http\Controllers\Admin\SizeController::class,'editSize']);
        Route::get('/delete-size/{id}',[App\Http\Controllers\Admin\SizeController::class,'deleteSize']);
        //invoices
        Route::get('/invoices',[App\Http\Controllers\Admin\InvoiceController::class,'index']);
        Route::get('/invoice-view/{id}',[App\Http\Controllers\Admin\InvoiceController::class,'showInvoice']);
        //brands
        Route::get('/brand-product',[App\Http\Controllers\Admin\BrandProductController::class,'index']);
        //chat
        Route::get('/chat',[App\Http\Controllers\Admin\ChatController::class,'index']);
    });
    
});

    