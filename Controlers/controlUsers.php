<?php

if (is_file("models/user.php")){
	include_once ("models/user.php");
	}
	else {
	include_once ("../models/user.php");
	}
include_once 'accessBD.php';

class ControlUsers{

    private $bd;
    private $logedUser;
    private $AllUsers;
    
    public function __construct() {
        
        $this->bd = new AccessBd();
        $this->fetchAllUsers();
    
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
    function checkAdmin(){
        
        foreach ($this->AllUsers as $value){
            if($value->getId() == $_SESSION['userID']){
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
            header("Location:checkUsers.php");
        }else {
            echo "ERROR";
        }

    }
    function modifyUserById($id){
        
        $user = $this->getUserById($id);
        $sql2 = "UPDATE usuarios SET Usuario='".$user->getUsername()."', Contraseña='".$user->getPassword()."', Correo='".$user->getMail()."', image='".$user->getAvatar()."' where ID='".$user->getId()."'";
        $res=mysqli_query($this->bd->getConnection(),$sql2);
        if ($res === TRUE) {
            header("Location:checkUsers.php");
        }else {
            echo "ERROR";
        }


    }


    function modifyUser($id, $user){
        foreach($this->allUsers as $value){
            if($value->getId() == $id){
                $value = $user;
            }
        } 
    }

    function usernameUnavailable($username){
        
        $sql2 = "SELECT * from usuarios where 1";
        $res=mysqli_query($this->bd->getConnection(),$sql2);
        while ($fila=$res->fetch_assoc()) {
            echo $fila['Usuario'];
            if($username == $fila["Usuario"]){
                return false;
            }
        }
        return true;
    }

    function addUser($user){

        $sql = 'INSERT INTO `usuarios` (`ID`,`Usuario`,`Contraseña`,`Correo`,`image`,`Admin`) VALUES (NULL, "'.$user->getUsername().'","'.$user->getPassword().'","'.$user->getMail().'","'.$user->getAvatar().'",'.$user->getAdmin().')';
        $res=mysqli_query($this->bd->getConnection(),$sql);
        if ($res === TRUE) {
           echo "OK";
        }else {
            echo "ERROR";
        }
        
    }

    function convertCheckIntoBool($admin)
    {

        if($admin == 'on'){
            return 1;
        }else{
            return 0;
        }

    }

}
?>