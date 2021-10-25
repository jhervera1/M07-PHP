<?php

include 'models/products.php';
include 'Controlers/controlProducts.php';
$id = $_GET['id'];
$user = $_GET['user'];
$name = $_POST['name'];
$price = $_POST['price'];
$available = $_POST['available'];
$product = new Product();
$ctrlProds = new ControlProducts();

$product->setId($id);
$product->setName($name);
$product->setPrice($price);
$product->setAvailability($available);

$ctrlProds-> modifyProduct($product,$user);




?>
