<?php

namespace app\controllers\admin;

use framework\base\Controller;

class AppController extends Controller
{
    // base layout
    public $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);
    }
}