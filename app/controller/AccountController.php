<?php


namespace app\controller;

use app\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->render(array('title' => 'Авторизация', 'style' => '/public/style/login.css'));
    }
    public function registerAction()
    {
        $this->view->render(array('title' => 'Регистрация', 'style' => '/public/style/register.css'));
    }
}