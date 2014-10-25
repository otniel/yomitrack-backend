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
    Pusherer::trigger('yomitrack-channel', 'userNearRestaurant', ['promo' => 'LLEVATE 2x1 EN HOTCAKES']);
    return 'Done';
});

//Binds para las interfases de los repositorios
App::bind('YomiTrack\Repositories\Promotions\PromotionRepository', 'YomiTrack\Repositories\Promotions\DbPromotionRepository');
App::bind('YomiTrack\Repositories\Restaurants\RestaurantRepository', 'YomiTrack\Repositories\Restaurants\DbRestaurantRepository');

Route::get('/', function() {
    return View::make('login');
});

Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('restaurant', 'RestaurantController');
    Route::resource('promos', 'PromotionController');
    Route::resource('restaurant.promos', 'RestaurantPromotionsController', ['only' => ['index']]);
    Route::get('feed', 'PromotionController@getFeed');
});

Route::get('dashboard', function() {
    return View::make('home');
});