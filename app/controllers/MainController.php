<?php

namespace app\controllers;

use app\models\Main;
use framework\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction()
    {
        $model = new Main();

        $posts = R::findAll($model->table);

        $this->setMeta('Главная страница', 'Описание...', 'Ключевики...');

        //$res = $model->query("SELECT * FROM tbl_post");
        //$posts = $model->findAll();
        //$post = $model->findOne('remi9988','author');
        //$post = $model->findOne(13);
        //debug($post);
        //debug($posts);
        //var_dump($res);

        //$data = $model->findBySql("SELECT * FROM {$model->table} ORDER BY id DESC LIMIT 2");
        //$data = $model->findBySql("SELECT * FROM {$model->table} WHERE author LIKE ?", ["%9988%"]);
        //$data = $model->findLike('9988', 'author');

        // debug($data);
        $title = 'Page Title';
        $names = ['Remi', 'John', 'Stepan', 'Mike'];

        $cache = Cache::instance();
        //$cache->set('test', $names);
        $cache->delete('test');
        $data = $cache->get('test');
        //debug($data);

        $this->set(compact('title', 'names'));
    }

    public function editAction()
    {
        echo "MainController::edit";
    }
}