<?php

namespace app\controllers;

use app\models\AppModel;
use framework\base\Controller;

class AppController extends Controller
{
    public $layout = 'main';
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }
}