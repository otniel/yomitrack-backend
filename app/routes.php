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

/*Event::listen('illuminate.query', function($sql) {
    return array($sql);
});*/

// Pusher Demo
Route::get('home', function() {
    return View::make('pusher_home');
});

Route::any('test', function() {
    $message = "This is just an example message!";
    Pusherer::trigger('yomitrack-channel', 'customerNearRestaurant', ['promo' => 'LLEVATE 2x1 EN HOTCAKES']);
    return 'Done';
});


// API
Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('restaurant', 'Api\v1\RestaurantController');
    Route::resource('promos', 'Api\v1\PromotionController');
    Route::resource('restaurant.promos', 'Api\v1\RestaurantPromotionsController', ['only' => ['index']]);
    Route::get('feed', 'Api\v1\PromotionController@getFeed');
    // Notifications
    Route::get('iamnear', 'Api\v1\NotificationsController@customerNearRestaurant');
});

Route::get('dashboard', function() {
    return View::make('home');
});

Route::resource('promotions', 'PromotionsController');