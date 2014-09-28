<?php

use LaravelBook\Ardent\Ardent;

class User extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = ['username', 'email', 'password'];

    public static $relationsData = array(
        'restaurant' => array(self::HAS_ONE, 'Restaurant'),
    );
}
