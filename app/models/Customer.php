<?php

use LaravelBook\Ardent\Ardent;

class Customer extends Ardent {
    protected $table = 'customer';

    protected $hidden = array('id_customer', 'created_at', 'updated_at');

    protected $fillable = ['name', 'last_name', 'email'];

    public static $relationsData = array(
        'rates'  => array(self::HAS_MANY, 'Rate'),
    );

}