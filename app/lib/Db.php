<?php

namespace app\lib;



class Db
{
    private $db;
    public function __construct()
    {
        $config = require 'app/config/db.php';
        $this->db = new \PDO("mysql:host={$config['host']}; dbname={$config['dbname']}", $config['user'], $config['password']);
    }
    public function select($sql, $vars = [])
    {
        $query = $this->db->prepare($sql);
        $query->execute($vars);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function insert($sql, $vars = []){
        $query = $this->db->prepare($sql);
        $result = $query->execute($vars);
    }
}
