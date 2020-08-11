<?php

namespace app\controller;

use app\core\Controller;

class MainController extends Controller
{
    protected $vars = [];
    protected $products = [];
    public function indexAction(){
//        if($_POST['action'] == 'onCategory'){
//            $this->products = ['prod' => $this->model->getProducts('select * into products where id = ?')];
//        };
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
        }

    }
}