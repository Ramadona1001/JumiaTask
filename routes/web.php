<?php

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]], function(){
    Route::group(['prefix' => 'backend'], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('/all-users/{type?}', [UserController::class,'index'])->name('users');
        Route::get('/users/create', [UserController::class,'create'])->name('create_users');
        Route::post('/users/store', [UserController::class,'store'])->name('store_users');
        Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('edit_users');
        Route::post('/users/update/{id}', [UserController::class,'update'])->name('update_users');
        Route::get('/users/show/{id}', [UserController::class,'show'])->name('show_users');
        Route::get('/users/delete/{id}', [UserController::class,'destroy'])->name('destroy_users');
        Route::post('/users/logout', [UserController::class,'logout'])->name('logout_users');
    });
    Route::get('/clear',function(){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return back();
    })->name('clear_cache');

});

Auth::routes();
