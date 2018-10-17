<?php

namespace vendor\core;

// Паттерн проектирования Singleton (Одиночка)
class Db
{
    private $pdo;
    private static $instance;

    /**
     * Db constructor.
     */
    private function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass']);
    }

    /**
     * Database connection
     * @return Db
     */
    public static function instance_db()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @return bool
     */
    public function execute_sql($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query_sql($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute();
        if ($res != false) {
            return $stmt->fetchAll();
        }
        return [];
    }

}