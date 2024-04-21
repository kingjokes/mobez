<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'homePage')->name(('home'));

    Route::get('/shop', 'ShopPage')->name(('shop'));

    Route::get('/faq', function () {
        return view('faq');
    })->name(('faq'));

    Route::get('/about-us', function () {
        return view('about');
    })->name(('about'));

    Route::get('/contact-us', function () {
        return view('contact');
    })->name(('contact'));


    Route::get('/cart', function () {
        return view('shop-cart');
    })->name(('shop-cart'));

    Route::get('/check-out', function () {
        return view('shop-checkout');
    })->name(('shop-checkout'));


    Route::get('/order-complete', 'OrderCompletePage')->name(('order-complete'));


    Route::get('/product/{id}/{slug}','ProductDetails')->name(('product'));

    Route::post('add-review', 'addReview');
    Route::post('send-message', 'sendMessage');
    Route::post('add-order', 'addOrder')->name('add.order');
});



Route::controller(AdminController::class)->prefix('/admin/')->group(function () {

    Route::get('login', 'Index')->name('admin.login');

    Route::post('check-login', 'login');


    Route::middleware(['admin.auth'])->group(function () {

        Route::get('dashboard', 'dashboardPage')->name('admin.dashboard');
        Route::get('product-categories', 'categoryPage')->name('admin.category');

        Route::get('add-category', 'categoryAddPage')->name('admin.add-category');

        Route::post('new-category', 'addCategory');

        Route::get('delete-category/{id}', 'deleteCategory');

        Route::post('update-order', 'updateOrder');

        Route::get('delete-order/{id}', 'deleteOrders');

        Route::get('settings', 'settingsPage')->name('admin.settings');

        Route::post('update-settings', 'updateSettings');

        Route::post('change-password', 'changePassword');

        Route::get('products', 'productPage')->name('admin.products');

        Route::get('product/{id}', 'productDetailsPage')->name('admin.product-details');

        Route::get('add-product', 'addProductPage')->name('admin.add-product-page');

        Route::get('edit-product/{id}', 'editProductPage')->name('admin.edit-product-page');

        Route::post('edit-product', 'editProduct');

        Route::post('add-new-product', 'addProduct')->name('admin.add-product');

        Route::get('delete-product/{id}', 'deleteProduct');

        Route::get('delete-product-image/{id}', 'deleteProductImage');



        Route::get('orders', 'ordersPage')->name('admin.orders');

        Route::get('order-details/{id}', 'orderDetails')->name('admin.order-details');

        Route::post('add-order', 'addOrders');



        Route::get('reviews', 'reviewsPage')->name('admin.reviews');

        Route::post('add-review', 'addReview');

        Route::get('delete-review/{id}', 'deleteReview');
    });


    Route::get('logout', 'Logout')->name('admin.logout');
});
