<?php namespace YomiTrack\Repositories\Restaurants;

interface RestaurantRepository {
    public function getPaginated($limit);
}