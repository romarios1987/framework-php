<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

///**
// * Autoload classes
// */
//spl_autoload_register(function ($className) {
//    $file = ROOT . '/' . str_replace('\\', '/', $className) . '.php';
//    if (is_file($file)) {
//        require_once $file;
//    }
//});
//
//new \framework\App();

new \framework\App();

//\framework\App::$app->setProperty('test', 'Hello World');
//debug(\framework\App::$app->getProperties());


//try{
//    if(!isset($remis)){
//        throw new Exception('HEllo World');
//    }
//}catch (Exception $e){
//    var_dump($e);
//}

//throw new Exception('HEllo World');



//debug(\framework\Router::getRoutes());






