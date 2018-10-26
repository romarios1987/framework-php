<?php

namespace app\models;


class User extends AppModel
{
    public $atributes = [
        'login' => '',
        'password' => '',
        'confirm_pass' => '',
        'name' => '',
        'email' => ''
    ];
}