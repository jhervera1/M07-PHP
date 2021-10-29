<?php
 include 'Controlers/controlProducts.php';
 include 'Controlers/controlUsers.php';
 session_start();
 
    $id = $_SESSION['userID'];
    $controlProds = new ControlProducts();
    $controlUsers = new ControlUsers();
    
    if($controlUsers->checkAdmin($id)){ ?>
    <html>
        <link rel='stylesheet' href='styles.css'>
        <div class='itemList itemListContent'>
        <table>
        <tr>
        <th> Nombre del Producto </th> <th> Precio </th>
        </tr>
        <?php $controlProds->showProducts(); ?>
        </table>
        <a href='addProds.html' ><img class='amd_icon' src='imgs/add_icon.png'></a>
        </div>

        </html>
    <?php
    }else{
        header("Location:perfil.php");
        
    }




?>