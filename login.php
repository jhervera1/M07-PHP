<?php

include 'Controlers/accessBD.php';
include 'Controlers/controlUsers.php';
session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$confirmedUser = false;
$bd = new AccessBD();
$ctrlUsers = new ControlUsers();

if(isset($_POST['submit'])) { 
    
    $sql = "SELECT * from usuarios where 1";
    $consulta=mysqli_query($bd->getConnection(),$sql);

    while ($fila=$consulta->fetch_assoc()) {
        if($username == $fila['Usuario'] &&  $ctrlUsers->passwordCrypt($password) == $fila['Contraseña']){
            $_SESSION['userID'] = $fila['ID'];
            $confirmedUser = true;
            break;
        }

    }
    if(!$confirmedUser){
        echo "El usuari o la contrasenya son incorrectes";
    }else{
        
        header("Location:perfil.php");
    }

} 

?>