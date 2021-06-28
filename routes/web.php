<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Web')->group(function() {
    Route::get('change/lang', 'LocalizationController@LangChange')->name('LangChange');
    Route::namespace('Auth')->group(function(){
        Route::get('/login/{type}','LoginController@showLoginForm')->name('login');
        Route::get('/signup/{type}','RegisterController@showRegisterForm')->name('signup');

        Route::post('/login','LoginController@login')->name('login.submit');
        Route::post('/signup','RegisterController@RegisterSubmit')->name('signup.submit');

        Route::get('/activate','RegisterController@showActivationPage')->name('activate');
        Route::post('/activate','RegisterController@ActivationSubmit')->name('activate.submit');

        Route::post('/logout','LoginController@logout')->name('logout');
    });
    Route::get('/','HomeController@index')->name('index');
    Route::get('/home', 'HomeController@home')->name('home');

});




Route::prefix('/admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function() {
    Route::namespace('Auth')->group(function(){
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login.submit');
        Route::post('/logout','LoginController@logout')->name('logout');
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });
    Route::get('clear-all-notifications', 'NotificationController@clearAdminNotifications')->name('clear-all-notifications');
    Route::get('read-notification/{id}', 'NotificationController@readNotification')->name('read-notification');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::put('/profile', 'AdminController@updateProfile')->name('profile.update');
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'ProviderController');
    Route::post('user/{id}/ban', 'UserController@ban')->name('user.ban');
    Route::post('user/{id}/activate', 'UserController@activate')->name('user.activate');
    Route::post('notification/{id}','NotificationController@sendSingleNotification')->name('notification.send-single-notification');
    Route::resource('notification', 'NotificationController');
    Route::resource('contact', 'ContactController');
    Route::resource('contact_type', 'ContactTypeController');
    Route::post('contact_type/{id}/ban', 'ContactTypeController@ban')->name('contact_type.ban');
    Route::post('contact_type/{id}/activate', 'ContactTypeController@activate')->name('contact_type.activate');
    Route::resource('slider', 'ProductController');
    Route::post('slider/{id}/ban', 'ProductController@ban')->name('slider.ban');
    Route::post('slider/{id}/activate', 'ProductController@activate')->name('slider.activate');
    Route::get('page/{type}/{for}', 'PageController@page')->name('page.edit');
    Route::put('page/{id}', 'PageController@update')->name('page.update');

    Route::resource('city', 'CityController');

    Route::get('/formula-content-classifications', 'FormulaContentOfNutrientsController@classifications')->name('formula_content.classifications');
    Route::post('/formula-content-classifications/{id}/ban', 'FormulaContentOfNutrientsController@ban')->name('formula_content.ban_classification');
    Route::post('/formula-content-classifications/{id}/activate', 'FormulaContentOfNutrientsController@activate')->name('formula_content.activate_classification');

    Route::get('/formula_nutrients', 'FormulaContentOfNutrientsController@formula_nutrients')->name('formula_content.formula_nutrients');
    Route::post('/formula_nutrients/{id}/ban', 'FormulaContentOfNutrientsController@ban_formula_nutrients')->name('formula_content.ban_formula_nutrient');
    Route::post('/formula_nutrients/{id}/activate', 'FormulaContentOfNutrientsController@activate_formula_nutrients')->name('formula_content.activate_formula_nutrient');


});
