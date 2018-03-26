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
     * @param $url
     * @return bool
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if ($url == $pattern) {
                self::$route = $route;
                return true;
            }
            return false;
        }
    }

}