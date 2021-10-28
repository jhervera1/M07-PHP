<?php

include('Controlers/controlProducts.php');

$pid = $_GET['pid'];
$crtlProd = new ControlProducts();


$crtlProd->deleteProduct($pid);



?>