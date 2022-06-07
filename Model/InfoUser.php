<?php
class InfoUser {
    public $id;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $password;




    public function __construct($id,  $name, $phone , $address , $email , $password) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
        $this->password = $password;
    }
}