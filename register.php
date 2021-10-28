<?php

include 'accessBD.php';

//$username =$_POST["username"];
$targetDir = "uploads/";
$fileName = $_FILES["image"]["name"];
$targetFilePath = $targetDir.$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$username = $_POST["username"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$email = $_POST["email"];
$user = false;
$pass = false;
$bd = new AccessBD();

if(isset($_POST['submit'])) { 
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        
        
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = $targetFilePath;

        $imageData = base64_encode(file_get_contents($folder));

        $src = 'data:'.$fileType.';base64,'.$imageData;

        if(trim($username) != ""){
            if(preg_match('/^[a-zA-Z0-9_]+$/', trim($username))){
                $sql2 = "SELECT * from usuarios where 1";
                $consulta2=mysqli_query($bd->getConnection(),$sql2);
                if(mysql_num_rows($consulta2) >= 0){
                    while ($fila=$consulta2->fetch_assoc()) {
                        if($username != $fila["usuario"]){
                            $user = true;
                        }
                    }
                }
            }
        }
        if(trim($password) != "" && trim($confirm_password) != ""){
            if(trim($password) == trim($confirm_password)){
                if(preg_match('/^[a-zA-Z0-9_]+$/', trim($password))){
                    $pass = true;
                }
            }
        }else{
            echo "Porfavor introduzca una contraseña";
        }
        if($user && $pass){
            $sql = 'INSERT INTO `usuarios` (`ID`,`Usuario`,`Contraseña`,`Correo`,`image`) VALUES (NULL, "'.$username.'","'.$password.'","'.$email.'","'.$src.'")';
            $consulta=mysqli_query($bd->getConnection(),$sql);
            header("Location:login.html");
        }
    }
} 

?>