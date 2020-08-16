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
        if (count($_SESSION['products']['count'])) {
            foreach ($_SESSION['products']['count'] as $key => $value) {
                $result[] = $this->db->select('select name, src, id, cost, category from products where id = ?', array($key));
            }
            return $result;
        }
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
    public function setCount($post){
            foreach ($_SESSION['products']['count'] as $key => $value){
                if($key == $post['id']){
                    $_SESSION['products']['count'][$key] = $post['count'];
                }
            }
    }
    public function buy($post){
        $time = new \DateTime('now');
        $now = $time->format('Y-m-d H-i-s');
        $products = '';
        $counts = '';
        foreach($_SESSION['products']['count'] as $key => $value){
            $products .= $key.', ';
            $counts .= $value.', ';
        }
        $products = trim($products, ', ');
        $counts = trim($counts, ', ');
        $result = $this->db->insert("insert into sales(firstName, lastName, phone, buyDate, deliveryDate, payment, comment, products, counts, status)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($post['firstName'], $post['lastName'], $post['phone'], $now, $post['date'], $post['payment'], $post['comment'], $products, $counts, 'Активный'));
        if($result){
            unset($_SESSION['products']);
            return true;
        }

    }
    public function date(){
        $minTime = new \DateTime('now');
        $minTime = $minTime->modify('+72 hours');
        $min = $minTime->format('Y-m-d');
        $maxTime = new \DateTime('last day of next month');
        $max = $maxTime->format('Y-m-d');
        return array($min, $max);
    }
}