<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

    public function indexAction()
    {

        $model = new Main();

        //$res = $model->query("SELECT * FROM tbl_post");
        //$posts = $model->findAll();
        //$post = $model->findOne('remi9988','author');
        $post = $model->findOne(13);
        debug($post);
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