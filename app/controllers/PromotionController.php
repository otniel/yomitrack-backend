<?php

use YomiTrack\Transformers\PromotionTransformer;
use YomiTrack\Repositories\Promotions\PromotionRepository;

class PromotionController extends ApiController {

    protected $transformer;
    protected $promos;

    function __construct(PromotionTransformer $transformer, PromotionRepository $promos) {
        $this->transformer = $transformer;
        $this->promos = $promos;
        $this->beforeFilter('auth.basic', ['on' => 'post']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $limit = Input::get('limit') ?:10;

        $promotions = $this->promos->getPaginated($limit);

        return $this->respondWithPagination($promotions, [
            'data' => $this->transformer->transformCollection($promotions->all()),
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
        $promotion = $this->promos->getById($id);

        if(!$promotion ){
            return $this->respondNotFound('Promotion does not exist.');
        }

        return $this->respond([
            'data' => $this->transformer->transform($promotion)
        ]);
    }

    public function getFeed() {
        $limit = Input::get('limit') ?:10;

        // Trae el feed para el dashboard, paginado
        $promotions = $this->promos->getFeed($limit);
        return $this->respondWithPagination($promotions, [
            'data' => $this->transformer->transformFeedCollection($promotions->all()),
        ]);
    }
}
