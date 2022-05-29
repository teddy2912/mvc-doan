<?php
class User {
    public $id;
    public $email;
    public $password;
    public $address;
    public $phone;
    public $role;

    public function __construct($id, $email, $password, $address, $phone, $role) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->phone = $phone;
        $this->role = $role;
    }
}