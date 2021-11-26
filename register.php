<?php

include 'Controlers/accessBD.php';
include_once 'Controlers/controlUsers.php';
include_once 'models/user.php';

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

$userAdded = new Users();
$bd = new AccessBD();
$ctrlUsers = new ControlUsers();

if(isset($_POST['submit'])) { 
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        
        
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = $targetFilePath;

        $imageData = base64_encode(file_get_contents($folder));

        $src = 'data:'.$fileType.';base64,'.$imageData;

        if(trim($username) != ""){
            if(preg_match('/^[a-zA-Z0-9_]+$/', trim($username))){
                $user = $ctrlUsers->usernameUnavailable(trim($username));
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
            $userAdded->setUsername($username);
            $userAdded->setPassword(password_hash($password, PASSWORD_DEFAULT));
            $userAdded->setMail($email);
            $userAdded->setAvatar($src);
            $userAdded->setAdmin(0);
            $ctrlUsers->addUser($userAdded);
            header("Location: login.html");
        }
    }
} 

?>