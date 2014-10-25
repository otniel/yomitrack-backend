<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 10/9/14
 * Time: 1:07 PM
 */

namespace YomiTrack\Transformers;

use YomiTrack\Transformers\RestaurantTransformer;
class PromotionTransformer extends Transformer {
    public function transform($promotion) {
        $idRestaurant = $promotion->restaurant->id;
        return [
            'name'                   => $promotion['name'],
            'description'            => $promotion['description'],
            'restaurant_name'        => $promotion->restaurant->name,
            'restaurant_description' => $promotion->restaurant->description,
            'restaurant_rate'        => (float)$promotion->restaurant->rate,
            'comments'               => $promotion->restaurant->getComments($idRestaurant),
            'photos' => [
                $promotion->restaurant->photo1,
                $promotion->restaurant->photo2,
                $promotion->restaurant->photo3,
                $promotion->restaurant->photo4,
                $promotion->restaurant->photo5
            ],
        ];
    }
    public function transformFeedCollection($items) {
        return array_map([$this, 'transformFeed'], $items);
    }

    public function transformFeed($promotion) {
        return [
            'promo_id'         => (int) $promotion->id,
            'promo_name'       => $promotion->name,
            'restaurant_id'    => (int) $promotion->restaurant_id,
            'restaurant_name'  => $promotion->restaurant_name,
            'restaurant_rate'  => (float) $promotion->restaurant_rate,
            'photos' => [
                $promotion->photo1,
                $promotion->photo2,
                $promotion->photo3,
                $promotion->photo4,
                $promotion->photo5
            ]
        ];
    }

}