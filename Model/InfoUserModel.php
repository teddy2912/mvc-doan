<?php
include_once './Model/InfoUser.php';
include_once './Model/Database.php';

class InfoUserModel extends Database {

    public function __construct() {
        $this->connect();
    }

    public function find($id) {
        $sql = "select * from info_users where id=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    
        $info_user = $stmt->fetch();
        return new InfoUser(
            $info_user['id'],
            $info_user['name'],
            $info_user['phone'],
            $info_user['address'],
            $info_user['email'],
            $info_user['password'],

        );
    }

    public function all() {
        $sql = "select * from info_users";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $info_users = array();

        foreach($query as $info_user){
            $info_users[] = new InfoUser(
                $info_user['id'],
                $info_user['name'],
                $info_user['phone'],
                $info_user['address'],
                $info_user['email'],
                $info_user['password'],
            );
        }

        return $info_user;
    }

    public function delete($id){
        $sql = "delete from info_users where id = " . $id;
        $this->pdo->exec($sql);
    }

    public function create($attr = array()) {
        $users_id = $attr['users_id'];
        $name = $attr['name'];
        $phone = $attr['phone'];
        $address = $attr['address'];
        $email = $attr['email'];
        $password = $attr['password'];

        $sql = "insert into info_users(name, phone, address, email, password, users_id) values('$name','$phone', '$address', $users_id, '$email', '$password')";
        $this->pdo->exec($sql);
    }

    public function update($attr = array()) {
        $name = $attr['name'];
        $phone = $attr['phone'];
        $address = $attr['address'];
        $email = $attr['email'];
        $password = $attr['password'];

        $sql ="UPDATE info_users set name= '$name', phone= '$phone', address='$address' , email= '$email', password='$password' where id=" . $attr['id'];
        var_dump($sql);
        
        $this->pdo->exec($sql);
    }

    public function findByUserId($users_id){
        $sql = "select * from info_users where users_id=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$users_id]);
    
        $info_user = $stmt->fetch();
        return new InfoUser(
            $info_user['id'],
            $info_user['name'],
            $info_user['phone'],
            $info_user['address'],
            $info_user['users_id'],
            $info_user['email'],
            $info_user['password']
        );
    }
    
}