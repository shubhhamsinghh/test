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
    Route::post('/category-add', [AdminController::class, 'category_add'])->name('category_add');
    Route::post('/category-update', [AdminController::class, 'category_update'])->name('category_update');
    Route::get('/category-delete/{id}', [AdminController::class, 'category_delete'])->name('category_delete');
    Route::get('/category-detail/{url}', [AdminController::class, 'category_detail'])->name('category_detail');
    Route::post('/category-detail-add', [AdminController::class, 'category_detail_add'])->name('category_detail_add');
    Route::post('/category-detail-edit/{id}', [AdminController::class, 'category_detail_update'])->name('category_detail_update');
    Route::get('/category-detail-delete/{id}', [AdminController::class, 'category_detail_delete'])->name('category_detail_delete');
    Route::get('/category-detail-img-delete/{id}', [AdminController::class, 'category_detail_img_delete'])->name('category_detail_img_delete');

    //=========== Portfolio Route ======================
    Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('portfolio');
    Route::post('/portfolio-update', [AdminController::class, 'portfolio_update'])->name('portfolio_update');
    Route::get('/portfolio-delete/{id}', [AdminController::class, 'portfolio_delete'])->name('portfolio_delete');
    Route::post('/portfolio-tab-add', [AdminController::class, 'tab_add'])->name('tab_add');
    Route::post('/portfolio-tab-update', [AdminController::class, 'tab_update'])->name('tab_update');
    Route::get('/portfolio-tab-delete/{id}', [AdminController::class, 'tab_delete'])->name('tab_delete');
    Route::get('/portfolio-detail/{url}', [AdminController::class, 'portfolio_detail'])->name('portfolio_detail');
    Route::post('/portfolio-detail-add', [AdminController::class, 'portfolio_detail_add'])->name('portfolio_detail_add');
    Route::post('/portfolio-detail-update', [AdminController::class, 'portfolio_detail_update'])->name('portfolio_detail_update');
    Route::get('/portfolio-detail-delete/{id}', [AdminController::class, 'portfolio_detail_delete'])->name('portfolio_detail_delete');

     //=========== Enquiries Route ======================
    Route::get('/enquiries', [AdminController::class, 'enquiries'])->name('enquiries');
    Route::get('/enquiry-delete/{id}', [AdminController::class, 'enq_delete'])->name('enq_delete');

    Route::get('/change-password', [AdminController::class, 'change_password'])->name('change_password');
    Route::post('/change-password', [AdminController::class, 'update_password'])->name('update_password');
    Route::get('/admin_logout', [AdminController::class, 'admin_logout'])->name('admin_logout');
});

Route::any('{all}', [HomeController::class, 'default'])->where('all', '.*');
