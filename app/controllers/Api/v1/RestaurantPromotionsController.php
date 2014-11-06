<?php namespace Api\v1;
use Illuminate\Support\Facades\Input;
use YomiTrack\Repositories\Promotions\PromotionRepository;
use YomiTrack\Repositories\Restaurants\RestaurantRepository;
use YomiTrack\Transformers\PromotionTransformer;

class RestaurantPromotionsController extends ApiController {

    protected $promos;
    protected $restaurant;
    protected $transformer;

    function __construct(PromotionTransformer $transformer, PromotionRepository $promos, RestaurantRepository $restaurant)
    {
        $this->promos = $promos;
        $this->restaurant = $restaurant;
        $this->transformer = $transformer;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index($id)
    {
        $limit = Input::get('limit') ?:10;

        $promotions = $this->restaurant->getPromotionsByRestaurant($id);

        return $this->respondWithPagination($promotions, [
            'data' => $this->transformer->transformCollection($promotions->all()),
        ]);

    }
}
