<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');

// указывает на текущую папку
define('WWW', __DIR__);

// указывает на папку с ядром
define('CORE', dirname(__DIR__) . '/vendor/core');

// указывает на корень сайта
define('ROOT', dirname(__DIR__));

// указывает на папку app
define('APP', dirname(__DIR__) . '/app');


require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
//require '../app/controllers/Main.php';
//require '../app/controllers/Posts.php';


/**
 * Автозагрузка классов
 */
spl_autoload_register(function ($class) {
    $file = APP . "/controllers/$class.php";

    if (is_file($file)) {
        require_once $file;
    }
});

Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']);

// Default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//debug(Router::getRoutes());

Router::dispatch($query);