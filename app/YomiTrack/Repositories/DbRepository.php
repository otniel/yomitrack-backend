<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 10/24/14
 * Time: 4:42 PM
 */

namespace YomiTrack\Repositories;


abstract class DbRepository {
    public function getPaginated($limit) {
        return $this->model->paginate($limit);
    }

    public function getById($id) {
        return $this->model->find($id);
    }
} 