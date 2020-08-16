<?php


namespace app\controller;

use app\core\Controller;

class CrmController extends Controller
{
    protected $vars = [];
    public function indexAction(){
        $this->view->layout = 'crm';
        $this->view->render(array('title' => 'Заказы', 'style' => '/123.css'));
    }
    public function orderAction(){
        $this->view->layout = 'forOrders';
        $vars['Orders'] = $this->model->getOrders();
        $this->view->render(array('title' => 'Заказы', 'style' => '/123.css'), $vars);
    }
    public function ajaxAction(){
        $string = $_POST['action'];
        $vars['thisOrder'] = $this->model->$string($_POST['id']);
        $this->view->render(array('title' => 'Заказы', 'style' => '/123.css'), $vars);
    }
}