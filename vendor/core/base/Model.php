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
    protected $table;


    /**
     * Primary key
     * @var string
     */
    protected $primaryKey = 'id';


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

    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->primaryKey;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query_sql($sql, [$id]);
    }


}