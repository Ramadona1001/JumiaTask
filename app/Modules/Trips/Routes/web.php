<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Trips\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/trips")->group(function () {
                Route::get('/all', 'TripsController@index')->name('trips');
                Route::get('/create', 'TripsController@create')->name('create_trips');
                Route::post('/store', 'TripsController@store')->name('store_trips');
                Route::get('/edit/{id}', 'TripsController@edit')->name('edit_trips');
                Route::post('/update/{id}', 'TripsController@update')->name('update_trips');
                Route::get('/show/{id}', 'TripsController@show')->name('show_trips');
                Route::get('/delete/{id}', 'TripsController@destroy')->name('destroy_trips');
                Route::post('/upload', 'TripsController@upload')->name('upload_trips');
                Route::get('/get-stations', 'TripsController@getStation')->name('stations_trips');
            });
        });
    });
});
