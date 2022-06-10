<?php

use Illuminate\Support\Facades\Route;

$namespace = "Api\Controllers";
Route::namespace($namespace)->group(function () {
    Route::prefix("api/seats")->group(function () {
        Route::get('/book', 'SeatController@bookSeat')->name('book_seat_api');
        Route::get('/list-available', 'SeatController@listAvailableSeat')->name('book_available_seat_api');
    });
});


