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

    Route::get('', ['as' => 'index', 'uses' => 'HomeController@getIndex']);

    Route::get('home', [
        'as' => 'home',
        'middleware' => 'auth',
        'uses' => 'HomeController@getHome'
    ]);

    Route::post('home', [
        'middleware' => 'auth',
        'uses' => 'HomeController@postHome'
    ]);

    // Authentication routes...
    Route::get('auth/login', [
        'as' => 'sign in',
        'uses' => 'Auth\AuthController@getLogin'
    ]);
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', [
        'as' => 'sign out',
        'uses' => 'Auth\AuthController@getLogout'
    ]);

    // Registration routes...
    Route::get('auth/register', [
        'as' => 'sign up',
        'uses' => 'Auth\AuthController@getRegister'
    ]);
    Route::post('auth/register', 'Auth\AuthController@postRegister');
});
