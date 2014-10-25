<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 10/14/14
 * Time: 12:11 AM
 */

namespace YomiTrack\Transformers;


class RatesTransfomrer extends Transformer{
    public function transform($rate) {
        return [
            'rate'     => (int) $rate['rate'],
            'comments' => $rate['comments']
        ];
    }
} xxxxxx