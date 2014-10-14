<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 10/9/14
 * Time: 1:07 PM
 */

namespace YomiTrack\Transformers;


class PromotionTransformer extends Transformer {
    public function transform($promotion) {
        return [
            'name'        => $promotion['name'],
            'description' => $promotion['description']
        ];
    }
    public function transformFeedCollection($items) {
        return array_map([$this, 'transformFeed'], $items);
    }

    public function transformFeed($promotion) {
        return [
            'restaurant_id'    => (int) $promotion->restaurant_id,
            'name'             => $promotion->name,
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