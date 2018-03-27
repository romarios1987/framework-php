<?php

class Router
{
    /**
     * Массив маршрутов (table of routes)
     * @var array
     */
    protected static $routes = [];

    /**
     * Текущий маршрут
     * @var array
     */
    protected static $route = [];


    /**
     * Добавляет маршрут в таблицу маршрутов
     * @param $regexp
     * @param array $route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает все маршруты
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /** Возвращает текущий маршрут
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }


    /**
     * Ищет URL в таблице маршрутов
     * @param $url
     * @return bool
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                //debug($matches);
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }

                self::$route = $route;
                debug($route);
                return true;
            }
        }
        return false;
    }

    /**
     * перенаправляет URL по корректному маршруту
     * @param $url - входящий url
     */
    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {

            // текущий контроллер
            $controller = self::upperCamelCase(self::$route['controller']);

            if (class_exists($controller)) {
                // подключаем controller
                $controllerObject = new $controller;

                // проверка action
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                } else {
                    echo "Метод <b>$controller::$action</b> не найден";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найден";
            }

        } else {
            http_response_code(404);
            include "404.html";
        }
    }

    /**
     * Преобразует правильное название Контроллера
     * @param $name
     * @return mixed
     */
    protected static function upperCamelCase($name)
    {
//        $name = str_replace('-', ' ', $name);
//        $name = ucwords($name);
//        $name = str_replace(' ', '', $name);

        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }


    /**
     * Преобразует правильное название Экшена
     * @param $name
     * @return string
     */
    protected static function lowerCamelCase($name)
    {

        return lcfirst(self::upperCamelCase($name));
    }


}






















