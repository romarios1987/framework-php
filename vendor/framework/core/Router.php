<?php

namespace framework;

class Router
{
    /**
     * Array of routes (the default will be two)
     * @var array
     */
    private static $routes = [];

    /**
     * Current route
     * @var array
     */
    private static $route = [];


    /**
     * Adds a route to the route table
     * @param $regexp
     * @param array $route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Returns all routes
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /** Returns the current route
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }


    /**
     * Searches URL in route table
     * @param string $url
     * @return bool
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches)) {
                //debug($matches);
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }

                // prefix for admin controllers
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }


                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;

                //debug($route);
                return true;
            }
        }
        return false;
    }

    /**
     * Redirects the URL to the correct route
     * @param string $url - incoming url
     */
    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    /**
     * Converts the correct name of the controller
     * @param string $name
     * @return mixed
     */
    private static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }


    /**
     * Converts the correct name of the action
     * @param $name
     * @return string
     */
    private static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * Remove possible get parameters
     * @param $url
     * @return string
     */
    protected static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
        return $url;
    }
}






















