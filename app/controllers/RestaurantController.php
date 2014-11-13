<?php

use YomiTrack\Repositories\Restaurants\DbRestaurantRepository;

class RestaurantController extends \BaseController {

    protected $repo;

    public function __construct(DbRestaurantRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
	 * Display a listing of the resource.
	 * GET /restaurant
	 *
	 * @return Response
	 */
	public function index() {
        $restaurant_id = Auth::user()->restaurant()->getResults()->id;
        $restaurant = $this->repo->getById($restaurant_id);

		return View::make('restaurant.index', [
            'restaurant' => $restaurant
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /restaurant/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /restaurant
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /restaurant/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /restaurant/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /restaurant/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /restaurant/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}