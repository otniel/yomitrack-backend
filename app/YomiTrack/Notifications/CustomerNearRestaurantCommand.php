<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 11/2/14
 * Time: 11:57 AM
 */

namespace YomiTrack\Notifications;


class CustomerNearRestaurantCommand {


    public $latitude;
    public $longitude;

    function __construct($latitude, $longitude) {

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}