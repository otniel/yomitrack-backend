<?php

use YomiTrack\Repositories\Promotions\DbPromotionRepository;

class PromotionsController extends \BaseController {

    protected $repo;

    public function __construct(DbPromotionRepository $repo) {
        $this->repo = $repo;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $rest_id = Auth::user()->restaurant()->getResults()->id;

        $promos = $this->repo->getPromotionsByRestaurant($rest_id);
        return View::make('promotions.index', [
            'promotions' => $promos
        ]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('promotions.form');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
  		$input = Input::only('name', 'description');
        $restaurant_id = Auth::user()->restaurant()->getResults()->id;
        $this->repo->createPromotion($input, $restaurant_id);
        return View::make('layouts.closeModal');
	}

	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$promo = $this->repo->getById($id);
        return View::make('promotions.edit', [
            'promotion' => $promo
        ]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        extract(Input::all());
        $promo = $this->repo->getById($id);

        $promo->name = $name;
        $promo->description = $description;
        $promo->save();

        return View::make('layouts.closeModal');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id) {
        //dd($id);
        $this->repo->deletePromotion($id);
        return Redirect::route('promotions.index');
    }


}
