<?php

namespace app\controller;

use app\core\Controller;

class MainController extends Controller
{
    protected $vars = [];
    protected $products = [];
    public function indexAction(){
            $this->vars [] = ['prod' => $this->model->getProducts()];
            $this->vars [] = ['basket' => $this->model->getBasket()];
            $this->vars [] = ['category' => $this->model->getCategory()];
            $this->view->render(array('title' => 'Главная', 'style' => '/public/style/index.css'), $this->vars);
    }
    public function ajaxAction(){
        if($_POST['action'] == 'add'){
            $this->model->add($_POST['target']);
        }elseif ($_POST['action'] == 'deleteAll'){
            $this->model->unc();
        }elseif ($_POST['action'] == 'deleteThis'){
            $this->model->deleteThis($_POST['target']);
        }elseif ($_POST['action'] == 'onCategory'){
            $this->model->setCategory($_POST['target']);
            $this->categoryAction();
        }elseif ($_POST['action'] == 'setCount'){
            $this->model->setCount($_POST);
        }elseif ($_POST['action'] == 'logout'){
            $this->model->logout();
        }
    }
    public function categoryAction(){
        if($_SESSION['Category'] == 'all'){
            $this->vars [] = ['prod' => $this->model->getProducts()];
        }else {
            $this->vars [] = ['prod' => $this->model->getProducts(' where id =' . $_SESSION['Category'])];
        }
        $this->view->render(array('title' => 'Главная', 'style' => '/public/style/index.css'), $this->vars);
    }
    public function basketAction(){
        $vars [] = ['basket' => $this->model->getBasket()];
        $vars [] = ['path' => $this->route['controller'].'/'.$this->route['action']];
        $this->view->render(array('title' => 'Корзина', 'style' => '/public/style/ind1ex.css'), $vars);
    }
    public function orderAction(){
        if($_POST['firstName']){
            if($this->model->buy($_POST)){
                $this->view->redirect('/../');

            };
        }
        $minmax = $this->model->date();
        $vars [] = ['basket' => $this->model->getBasket()];
        $vars ['min'] = $minmax[0];
        $vars ['max'] = $minmax[1];
        $this->view->render(array('title' => 'Оформление заказа', 'style' => '/public/style/ind1ex.css'), $vars);
    }
}