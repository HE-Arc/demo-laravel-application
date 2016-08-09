<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('', function() {
    return redirect()->route('index', ['language' => App::getLocale()]);
});

Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => '(fr|de|en)'],
    'middleware' => 'locale'
], function() {

    Route::get('', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::get('home', [
        'as' => 'home',
        'middleware' => 'auth',
        'uses' => 'HomeController@home'
    ]);
    Route::post('home', [
        'middleware' => 'auth',
        'uses' => 'HomeController@changeEmail'
    ]);

    // Authentication routes
    Route::get('auth/login', [
        'as' => 'sign in',
        'uses' => 'Auth\LoginController@showLoginForm'
    ]);
    Route::post('auth/login', 'Auth\LoginController@login');
    Route::post('auth/logout', [
        'as' => 'sign out',
        'uses' => 'Auth\LoginController@logout'
    ]);

    // Registration routes
    Route::get('auth/register', [
        'as' => 'sign up',
        'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]);
    Route::post('auth/register', 'Auth\RegisterController@register');

    // Forgot password routes... TODO
    //Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    //Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    //Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    //Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});
