<?php

include('Controlers/controlProducts.php');

$pid = $_GET['pid'];
$user = $_GET['user'];
$crtlProd = new ControlProducts();


$crtlProd->deleteProduct($pid,$user);



?>