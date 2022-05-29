<?php
include_once './Model/User.php';
include_once './Model/Database.php';

class UserModel extends Database
{

    public function __construct()
    {
        $this->connect();
    }

    public function find($id)
    {
        $sql = "select * from users where id=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        $user = $stmt->fetch();
        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['address'],
            $user['phone'],
            $user['role']
        );
    }

    public function all()
    {
        $sql = "select * from users";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $users = array();

        foreach ($query as $user) {
            $users[] = new User(
                $user['id'],
                $user['email'],
                $user['password'],
                $user['address'],
                $user['phone'],
                $user['role']
            );
        }

        return $users;
    }

    public function delete($id)
    {
        $sql = "delete from users where id = " . $id;
        $this->pdo->exec($sql);
    }

    public function create($attr = array())
    {
        $email = $attr['email'];
        $password = $attr['password'];
        $role = $attr['role'];
        $sql = "insert into users(email, password, role) values('$email','$password', '$role)";

        $this->pdo->exec($sql);
    }

    public function update($attr = array())
    {
        $email = $attr['email'];
        $password = $attr['password'];
        $role = $attr['role'];
        $sql = "UPDATE users set email= '$email', password= '$password', role='$role where id=" . $attr['id'];
        var_dump($sql);

        $this->pdo->exec($sql);
    }
}
