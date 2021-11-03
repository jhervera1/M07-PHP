<?php
include '../Controlers/controlUsers.php';


$ctrlUsers = new ControlUsers();
$targetDir = "uploads/";
$fileName = $_FILES["image"]["name"];
$targetFilePath = $targetDir.$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$uid = $_POST['uid'];
$username = $_POST['username'];
$password = $_POST['password'];
$mail = $_POST['mail'];
$image = $_POST['image'];
$user = $ctrlUsers -> getUserById($id);

if(isset($_POST['submit'])) { 
    
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        
        
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = $targetFilePath;

        $imageData = base64_encode(file_get_contents($folder));

        $src = 'data:'.$fileType.';base64,'.$imageData;
        $user->setUsername($username); 
        $user->setPassword($password);
        $user->setMail($mail);
        $user->setAvatar($src);
        $ctrlUsers->modifyUser($uid,$user);
        $ctrlUsers->modifyUserById($uid);
        
    }
    
 
}





?>