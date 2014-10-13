<?php

use YomiTrack\Transformers\PromotionTransformer;

class PromotionController extends ApiController {

    protected $promotionTransformer;

    function __construct(PromotionTransformer $promotionTransformer) {
        $this->promotionTransformer = $promotionTransformer;
        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = null)
	{
        $limit = Input::get('limit') ?:10;

        $promotions = $id ? Restaurant::find($id)->promotions()->paginate($limit) : Promotion::paginate($limit);

        return $this->respondWithPagination($promotions, [
            'data' => $this->promotionTransformer->transformCollection($promotions->all()),
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
		//
	}


	/**
	 * Update the specified resource in storage.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function getFeed() {
        $limit = Input::get('limit') ?:10;

        $promotions = Promotion::getFeed($limit);
        //dd($promotions->all());
        return $this->respondWithPagination($promotions, [
            'data' => $this->promotionTransformer->transformFeedCollection($promotions->all()),
            //'data' => $promotions->all(),
        ]);
    }


}
