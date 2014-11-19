<?php namespace Api\v1;

use Illuminate\Support\Facades\Input;
use YomiTrack\Transformers\PromotionTransformer;
use YomiTrack\Repositories\Promotions\PromotionRepository;
use Laracasts\Commander\CommanderTrait;

class PromotionController extends ApiController {

    use CommanderTrait;
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

        $latitude = Input::get('lat') ?: '25.7834523';
        $longitude = Input::get('lon') ?: '-100.39381750000001';

        // Compact construye un array asociativo (key-value) con el nombre y el valor del string
        // i.e. ['latitude' => '25.7834523', 'longitude' => '-100.39381750000001']
        $coordinates = compact('latitude', 'longitude');
        // Trae el feed para el dashboard, paginado
        $promotions = $this->promos->getFeed($limit, $coordinates);
        return $this->respondWithPagination($promotions, [
            'data' => $this->transformer->transformFeedCollection($promotions->all()),
        ]);
    }
}
