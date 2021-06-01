<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\JwtTokenIsValid;

Route::group([
    'namespace' => 'App\Http\Controllers\Api',
    'prefix' => 'v1',
], function () {
    // AUTH
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
        Route::post('register', 'RegisterController@register');
        Route::post('resend-phone-verification', 'VerifyController@resendPhoneVerification');
        Route::post('verify-phone', 'VerifyController@verifyPhone');
        Route::post('login', 'LoginController@login');
        // ForgotPassword
        Route::group(['prefix' => 'password'], function () {
            Route::put('update', 'SettingController@updatePassword')->middleware(JwtTokenIsValid::class);
            Route::post('set', 'ResetPasswordController@setNewPassword');
            Route::post('forgot', 'ResetPasswordController@forgotPassword');
            Route::post('resend', 'ResetPasswordController@resend');
            Route::post('code', 'ResetPasswordController@checkCode');
        });
        Route::post('update-avatar', 'SettingController@updateAvatar');

        // AuthedUser
        Route::group([
            'middleware' => JwtTokenIsValid::class,
        ], function () {
            Route::post('logout', 'LoginController@logout');
            Route::put('update', 'SettingController@updateProfile');
        });
    });
    // General
    Route::group(['namespace' => 'General', 'prefix' => 'general'], function () {
        Route::get('settings', 'SettingController@getSettings');
        Route::get('banks', 'BankController@index');
        Route::get('cities', 'DropDownController@cities');
        Route::get('countries', 'DropDownController@countries');
        Route::get('pages/{user_type}/{type}', 'PageController@getPage');
    });
    //Home
    Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {
        Route::get('slider', 'SliderController@index');
    });
    Route::get('contact-types', 'Contact\ContactController@contactTypes');

    //Authed end points
    Route::group([
        'middleware' => JwtTokenIsValid::class,
    ], function () {
        //Contact
        Route::group([
            'namespace' => 'Contact'
        ], function () {
            Route::post('contact', 'ContactController@store');
        });
        //Notification
        Route::group([
            'namespace' => 'Notification',
        ], function () {
            Route::group(['prefix' => 'notifications'], function () {
                Route::get('/', 'NotificationController@index');
                Route::get('/{id}', 'NotificationController@show');
            });
        });

    });


});
