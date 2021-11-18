<?php

include_once 'Controlers/controlProducts.php';
session_start();
$pid = $_GET['pid'];
$_SESSION['cart'][] = $pid;
header("Location:adminProds.php");

?>