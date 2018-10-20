<?php

namespace framework\base;
use framework\Db;

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

    /**
     * Returns one data from a table
     * @param $id
     * @param string $field
     * @return array
     */
    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->primaryKey;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query_sql($sql, [$id]);
    }


    /**
     * Custom sql request
     * @param $sql
     * @param array $params
     * @return array
     */
    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query_sql($sql, $params);
    }

    /**
     * Custom sql request with LIKE
     * @param $str
     * @param $field
     * @param string $table
     * @return array
     */
    public function findLike($str, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query_sql($sql, ['%' . $str . '%']);
    }


}