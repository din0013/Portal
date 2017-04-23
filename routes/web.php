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
    return view('welcome');
});

Route::prefix('user')
    ->group(function () {
        Route::get('/index', 'UserController@index')
            ->name('index');

        Route::get('/create', 'UserController@create')
            ->name('create');

        Route::get('/edit/{id?}', 'UserController@edit')
            ->name('edit')
            ->where('id', '[0-9]*');

        Route::post('/register', 'UserController@register')
            ->name('register');

        Route::get('/delete/{id?}', 'UserController@delete')
            ->name('delete')
            ->where('id', '[0-9]*');
    });

Route::prefix('auth')
    ->group(function () {
        Route::get('/login', 'AuthController@login')
            ->name('login');

        Route::post('/doLogin', 'AuthController@doLogin')
            ->name('doLogin');

        Route::get('/logout', 'AuthController@logout')
            ->name('logout');
    });
