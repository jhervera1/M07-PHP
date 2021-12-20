<?php
include '../Controlers/controlUsers.php';

session_start();
$ctrlUsers = new ControlUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>control de usuarios</title>
    <link rel='stylesheet' href='../styles.css'>
</head>

<body>
<header id="header_background">
    <a class="cart_icon" href="../perfil.php"><img class="cart_icon white_icon" src="../imgs/back_icon.png"></a>
</header>
    <div class="wrapper fadeInDown">
        <table id="formContent">
            <tr>
                <th> Nombre del Producto </th>
                <th> Precio </th>
            </tr>
            <?php $ctrlUsers->showAllUsers(); ?>
            <th><a href="addUser.html"><img class='amd_icon' src="../imgs/add_icon.png"> </a></th>
        </table>
        
    </div>


</body>

</html>