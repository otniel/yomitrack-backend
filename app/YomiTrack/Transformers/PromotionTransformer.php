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
} 