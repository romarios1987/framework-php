<?php

namespace app\controllers;

class MainController extends AppController
{
    public function indexAction(){
        echo "MainController::index";
    }

    public function editAction(){
        echo "MainController::edit";
    }
}