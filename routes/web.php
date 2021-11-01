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
Route::prefix('')->group(function () {
    Route::get('',[App\Http\Controllers\User\HomeController::class,'index']);
});

Route::prefix('admin')->group(function () {
    Route::get('login',[App\Http\Controllers\Admin\LoginController::class,'index'])->name('login');
    Route::post('login',[App\Http\Controllers\Admin\LoginController::class,'login'])->name('login');
    Route::get('forgot-password',[App\Http\Controllers\Admin\LoginController::class,'forgotPass']);
    Route::post('send-mail',[App\Http\Controllers\Admin\LoginController::class,'sendMail']);
    Route::get('reset-password',[App\Http\Controllers\Admin\LoginController::class,'resetPass']);
    Route::post('reset-pass',[App\Http\Controllers\Admin\LoginController::class,'resetPassPost']);
    Route::middleware(['validate'])->group(function () {
        Route::get('/logout',[App\Http\Controllers\Admin\LoginController::class,'logout']);
        //Home
        Route::get('',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');
        Route::get('/home',[App\Http\Controllers\Admin\HomeController::class,'index']);
    });
    
});
