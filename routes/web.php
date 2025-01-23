<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'default'])->name('index'); 
// Route::get('thank_you', [HomeController::class, 'thank_you'])->name('thank_you');
// Route::get('product/{cat_url}/{sub_cat?}/{product?}', [HomeController::class, 'get_product'])->name('home_get_product');
// Route::get('contact-us', [HomeController::class, 'contact_us'])->name('contact');
// Route::get('about-us', [HomeController::class, 'about_us'])->name('about');
// Route::get('certification', [HomeController::class, 'certification'])->name('certification');
// Route::post('contact_add', [HomeController::class, 'contact_add'])->name('contact_add');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {

    Route::get('/home', [AdminController::class, 'index'])->name('home');
    //=========== Category Route ======================
    Route::get('/category', [AdminController::class, 'category'])->name('category');
    Route::post('/category_add', [AdminController::class, 'category_add'])->name('category_add');
    Route::post('/category_update', [AdminController::class, 'category_update'])->name('category_update');
    Route::get('/category_delete/{id}', [AdminController::class, 'category_delete'])->name('category_delete');
    
    //=========== Sub-Category Route ======================
    Route::get('/sub_category', [AdminController::class, 'sub_category'])->name('sub_category');
    Route::post('/sub_category_add', [AdminController::class, 'sub_category_add'])->name('sub_category_add');
    Route::post('/sub_category_update', [AdminController::class, 'sub_category_update'])->name('sub_category_update');
    Route::get('/sub_category_delete/{id}', [AdminController::class, 'sub_category_delete'])->name('sub_category_delete');
    Route::get('/serial_no', [AdminController::class, 'serial_no'])->name('serial_no');
    
    //=========== Products Route ======================
    Route::get('/product', [AdminController::class, 'product'])->name('product');
    Route::post('/product_add', [AdminController::class, 'product_add'])->name('product_add');
    Route::post('/product_update', [AdminController::class, 'product_update'])->name('product_update');
    Route::get('/product_delete/{id}', [AdminController::class, 'product_delete'])->name('product_delete');
    Route::get('/get_sub_cat/{id}', [AdminController::class, 'get_sub_cat'])->name('get_sub_cat');
    Route::get('/is_trending/{id}', [AdminController::class, 'is_trending'])->name('is_trending');
    Route::get('/is_tab/{id}', [AdminController::class, 'is_tab'])->name('is_tab');

    Route::get('/enquiries', [AdminController::class, 'enquiries'])->name('enquiries');
    Route::get('/enquiry-delete/{id}', [AdminController::class, 'enq_delete'])->name('enq_delete');

    Route::get('/change-password', [AdminController::class, 'change_password'])->name('change_password');
    Route::post('/change-password', [AdminController::class, 'update_password'])->name('update_password');
    Route::get('/admin_logout', [AdminController::class, 'admin_logout'])->name('admin_logout');
});

Route::any('{all}', [HomeController::class, 'default'])->where('all', '.*');
