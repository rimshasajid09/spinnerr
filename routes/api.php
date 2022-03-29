<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('admin/users/csv', 'Admin\UsersController@csv')->name('admin.reports.csv');

Route::group([ 'as' => 'frontend.'], function () {
    Route::get('register', 'Frontend\RegisterController@get')->name('register.get');
    Route::post('register', 'Frontend\RegisterController@store')->name('register.store');
    Route::get('spin-and-win', 'Frontend\WheelController@get')->name('spin-and-win.get');
    Route::post('spin-and-win', 'Frontend\WheelController@result')->name('spin-and-win.result');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::post('login', 'Admin\Auth\LoginController@login')->name('login');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('dashboard','Admin\DashboardController@index')->name('dashboard.index');
        Route::get('me', 'Admin\Auth\ProfileController@me')->name('profile.show');
        Route::get('profile/edit', 'Admin\Auth\ProfileController@edit')->name('profile.edit');
        Route::patch('profile', 'Admin\Auth\ProfileController@update')->name('profile.update');
        Route::get('routes', 'Admin\Auth\ProfileController@routes')->name('routes.index');

        Route::resource('admins', 'Admin\AdminsController');
        Route::resource('users', 'Admin\UsersController');
        Route::resource('prizes', 'Admin\PrizesController');
        Route::resource('products', 'Admin\ProductsController');
        Route::resource('roles', 'Admin\RolesController');
        Route::resource('traffic', 'Admin\TrafficController');

    });
});
