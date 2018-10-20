<?php
error_reporting(-1);

use vendor\core\Router;

$query = $_SERVER['QUERY_STRING'];

// указывает на текущую папку
define('WWW', __DIR__);

// указывает на папку с ядром
define('CORE', dirname(__DIR__) . '/vendor/core');

// указывает на корень сайта
define('ROOT', dirname(__DIR__));

// указывает на папку app
define('APP', dirname(__DIR__) . '/app');

// Default template
define('TEMPLATE', 'default');

require ROOT . 'vendor/autoload.php';

require '../vendor/core/Router.php';
require ROOT . '/vendor/libs/functions.php';




/**
 * Autoload classes
 */
spl_autoload_register(function ($className) {
    $file = ROOT . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});


// Add Routes
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);


// Default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']); // ^$ - пустая строка
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


Router::dispatch($query);















