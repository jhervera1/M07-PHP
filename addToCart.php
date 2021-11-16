<?php

include_once 'Controlers/controlProducts.php';

$pid = $_GET['pid'];
$ctrlProds = new ControlProducts();
//$cart = new array();
$prod = $ctrlProds->findProdById($pid);
$ctrlProds->addToCart($prod);

header("Location:adminProds.php");

?>