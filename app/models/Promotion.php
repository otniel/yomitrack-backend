<?php

use LaravelBook\Ardent\Ardent;

class Promotion extends Ardent {
    protected $table = 'promotions';

    protected $hidden = array('id_promotion', 'id_restaurant', 'created_at', 'updated_at');

    protected $fillable = [];

    public static $relationsData = array(
        'restaurant'  => array(self::BELONGS_TO, 'Restaurant'),
    );

    public static function getFeed($limit) {
        return DB::table('promotions')
            ->join('restaurant', 'promotions.restaurant_id', '=', 'restaurant.id')
            ->orderBy('promotions.updated_at', 'desc')
            ->select('promotions.id',
                'promotions.name',
                'restaurant.name as restaurant_name',
                'restaurant.photo1',
                'restaurant.photo2',
                'restaurant.photo3',
                'restaurant.photo4',
                'restaurant.photo5',
                'restaurant.rate as restaurant_rate',
                'promotions.restaurant_id')
            ->paginate($limit);
    }
}