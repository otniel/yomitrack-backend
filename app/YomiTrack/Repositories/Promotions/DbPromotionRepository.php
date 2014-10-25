<?php namespace YomiTrack\Repositories\Promotions;

use YomiTrack\Repositories\DbRepository;

class DbPromotionRepository extends DbRepository implements PromotionRepository {
    /**
     * @var Product
     */
    private $model;

    function __construct(\Promotion $model) {
        $this->model = $model;
    }

    public function getById($id) {
        $promotion = \Restaurant::find($id);
    }

    public function getPromotionsByRestaurant($id) {
        return $this->model->find($id)->promotions()->paginate($limit);
    }
}