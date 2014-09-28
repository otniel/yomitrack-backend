<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 9/25/14
 * Time: 12:59 PM
 */

namespace YomiTrack\Transformers;


abstract class Transformer {
    public function transformCollection(array $items) {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
} 