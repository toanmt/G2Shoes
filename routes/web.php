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
    //Home
    Route::get('',[App\Http\Controllers\User\HomeController::class,'index']);
    Route::post('/search',[App\Http\Controllers\User\HomeController::class,'search']);
    //Brand
    Route::get('/brand/{id}',[App\Http\Controllers\User\BrandController::class,'index']);
    Route::get('/brand/{id}/filter',[App\Http\Controllers\User\BrandController::class,'filter']);
    //Product
    Route::get('/product_details/{id}',[App\Http\Controllers\User\ProductController::class,'index']);
    //Comment
    Route::post('/add-comment',[App\Http\Controllers\User\CommentController::class,'addComment']);
    //Sale
    Route::get('/sales',[App\Http\Controllers\User\SalesController::class,'index']);
    Route::get('/sales/filter',[App\Http\Controllers\User\SalesController::class,'filter']);
    //Contact
    Route::get('/contact',[App\Http\Controllers\User\ContactController::class,'index']);
    //Introduce
    Route::get('/introduce',[App\Http\Controllers\User\IntroduceController::class,'index']);
    //Payment
    Route::get('/payment',[App\Http\Controllers\User\PaymentController::class,'index']);
});

Route::prefix('admin')->group(function () {
    Route::get('login',[App\Http\Controllers\Admin\LoginController::class,'index'])->name('login');
    Route::post('login',[App\Http\Controllers\Admin\LoginController::class,'login'])->name('login');
    Route::get('forgot-password',[App\Http\Controllers\Admin\LoginController::class,'forgotPass']);
    Route::post('send-mail',[App\Http\Controllers\Admin\LoginController::class,'sendMail']);
    Route::get('reset-password',[App\Http\Controllers\Admin\LoginController::class,'resetPass']);
    Route::get('change-password',[App\Http\Controllers\Admin\HomeController::class,'changePass']);
    Route::post('reset-pass',[App\Http\Controllers\Admin\LoginController::class,'resetPassPost']);
    Route::middleware(['validate'])->group(function () {
        Route::get('/logout',[App\Http\Controllers\Admin\LoginController::class,'logout']);
        //Home
        Route::get('',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');
        Route::get('/chartMonth',[App\Http\Controllers\Admin\HomeController::class,'chartMonth']);
        //product
        Route::get('/products',[App\Http\Controllers\Admin\ProductController::class,'index']);
        Route::post('/add-product',[App\Http\Controllers\Admin\ProductController::class,'addProduct']);
        Route::get('/products/{id}',[App\Http\Controllers\Admin\ProductController::class,'showProduct']);
        Route::post('/edit-product/{id}',[App\Http\Controllers\Admin\ProductController::class,'editProduct']);
        Route::get('/delete-product/{id}',[App\Http\Controllers\Admin\ProductController::class,'deleteProduct']);
        Route::post('/product-search',[App\Http\Controllers\Admin\ProductController::class,'search']);

         //image
        Route::get('/image-product',[App\Http\Controllers\Admin\ImageController::class,'index']);
        Route::get('/image/{id}',[App\Http\Controllers\Admin\ImageController::class,'showImage']);
        Route::post('/edit-image/{id}',[App\Http\Controllers\Admin\ImageController::class,'editImage']);
        Route::get('/delete-image/{id}',[App\Http\Controllers\Admin\ImageController::class,'deleteImage']);
        Route::post('/image-search',[App\Http\Controllers\Admin\ImageController::class,'searchImage']);

        Route::post('/add-size',[App\Http\Controllers\Admin\SizeController::class,'addSize']);
        Route::get('/edit-size/{id}',[App\Http\Controllers\Admin\SizeController::class,'editSize']);
        Route::get('/delete-size/{id}',[App\Http\Controllers\Admin\SizeController::class,'deleteSize']);
        //brands
        Route::get('/brand-product',[App\Http\Controllers\Admin\BrandProductController::class,'index']);
        Route::post('/add-brand',[App\Http\Controllers\Admin\BrandProductController::class,'addBrand']);
        Route::get('/delete-brand/{id}',[App\Http\Controllers\Admin\BrandProductController::class,'deleteBrand']);
        Route::get('/brand/{id}',[App\Http\Controllers\Admin\BrandProductController::class,'showBrand']);
        Route::post('/edit-brand/{id}',[App\Http\Controllers\Admin\BrandProductController::class,'editBrand']);
        //voucher
        Route::get('/voucher',[App\Http\Controllers\Admin\VoucherController::class,'index']);
        Route::post('/add-voucher',[App\Http\Controllers\Admin\VoucherController::class,'addVoucher']);
        Route::get('/delete-voucher/{id}',[App\Http\Controllers\Admin\VoucherController::class,'deleteVoucher']);
        Route::get('/voucher/{id}',[App\Http\Controllers\Admin\VoucherController::class,'showVoucher']);
        Route::post('/edit-voucher/{id}',[App\Http\Controllers\Admin\VoucherController::class,'editVoucher']);
        //type
        Route::post('/add-type/{id}',[App\Http\Controllers\Admin\TypeController::class,'addType']);
        Route::get('/del-type/{id}',[App\Http\Controllers\Admin\TypeController::class,'delType']);
        Route::get('/edit-type/{id}',[App\Http\Controllers\Admin\TypeController::class,'editType']);
        
        //size
        Route::get('/sizes',[App\Http\Controllers\Admin\SizeController::class,'index']);
        Route::post('/add-size',[App\Http\Controllers\Admin\SizeController::class,'addSize']);
        Route::get('/edit-size/{id}',[App\Http\Controllers\Admin\SizeController::class,'editSize']);
        Route::get('/delete-size/{id}',[App\Http\Controllers\Admin\SizeController::class,'deleteSize']);

        //invoices
        Route::get('/invoices',[App\Http\Controllers\Admin\InvoiceController::class,'index']);
        Route::get('/invoice-view/{id}',[App\Http\Controllers\Admin\InvoiceController::class,'showInvoice']);
        Route::get('/edit-invoice/{id}',[App\Http\Controllers\Admin\InvoiceController::class,'editInvoice']);
        Route::post('/search-invoice',[App\Http\Controllers\Admin\InvoiceController::class,'searchInvoice']);
        Route::get('/send-invoice/{id}',[App\Http\Controllers\Admin\InvoiceController::class,'sendInvoice']);

        //report
        Route::get('/report',[App\Http\Controllers\Admin\ReportController::class,'index']);
        Route::post('/filterReport',[App\Http\Controllers\Admin\ReportController::class,'filter']);
        Route::get('/data30day',[App\Http\Controllers\Admin\ReportController::class,'data30day']);
    });
    
});
