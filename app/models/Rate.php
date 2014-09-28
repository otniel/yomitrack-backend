<?php

use LaravelBook\Ardent\Ardent;

class Rate extends Ardent {
    protected $table = 'rates';

    protected $hidden = array('id', 'customer_id', 'restaurant_id', 'id_rate', 'created_at', 'updated_at');

    protected $fillable = ['customer_id', 'restaurant_id', 'rate', 'comments'];

    public static $relationsData = array(
        'restaurant' => array(self::BELONGS_TO, 'Restaurant'),
        'customer'  => array(self::BELONGS_TO, 'Customer'),
    );
}