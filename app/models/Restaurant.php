<?php

use LaravelBook\Ardent\Ardent;

class Restaurant extends Ardent {
    protected $table = 'restaurant';

    protected $hidden = array('id_user', 'id_restaurant', 'created_at', 'updated_at');

    protected $fillable = ['name', 'description', 'address', 'email', 'tel', 'rate', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5', 'id_user'];

    public static $relationsData = array(
        'user'        => array(self::BELONGS_TO, 'User', 'foreign_key'=>'restaurant_id_user_foreign'),
        'promotions'  => array(self::HAS_MANY, 'Promotion'),
        'rates'       => array(self::HAS_MANY, 'Rate')
    );

    public function getComments($idRestaurant, $limit = 10) {
        //return Restaurant::find($idRestaurant)->rates->lists('comments');
        return $this->rates->lists('comments');
    }
}