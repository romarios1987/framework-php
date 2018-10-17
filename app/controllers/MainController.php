<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

    public function indexAction()
    {

        $madel = new Main();
        $title = 'Page Title';
        $this->set(compact('title'));
    }

    public function editAction()
    {
        //echo "MainController::edit";
    }
}