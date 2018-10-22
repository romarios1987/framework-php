<?php
use framework\Router;

// Add Routes
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// Default routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']); // ^$ - пустая строка
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


