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
        $array['order'] = $this->db->select("select * from sales where id = $id");
        $array['name'] = $this->db->select("select name from products where id in ({$array['order'][0]['products']})");
        $array['status'] = $this->db->select("select name from status");
        return $array;
    }
}