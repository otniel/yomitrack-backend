<?php

use YomiTrack\Transformers\RestaurantTransformer;

class RestaurantController extends ApiController {

    protected $restaurantTransformer;

    function __construct(RestaurantTransformer $restaurantTransformer) {
        $this->restaurantTransformer = $restaurantTransformer;
        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
        $limit = Input::get('limit') ?:10;
        $restaurants = Restaurant::paginate($limit);

        return $this->respondWithPagination($restaurants, [
               'data' => $this->restaurantTransformer->transformCollection($restaurants->all()),
        ]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $restaurant = Restaurant::find($id);

        if(!$restaurant ){
            return $this->respondNotFound('Restaurant does not exist.');
        }

        return $this->respond([
            'data' => $this->restaurantTransformer->transform($restaurant)
        ]);

    }
}
