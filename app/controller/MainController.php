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
        }
    }
    public function categoryAction(){
        $this->vars [] = ['prod' => $this->model->getProducts(' where id =' . $_SESSION['Category'])];
        $this->view->render(array('title' => 'Главная', 'style' => '/public/style/index.css'), $this->vars);
    }
}