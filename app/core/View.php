<?php


namespace app\core;


class View
{
    public $path;
    public $route;
    public $layout = 'default';
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }
    public function render($head = [], $vars = []){
        $path = 'app/view/'.$this->path.'.php';
        if(file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/view/layouts/'.$this->layout.'.php';
        }

    }
    public static function errorCode($code){
        http_response_code($code);
        require 'app/view/errors/'.$code.'.php';
        exit;
    }
    public function redirect($url){
        header('location: '.$url);
        exit;
    }
}