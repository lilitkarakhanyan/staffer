<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['namespace' => 'Landing'], function () {
    Route::get('/',
        ['as' => 'landing', 'uses' => 'LandingController@index']);
});
//Auth::routes();
Route::group(['prefix' => 'account', 'namespace' => 'Auth', 'middleware' => 'guest'], function () {
    Route::get('create', ['as' => 'create.account', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.account', 'uses' => 'RegisterController@register']);
    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.account', 'uses' => 'LoginController@login']);
    Route::get('reset-password', ['as' => 'password.reset', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
});
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('email/verification/{token}', ['as' => 'email.verify', 'uses' => 'Auth\LoginController@verifyEmail']);

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => ['auth', 'activated']], function () {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
});
