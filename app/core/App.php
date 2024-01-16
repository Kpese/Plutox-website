<?php
namespace App\core;

class App{
    protected $controller = "MoviesController";
    protected $method = "index";
    protected $params = [];

    public function __construct(){
        $this->prepareUrl();
        $this->render();
    }

    private function prepareUrl(){
        $url = $_GET['url'] ?? null;

        if(!empty($url)){

        $url = explode("/", trim($url, '/'));

        
        // for controllers
        $this->controller = isset($url[0]) ? ucfirst($url[0]). "Controller" :'MoviesController';

        //for methods
        $this->method= isset($url[1]) ? $url[1] :'index';

        unset($url[0], $url[1]);

        $this->params = array_merge($this->params, $url);
        }
        //   var_dump($this->controller,$this->method,$this->params);
        // echo "<pre>";
        // print_r($_SERVER);
    }
    
    private function render(){
        $controllerClassName = "App\\controllers\\" . $this->controller;

        if(class_exists($controllerClassName)){
            $controller = new $controllerClassName();
            if(method_exists($controller, $this->method)){
                call_user_func_array([$controller, $this->method], $this->params);
            } else{
            $file = '../app/controllers/_404.php';
            require $file;
            $controller = '_404.php';
            }
        } else {
            $file = '../app/controllers/_404.php';
            require $file;
            $controller = '_404.php';
        }
    }
}
?>
