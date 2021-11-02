<?php

include_once '../models/user.php';
include 'accessBD.php';

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
        
        foreach ($this->AllUsers as $value){?>
            <tr>
                <th> <?php echo $value->getUsername(); ?> </th>
                <th><a href='../crudUsers/userProfile.php?id=<?php echo $value->getId()?>'><img  class='amd_icon' src='../imgs/show_icon.jpg'> </a></th>
                <th><a href='../crudUsers/modifyUser.php?id=<?php echo $value->getId()?>'><img  class='amd_icon' src='../imgs/edit_icon.png'> </a></th>
                <th><a href='../crudUsers/deleteUser.php?id=<?php echo $value->getId()?>'><img  class='amd_icon' src='../imgs/delete_icon.png'> </a></th>
            </tr>

        <?php
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


    function getUserById($id){
        foreach($this->AllUsers as $value){
            if($value->getId() == $id){
                return $value;
            }
        }
        return false;
    }

    function deleteUserById($id){
        $sql3 = "DELETE FROM usuarios WHERE `ID` =".$id ;
        $res=mysqli_query($this->bd->getConnection(),$sql3);
        if ($res === TRUE) {
            $this->fetchAllProducts();
            header("Location:adminProds.php");
        }else {
            echo "ERROR";
        }
    }
}
?>