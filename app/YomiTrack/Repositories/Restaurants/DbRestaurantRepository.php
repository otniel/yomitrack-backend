<?php namespace YomiTrack\Repositories\Restaurants;

use Restaurant;
use YomiTrack\Repositories\DbRepository;

class DbRestaurantRepository extends DbRepository implements RestaurantRepository {
    /**
     * @var Product
     */
    protected $model;

    function __construct(Restaurant $model) {
        $this->model = $model;
    }

    public function getPromotionsByRestaurant($id, $limit = 10) {
        return $this->model->find($id)->promotions()->paginate($limit);
    }
}