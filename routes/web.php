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

Route::group(['midlleware' => 'web'], function() {

    Auth::routes();
    Route::get('prokers/get', 'LogController@get_proker')->name('log.prokers');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('proker', 'ProkerController');
    Route::resource('log', 'LogController');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {

        Route::resource('config', 'ConfigController', [
            'except' => ['destroy']
        ]);

    });


});
