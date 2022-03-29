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


use App\Mail\Frontend\UserRegisteredEmail;
use App\Models\User;

Route::get('__test', 'TestController@index');

Route::group(['as' => 'frontend.'], function () {
    Route::get('faq', 'Frontend\FAQController@index')->name('faq.index');
    Route::get('terms-and-conditions', 'Frontend\TermsAndConditionsController@index')->name('terms-and-conditions.index');


    Route::group(['middleware' => 'eut'], function () {
        Route::get('thank-you', 'Frontend\ThankYouController@index')->name('thank-you.index');
        Route::get('/spin-and-win', 'Frontend\WheelController@index')->name('spin-and-win.index');
        Route::get('winner', 'Frontend\WheelController@winner')->name('spin-and-win.winner');

    });


    Route::get('/try-again', function () {
        return view('frontend.try-again.index');
    });
    Route::group(['middleware' => 'utm'], function () {
        Route::get('/', 'Frontend\RegisterController@index')->name('register.index');

    });
    Route::post('register', 'Frontend\RegisterController@store')->name('register.store');
    Route::get('mailable', function () {
        $user = User::find(1);
        return new UserRegisteredEmail($user);
    });
});



