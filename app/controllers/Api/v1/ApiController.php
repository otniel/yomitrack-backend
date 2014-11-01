<?php namespace Api\v1;
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 9/25/14
 * Time: 4:02 PM
 */

use \Illuminate\Http\Response as IlluminateResponse;
use BaseController;
use Illuminate\Support\Facades\Response;

class ApiController extends BaseController{
    protected $statusCode = IlluminateResponse::HTTP_OK;

    /**Illuminate
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function respondNotFound($message = 'Not Found!') {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondInternalError($message = 'Internal Error!') {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }


    public function respond($data, $headers = []) {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message ) {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function respondFailedParameters($message) {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
                    ->respondWithError($message);
    }

    /**
     * @param Paginator $restaurants
     * @return mixed
     */
    public function respondWithPagination($restaurants, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $restaurants->getTotal(),
                'total_pages' => ceil($restaurants->getTotal() / $restaurants->getPerPage()),
                'current_page' => $restaurants->getCurrentPage(),
                'limit' => $restaurants->getPerPage()
            ]
        ]);

        return $this->respond($data);
    }

    /**
     * @return mixed
     */
    protected function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)
                    ->respond([
            'message' => $message
        ]);
    }
} 