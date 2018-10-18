<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

    public function indexAction()
    {

        $model = new Main();

        //$res = $model->query("SELECT * FROM tbl_post");
        $posts = $model->findAll();
        //debug($posts);
        //var_dump($res);
        $title = 'Page Title';
        $this->set(compact('title', 'posts'));
    }

    public function editAction()
    {
        //echo "MainController::edit";
    }
}