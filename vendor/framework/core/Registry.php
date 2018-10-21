<?php

namespace framework;

class Registry
{
    use TSingleton;
    /**
     * @var array
     */
    private static $properties = [];

    /**
     * Add property to array $properties
     * @param $name
     * @param $value
     */
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    /**
     * get property with array $properties
     * @param $name
     * @return mixed|null
     */
    private function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    /**
     * get all properties
     * @return array
     */
    public function getProperties()
    {
        return self::$properties;
    }
}