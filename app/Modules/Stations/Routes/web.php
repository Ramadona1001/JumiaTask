<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Stations\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::prefix("stations")->group(function () {
            Route::get('/all', 'StationsController@index')->name('stations');
            Route::get('/create', 'StationsController@create')->name('create_stations');
            Route::post('/store', 'StationsController@store')->name('store_stations');
            Route::get('/edit/{id}', 'StationsController@edit')->name('edit_stations');
            Route::post('/update/{id}', 'StationsController@update')->name('update_stations');
            Route::get('/show/{id}', 'StationsController@show')->name('show_stations');
            Route::get('/delete/{id}', 'StationsController@destroy')->name('destroy_stations');
            Route::post('/upload', 'StationsController@upload')->name('upload_stations');
        });
    });
});
