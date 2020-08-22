<?php


namespace app\controller;

use app\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $vars = [];
        if($_POST){
            $vars['error'] = $this->model->login($_POST);
            if($vars['error'] === true){
                $this->view->redirect("/");
            }
        }
        $this->view->render(array('title' => 'Авторизация', 'style' => '/public/style/login.css'), $vars);
    }
    public function registerAction()
    {
        $vars = [];
        if($_POST){
        $vars['error'] = $this->model->register($_POST);
        if($vars['error'] === true){
            $this->view->redirect('/account/login', array('Спасибо за регистрацию'));
        }
        }
        $this->view->render(array('title' => 'Регистрация', 'style' => '/public/style/register.css'), $vars);
    }
}