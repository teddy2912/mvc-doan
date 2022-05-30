<?php
require_once './Controller/Auth.php';

class Controller {
    public function __construct() {
        $auth = new Auth();
        $user = $auth->user();
        if($user == NULL || $user['role'] != 'admin'){
            redirect(url_pattern('homeController', 'login'));
        }
    }

    public function invoke() {
        if(isset($_GET['controller'])){
            $controllerClass = ucfirst($_GET['controller']); //homeController -> HomeController
            require_once "./Controller/Admin/$controllerClass.php";
            $controller = new $controllerClass;
            $controller->invoke();
        }

        if(isset($_POST['controller'])){
            $controllerClass = ucfirst($_POST['controller']); //homeController -> HomeController
            require_once "./Controller/Admin/$controllerClass.php";
            $controller = new $controllerClass;
            $controller->invoke();
        }
    }
}