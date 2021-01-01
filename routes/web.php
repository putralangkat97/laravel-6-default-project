<?php

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/admin', 'DashboardController@index')
            ->name('dashboard');
    });

Route::namespace('Auth')
    ->group(function () {
        Route::middleware(['guest'])
            ->group(function () {
                Route::get('/register', 'RegisterController@index')
                    ->name('register');
                Route::post('/register', 'RegisterController@store');
        
                Route::get('/login', 'LoginController@index')
                    ->name('login');
                Route::post('/login', 'LoginController@store');
            });

        Route::post('/logout', 'LogoutController@store')
            ->name('logout');
    });
