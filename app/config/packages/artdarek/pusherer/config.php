<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| Pusher Config
	|--------------------------------------------------------------------------
	|
	| Pusher is a simple hosted API for quickly, easily and securely adding
	| realtime bi-directional functionality via WebSockets to web and mobile 
	| apps, or any other Internet connected device.
	|
	*/

	/**
	 * App id
	 */
	'app_id' => getenv('pusher.app_id'),

	/**
	 * App key
	 */
	'key' => getenv('pusher.key'),

	/**
	 * App Secret
	 */
	'secret' => getenv('pusher.secret')

);