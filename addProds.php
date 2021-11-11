<?php

include 'Controlers/controlProducts.php';


$targetDir = "uploads/";
$fileName = $_FILES["image"]["name"];
$targetFilePath = $targetDir.$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$name = $_POST['name'];
$price = $_POST['price'];
$available = $_POST['available'];
$ctrlProds = new ControlProducts();
$src;

if(isset($_POST['submit'])) { 
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        
        
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = $targetFilePath;

        $imageData = base64_encode(file_get_contents($folder));

        $src = 'data:'.$fileType.';base64,'.$imageData;
        echo $src;
    }
}
$ctrlProds->addProduct($name,$price,$available,$src);
    


?>
