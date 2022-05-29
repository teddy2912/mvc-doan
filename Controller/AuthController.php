<?php
include_once './Controller/Auth.php';

class AuthController { 
    public function __construct() {

    }

    public function invoke() {
        if(isset($_GET['page'])){
            switch($_GET['page']){
                case 'login':
                    $this->loginPage();
                    break;
                case 'logout':
                    $this->logoutPage();
                    break;
                case 'register':
                    $this->registerPage();
                    break;
            }
        }

        if(isset($_POST['page'])){
            switch($_POST['page']){
                case 'login':
                    $this->postLoginPage();
                    break;
                case 'register':
                    $this->postRegisterPage();
                    break;
            }
        }
    }

    private function loginPage(){
        require_once './View/login.php';
    }

    private function postLoginPage(){
        $auth = new Auth();
        $auth->login($_POST['email'], $_POST['password']);
        redirect(url_pattern('homeController', 'home'));
    }

    private function logoutPage(){
        unset($_SESSION['user']);
        redirect(url_pattern('homeController', 'home'));
    }

    private function registerPage(){
        require_once './View/register.php';
    }

    private function postRegisterPage(){
        $auth = new Auth();
        $auth->register($_POST['email'], $_POST['password']);
    }
}