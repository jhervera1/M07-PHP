<?php
include 'Controlers/controlUsers.php';

session_start();
$ctrlUsers: new ControlUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>control de usuarios</title>
    <link rel='stylesheet' href='styles.css'>
</head>
<body>
    
    <div class='itemList itemListContent'>
        <table>
            <tr>
                <th> Nombre del Producto </th> <th> Precio </th>
            </tr>
                <?php $ctrlUsers->showAllUsers(); ?>
        </table>
    </div>


</body>
</html>