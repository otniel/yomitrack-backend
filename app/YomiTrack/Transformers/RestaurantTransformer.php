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
            'categories'  => $restaurant['categories'],
            'email'       => $restaurant['email'],
            'tel'         => $restaurant['tel'],
            'rate'        => (float) $restaurant['rate'],
            'latitude'    => (float) $restaurant['latitude'],
            'longitude'   => (float) $restaurant['longitude'],
            'radius'      => (int) $restaurant['radius'],

            'photos'      => [
                $restaurant['photo1'],
                $restaurant['photo2'],
                $restaurant['photo3'],
                $restaurant['photo4'],
                $restaurant['photo5']
            ]
        ];
    }
}