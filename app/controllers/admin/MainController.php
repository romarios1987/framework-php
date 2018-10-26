<?php

namespace app\controllers\admin;


class MainController extends AppController
{
    public function indexAction(){
       //echo __METHOD__;

        $this->setMeta('Панель администратора', 'Описание Админки...', 'Ключевики Админки...');


        $this->set(compact('names'));
    }
}