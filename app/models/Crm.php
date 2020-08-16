<?php

namespace app\models;

use app\lib\Db;

class Crm{
    private $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    public function getOrders(){
        return $this->db->select('select * from sales');
    }
    public function inOrder($id){
        return $this->db->select("select * from sales where id = $id");
    }
}