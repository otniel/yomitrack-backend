<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 10/24/14
 * Time: 5:20 PM
 */

namespace YomiTrack\Repositories\Promotions;


interface PromotionRepository {
    public function getPaginated($limit);

} 