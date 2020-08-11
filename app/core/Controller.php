<?php


namespace app\core;


abstract class Controller
{
    public $route;
    public $path;
    public $view;
    public $model;
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        $this->view = new View($route);
        $this->model = $this->loadModel($this->route['controller']);
    }
    public function loadModel($name)
    {
        $path = "app\models\\".ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        } else {
            view::errorCode(404);
            return false;
        }
    }
}