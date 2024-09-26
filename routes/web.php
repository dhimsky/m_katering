<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::namespace('App\Http\Controllers\Auth')->group(function(){
    Route::get('/', 'LoginController@index')->name('/');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register/simpan', 'RegisterController@store')->name('register.store');
});

Route::middleware(['auth'])->group(function (){
    Route::namespace('App\Http\Controllers\Merchant')->prefix('merchant')->name('merchant.')->middleware('CekUserLogin:merchant')->group(function (){
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/menu', 'MenuController@index')->name('menu');
        Route::post('/menu/tambah', 'MenuController@store')->name('menu.store');
        Route::delete('/menu/hapus/{id}', 'MenuController@destroy')->name('menu.destroy');
        
        Route::get('/orders', 'OrderController@index')->name('orders');

        Route::get('/profile', 'ProfileController@index')->name('profile');
    });

    Route::namespace('App\Http\Controllers\Customer')->prefix('customer')->name('customer.')->middleware('CekUserLogin:customer')->group(function (){
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/orders', 'OrderController@index')->name('orders');
        Route::post('/orders', 'OrderController@store')->name('orders.store');
        Route::delete('/orders/{id}', 'OrderController@destroy')->name('orders.destroy');

        Route::get('/profile', 'ProfileController@index')->name('profile');
    });
});