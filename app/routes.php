<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
    return View::make('login');
});

Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('restaurant', 'RestaurantController');
    Route::resource('promotions', 'PromotionController');
    Route::get('feed', 'PromotionController@getFeed');
    Route::get('restaurant/{id}/promotions', 'PromotionController@index');
});

Route::get('dashboard', function() {
    return View::make('home');
});