<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 9/28/14
 * Time: 5:26 PM
 */

namespace YomiTrack\Transformers;

class RestaurantTransformer extends Transformer {
    public function transform($restaurant) {
        return [
            'name'        => $restaurant['name'],
            'description' => $restaurant['description'],
            'address'     => $restaurant['address'],
            'email'       => $restaurant['email'],
            'tel'         => $restaurant['tel'],
            'rate'        => $restaurant['rate'],
            'photo1'      => $restaurant['photo1'],
            'photo2'      => $restaurant['photo2'],
            'photo3'      => $restaurant['photo3'],
            'photo4'      => $restaurant['photo4'],
            'photo5'      => $restaurant['photo5'],
        ];
    }
}