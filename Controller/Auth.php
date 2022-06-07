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
            if($user['role'] == 'admin') redirect(admin_url_pattern('categoryController', 'index'));     
        }else{
            redirect(url_pattern('loginController', 'login'));
        }
    }
    public function register($email, $password, $name, $phone, $address){
        //check name is exist
        $sql = "select * from users where email=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
    
        $user = $stmt->fetch();

        if($user){
            //user name existed
            $_SESSION['errors'] = 'Email đã tồn tại, Mau thay đổi email';
            redirect(url_pattern('authController', 'login')); die();
        }else{
            //Them moi user
            $sql = "insert into users(email, password, role) values('$email','$password', 'user')";
            $this->pdo->exec($sql);

            //Lay thong tin user vua insert vao database
            $sql = "select * from users where email=? LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$email]);
        
            $user = $stmt->fetch();

            //Them thong tin infouser
            $infoUserModel = new InfoUserModel();
            $infoUserModel->create(
                array(
                    'name' => $name,
                    'phone' => $phone,
                    'address' => $address,
                    'email' => $email,
                    'password' => $password,
                    'users_id' => $user['id']
                )
                );
        }
    }
    
}