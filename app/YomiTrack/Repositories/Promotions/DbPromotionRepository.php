<?php namespace YomiTrack\Repositories\Promotions;

use Illuminate\Support\Facades\Auth;
use YomiTrack\Repositories\DbRepository;
use DB;
class DbPromotionRepository extends DbRepository implements PromotionRepository {
    /**
     * @var Product
     */
    protected $model;

    function __construct(\Promotion $model) {
        $this->model = $model;
    }

    public function getPromotionsByRestaurant($id) {

        return \Restaurant::find($id)->promotions()->paginate(10);
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

    public function createPromotion($input, $restaurant_id) {
        extract($input);
        $promo = new \Promotion;

        $promo->name = $name;
        $promo->description = $description;
        $promo->restaurant_id = $restaurant_id;
        $promo->save();
    }

    public function deletePromotion($id) {
        $this->model->find($id)->delete();
    }


}