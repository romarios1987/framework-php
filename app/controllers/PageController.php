<?php

namespace app\controllers;

class PageController extends AppController
{
    public function indexAction()
    {
        echo "PageController::index";
    }

    public function viewAction()
    {
        //debug($this->route);
        //debug($_GET);
        echo "PageController::view";
    }

}