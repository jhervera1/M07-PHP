<?php

include "../Controlers/controlUsers.php";

$ctrlUsers = new ControlUsers();
$id = $_GET['id'];


$ctrlUsers->deleteUserById($id);
?>