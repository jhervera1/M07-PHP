<?php

include "../Controlers/controlUsers.php";

$ctrlUsers = new ControlUsers();
$id = $_GET['id'];
$user = $ctrlUsers -> getUserById($id);


?>