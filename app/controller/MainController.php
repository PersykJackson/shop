<?php

namespace app\controller;

use app\core\Controller;

class MainController extends Controller
{
    public function indexAction(){
        $vars = [];
        $vars [] = ['prod' => $this->model->products];
        $vars [] = ['basket' => $this->model->getBasket()];
        $this->view->render(array('title' => 'Главная', 'style' => '/public/style/index.css'), $vars);

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