<?php

include 'models/user.php';
include_once 'accessBD.php';

class ControlUsers{

    private $bd;
    private $logedUser;
    private $AllUsers;
    
    public function __construct() {
        
        $this->bd = new AccessBd();
        $this->fetchAllUsers();
        //$this->showAllUsers();
    
    }

    function fetchAllUsers(){
        
        $sql = "SELECT * FROM usuarios where 1";
        $res=mysqli_query($this->bd->getConnection(),$sql);
        
        while($row= $res->fetch_assoc()){
            
            $user = new Users();
            $user->setId($row['ID']);
            $user->setUsername($row['Usuario']);
            $user->setPassword($row['Contraseña']);
            $user->setMail($row['Correo']);
            $user->setAvatar($row['image']);
            $user->setAdmin($row['Admin']);

            $this->AllUsers[] = $user;
        }

    }

    function showAllUsers(){
        
        foreach ($this->AllUsers as $value){
            echo "<br>".$value->getUsername();
        }

    }
    function checkAdmin($id){
        
        foreach ($this->AllUsers as $value){
            if($value->getId() == $id){
                if($value->getAdmin() == 1){
                    return true;
                }
            }
        }
        return false;

    }
}
?>