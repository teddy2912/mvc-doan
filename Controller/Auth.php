<?php
include_once './Model/Database.php';
include_once './Model/User.php';

class Auth extends Database{

    public function __construct()
    {
        $this->connect();
    }

    public function user(){
        if(isset($_SESSION['user']))
            return $_SESSION['user'];
        return NULL;
    }

    public function login($email, $password){
        $sql = "select * from users where email=? and password=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $password]);
    
        $user = $stmt->fetch();
        if($user) {
            unset($_SESSION['user']);
            $_SESSION['user'] = $user;
        }else{
            redirect(url_pattern('loginController', 'login'));
        }
    }

    public function register($email, $password){
        //check name is exist
        $sql = "select * from users where email=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
    
        $user = $stmt->fetch();

        if($user){
            //user name existed
            unset($_SESSION['user']);
            $_SESSION['user'] = $user;
        }else{
            $role = 'user';
            $sql = "insert into users(email, password, role) values('$email','$password', '$role)";
    
            $this->pdo->exec($sql);
            unset($_SESSION['user']);
            $_SESSION['user'] = $user;
        }
    }
}