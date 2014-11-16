<?php
/**
 * Created by PhpStorm.
 * User: otniel
 * Date: 11/16/14
 * Time: 2:13 PM
 */

namespace YomiTrack\Forms;


class Admin extends FormValidator {
    protected $rules = [
        // Usuario
        'username'    => 'required',
        'email'       => 'required',
        'password'    => 'required',
        // Restaurante
        'name'        => 'required',
        'description' => 'required',
        'email'       => 'required',
        'tel'         => 'required',
        'photo1'      => 'required',
        'photo2'      => 'required',
        'photo3'      => 'required',
        'photo4'      => 'required',
        'photo5'      => 'required'
    ];
} 