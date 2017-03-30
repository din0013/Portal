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

Route::get('user', 'UserController@index');

/*Route::prefix('novel')->namespace('Novel')
    ->group(function () {
        # /article
        Route::name('index')
            ->get('/', 'NovelController@index');
        # /article/{num}
        Route::name('post')
            ->get('/{id}', 'NovelController@post')
            ->where('id', '[0-9]+');
        # /article/comment
        Route::name('/comment')
            ->middleware('auth')
            ->post('comment', 'NovelController@comment');
    });*/