<?php


namespace app\models;

use app\lib\Db;

class Main
{
    public $db;
    public function __construct()
    {
        $this->db = new Db;
    }
    public function getProducts($val = ''){
        return $this->db->select('select id, name, cost, category, src from products'.$val);
    }
    public function add($id){
        /*Функция добавляет в сессию массив(продукты) с массивом(количество), и добавляет к уже имеющемуся количество товаров еще 1*/
        if(empty($_SESSION['products']['count'])){
            $_SESSION['products']['count'] = [$id => 1];
        }else{
                foreach ($_SESSION['products']['count'] as $key => $value) {
                        if ($key == $id) {
                            $_SESSION['products']['count'][$id] += 1;
                        } else {
                            $_SESSION['products']['count'] += [$id => 1];
                        };
                };
        }
    }
    public function unc(){
        //Функция удаляет корзину полностью
        unset($_SESSION['products']);
    }
    public function getBasket(){
        $result = [];
        foreach($_SESSION['products']['count'] as $key => $value){
            $result[] = $this->db->select('select name, src, id, cost, category from products where id = ?', array($key));
        }
        return $result;
    }
    public function deleteThis($id){
        unset($_SESSION['products']['count'][$id]);
    }
    public function getCategory(){
        return $this->db->select('select * from category');
    }
    public function setCategory($id){
        $_SESSION['Category'] = $id;
    }

}