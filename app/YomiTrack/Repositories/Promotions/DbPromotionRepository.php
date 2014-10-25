<?php namespace YomiTrack\Repositories\Promotions;

use YomiTrack\Repositories\DbRepository;

class DbPromotionRepository extends DbRepository implements PromotionRepository {
    /**
     * @var Product
     */
    protected $model;

    function __construct(\Promotion $model) {
        $this->model = $model;
    }

    public function getPromotionsByRestaurant($id) {
        return $this->model->find($id)->promotions()->paginate($limit);
    }

    public function getFeed($limit) {
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