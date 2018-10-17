<?php

namespace vendor\core\base;

use vendor\core\Db;

abstract class Model
{
    /**
     * Connection
     * @var
     */
    private $pdo;

    /**
     * The name of the table with which the model works
     * @var
     */
    private $table;


    public function __construct()
    {
        $this->pdo = Db::instance_db();
    }

    public function query($sql)
    {
        return $this->pdo->execute_sql($sql);
    }

    /**
     * Returns all data from a table
     * @return array
     */
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query_sql($sql);
    }



}