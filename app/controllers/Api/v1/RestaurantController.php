<?php namespace Api\v1;

use Illuminate\Support\Facades\Input;
use YomiTrack\Transformers\RestaurantTransformer;
use YomiTrack\Repositories\Restaurants\RestaurantRepository;

class RestaurantController extends ApiController {

    protected $restaurantTransformer;
    protected $restaurant;

    function __construct(RestaurantTransformer $restaurantTransformer, RestaurantRepository $restaurant) {
        $this->restaurantTransformer = $restaurantTransformer;
        $this->restaurant = $restaurant;
        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
        $limit = Input::get('limit') ?:10;
        $restaurants = $this->restaurant->getPaginated($limit);

        return $this->respondWithPagination($restaurants, [
               'data' => $this->restaurantTransformer->transformCollection($restaurants->all()),
        ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $restaurant = $this->restaurant->getById($id);

        if(!$restaurant ){
            return $this->respondNotFound('Restaurant does not exist.');
        }
        return $this->respond([
            'data' => $this->restaurantTransformer->transform($restaurant)
        ]);

    }
}
