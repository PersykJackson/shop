<?php

namespace app\core;



class Router
{
    public $routes = [];
    public $params = [];
    public function __construct()
    {
        $routes = require 'app/config/routes.php';
        foreach($routes as $route => $params) {
            $this->add($route, $params);
        }
    }
    private function add($route, $params)
    {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }
    private function match()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        foreach($this->routes as $route => $params) {
            if (preg_match($route, $uri, $matches)) {
                $this->params = $params;
                return true;
            }
        };
        return false;
    }
    public function run(){
        if($this->match()){
            $path = 'app\controller\\'.ucfirst($this->params['controller']).'Controller';
            if(class_exists($path)){
                $action = $this->params['action'].'Action';
                if(method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                }else{
                    view::errorCode(404);;
                }
            }else{
                view::errorCode(404);
            }
        }else{
            view::errorCode(404);
        }
    }
}