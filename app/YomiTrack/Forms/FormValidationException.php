<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 11/16/14
 * Time: 2:09 PM
 */

namespace YomiTrack\Forms;


use Exception;
use Illuminate\Support\MessageBag;

class FormValidationException extends Exception {

    /**
     * @var MessageBag
     */
    protected $errors;

    function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);
    }

    public function getErrors() {
        return $this->errors;
    }

}