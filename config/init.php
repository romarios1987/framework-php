<?php
error_reporting(-1);
define("DEBUG", 1); // 1 - show errors; 0 - not show errors
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');

define("CORE", ROOT . '/vendor/framework/core');
define("LIBS", ROOT . '/vendor/framework/libs');
define("CONF", ROOT . '/config');

// Default template
define('TEMPLATE', 'default');

// http://framework-php/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://framework-php/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// http://framework-php
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);

require_once ROOT . '/vendor/autoload.php';