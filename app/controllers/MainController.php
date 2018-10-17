<?php

namespace app\controllers;

class MainController extends AppController
{

    public function indexAction(){
        //echo "MainController::index";

        $title = 'Default Layout';
        $name = 'Remi';

        $this->set(compact("title", "name"));
    }

    public function editAction(){
        //echo "MainController::edit";
    }
}