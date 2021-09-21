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
    Route::get('/user-siteRatio', 'HomeController@siteRatio')->name('siteRatio');
    Route::get('/terms', 'HomeController@terms')->name('terms');
    Route::get('/licence', 'HomeController@licence')->name('licence');

    Route::get('search-provider', 'UserController@search')->name('search-provider');
    Route::get('provider/{id}','ProviderController@show')->name('provider.show');

    Route::post('transfer', 'TransferController@store')->name('transfer');
    Route::post('contact', 'ContactController@store')->name('contact');
    Route::post('rate', 'ProviderController@rateStore')->name('rate');

    Route::get('/user-profile','UserController@profile')->name('userProfile');
    Route::get('/profile','ProviderController@profile')->name('providerProfile');

    Route::post('/profile/{id}/update','ProviderController@updateProfile')->name('provider.update');

    Route::get('/subscribe-package/{id}','ProviderController@subscribePackagePage')->name('provider.subscribe.show');
    Route::post('/subscribe','ProviderController@subscribePackage')->name('provider.subscribe');

    Route::get('product', 'ProductController@create')->name('product.create');
    Route::get('get_category_childs/{id}', 'ProductController@getCategoryChilds');
    Route::post('product', 'ProductController@store')->name('product.store');

    Route::get('notifications', 'NotificationController@notifications')->name('notifications');
    Route::get('category/{id}/providers', 'CategoryController@show')->name('category.show');

    Route::get('gallery/{id}/edit', 'ProductController@editGallery')->name('gallery.edit');
    Route::post('gallery/{id}/update', 'ProductController@UpdateGallery')->name('gallery.update');
    Route::get('product/{id}/edit', 'ProductController@editProduct')->name('product.edit');
    Route::post('product/{id}/update', 'ProductController@UpdateProduct')->name('product.update');

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

    Route::resource('roles', 'RoleController');
    Route::resource('admins', 'AdminsController');

    Route::get('clear-all-notifications', 'NotificationController@clearAdminNotifications')->name('clear-all-notifications');
    Route::get('read-notification/{id}', 'NotificationController@readNotification')->name('read-notification');
    Route::get('settings', 'SettingController@showConfig')->name('settings.edit');
    Route::put('settings', 'SettingController@updateConfing')->name('settings.update');

    Route::get('socials/{name}', 'SocialController@editLink')->name('socials.edit_link');
    Route::put('socials/{name}/update_link', 'SocialController@updateLink')->name('socials.update_link');
    Route::resource('socials', 'SocialController');

    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::put('/profile', 'AdminController@updateProfile')->name('profile.update');

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController');
    Route::post('user/{id}/ban', 'UserController@ban')->name('user.ban');
    Route::post('user/{id}/activate', 'UserController@activate')->name('user.activate');

    Route::get('provider/binned', 'ProviderController@binned')->name('provider.binned');
    Route::get('provider/rejected', 'ProviderController@rejected')->name('provider.rejected');
    Route::resource('provider', 'ProviderController');
    Route::get('provider/{id}/reject', 'ProviderController@reject')->name('provider.reject');
    Route::get('provider/{id}/accept', 'ProviderController@accept')->name('provider.accept');

    Route::resource('category', 'CategoryController');
    Route::resource('sub_category', 'SubCategoryController');
    Route::post('category/{id}/ban', 'CategoryController@ban')->name('category.ban');
    Route::post('category/{id}/activate', 'CategoryController@activate')->name('category.activate');

    Route::resource('product', 'ProductController');
    Route::post('product/{id}/ban', 'ProductController@ban')->name('product.ban');
    Route::post('product/{id}/activate', 'ProductController@activate')->name('product.activate');

    Route::resource('notification', 'NotificationController');
    Route::post('reply-contact/{id}', 'ContactController@replyContact')->name('contact.reply');
    Route::resource('contact', 'ContactController');

    Route::resource('bank', 'BankController');
    Route::post('bank/{id}/ban', 'BankController@ban')->name('bank.ban');
    Route::post('bank/{id}/activate', 'BankController@activate')->name('bank.activate');

    Route::resource('contact_type', 'ContactTypeController');
    Route::post('contact_type/{id}/ban', 'ContactTypeController@ban')->name('contact_type.ban');
    Route::post('contact_type/{id}/activate', 'ContactTypeController@activate')->name('contact_type.activate');

    Route::resource('city', 'CityController');
    Route::post('city/{id}/ban', 'CityController@ban')->name('city.ban');
    Route::post('city/{id}/activate', 'CityController@activate')->name('city.activate');

    Route::resource('slider', 'SliderController');
    Route::post('slider/{id}/ban', 'SliderController@ban')->name('slider.ban');
    Route::post('slider/{id}/activate', 'SliderController@activate')->name('slider.activate');

    Route::resource('package', 'PackageController');
    Route::post('package/{id}/ban', 'PackageController@ban')->name('package.ban');
    Route::post('package/{id}/activate', 'PackageController@activate')->name('package.activate');

    Route::get('page/{type}/{for}', 'PageController@page')->name('page.edit');
    Route::put('page/{id}', 'PageController@update')->name('page.update');

    Route::resource('promo_code', 'PromoCodeController');

    Route::resource('package_user', 'PackageUserController');
    Route::post('package-user/{id}/reject', 'PackageUserController@reject')->name('package-user.reject');
    Route::post('package-user/{id}/accept', 'PackageUserController@accept')->name('package-user.accept');

    Route::resource('transfer', 'TransferController');
    Route::post('transfer/{id}/reject', 'TransferController@reject')->name('transfer.reject');
    Route::post('transfer/{id}/accept', 'TransferController@accept')->name('transfer.accept');
});
