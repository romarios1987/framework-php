<?php

namespace vendor\core;

// Паттерн проектирования Singleton (Одиночка)
class Db
{
    private $pdo;
    private static $instance;

    /**
     * number of executed sql queries
     * @var int
     */
    public static $countSql = 0;

    /**
     * array for recording requests
     * @var array
     */
    public static $queries = [];

    /**
     * Db constructor.
     */
    private function __construct()
    {
        $db = require ROOT . '/config/config_db.php';

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
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
    public function execute_sql($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * @param $sql
     * @return array
     */
    public function query_sql($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;

        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);

        if ($res != false) {
            return $stmt->fetchAll();
        }
        return [];
    }




}