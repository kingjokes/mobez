<?php

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

Route::get('/', function () {
    return view('home');
})->name(('home'));

Route::get('/shop', function () {
    return view('shop');
})->name(('shop'));

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


Route::get('/order-complete', function () {
    return view('order-complete');
})->name(('order-complete'));

 
Route::get('/product', function () {
    return view('product');
})->name(('product'));