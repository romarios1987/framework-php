<?php
include '../vendor/libs/functions.php';
$query = rtrim($_SERVER['QUERY_STRING'], '/');

require '../vendor/core/Router.php';

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::add('users/edit', ['controller' => 'Users', 'action' => 'edit']);
Router::add('', ['controller' => 'Main', 'action' => 'index']);


debug(Router::getRoutes());

if(Router::matchRoute($query)){
    debug(Router::getRoute());
}else{
    echo '404';
}