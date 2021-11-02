<?php

include 'Controlers/controlProducts.php';

$name = $_POST['name'];
$price = $_POST['price'];
$available = $_POST['available'];
$ctrlProds = new ControlProducts();



$ctrlProds->addProduct($name,$price,$available);



?>
