<?php

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

Route::get('/', function () {
    return view('front.pages.home');
})->name('inicio');


Route::get('/contacto', function () {
    return view('front.pages.contact');
})->name('contacto');

Route::get('/carrito', function () {
    return view('front.pages.card_single');
})->name('carrito');

Route::get('/order', function () {
    return view('front.pages.order');
})->name('orden');

Route::get('/verificacion', function () {
    return view('front.pages.checkout');
})->name('verificacion');

Route::get('/iniciar', function () {
    return view('front.pages.login');
})->name('iniciar');

Auth::routes();
