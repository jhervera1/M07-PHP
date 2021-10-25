<?php

class Users {

    private $id;
    private $username;
    private $password;
    private $mail;
    private $avatar;
    private $admin;

    public function __construct() {
        
    }

    function setId($id){
        $this->id = $id;
    }
    function getId(){
        return $this->id;
    }
    function setUsername($username){
        $this->username = $username;
    }
    function getUsername(){
        return $this->username;
    }
    function setPassword($password){
        $this->password = $password;
    }
    function getPassword(){
        return $this->password;
    }
    function setMail($mail){
        $this->mail = $mail;
    }
    function getMail(){
        return $this->mail;
    }
    function setAvatar($avatar){
        $this->avatar = $avatar;
    }
    function getAvatar(){
        return $this->avatar;
    }
    function setAdmin($admin){
        $this->admin = $admin;
    }
    function getAdmin(){
        return $this->admin;
    }


}

?>
