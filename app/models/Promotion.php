<?php

use LaravelBook\Ardent\Ardent;

class Promotion extends Ardent {
    protected $table = 'promotions';

    protected $hidden = array('id_promotion', 'id_restaurant', 'created_at', 'updated_at');

    protected $fillable = [];

    public static $relationsData = array(
        'restaurant'  => array(self::BELONGS_TO, 'Restaurant'),
    );
}