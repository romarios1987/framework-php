<?php

namespace app\controllers;

class PostsController extends AppController
{

    // On level Class
    //public $layout = 'default';

    public function indexAction()
    {

        // On level Action
        $this->layout = false;
        $this->view = 'test';

    }

    public function testAction()
    {
        //echo "PostsController::test";
    }

}