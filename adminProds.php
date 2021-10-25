<?php
 include 'Controlers/controlProducts.php';
 include 'Controlers/controlUsers.php';
    
 
    $username = $_GET['user'];
    $controlProds = new ControlProducts();
    $controlUsers = new ControlUsers();
    
    if($controlUsers->checkAdmin($username)){
        echo "<link rel='stylesheet' href='styles.css'>";
        echo "<div class='itemList itemListContent'>";
        echo "<table>";
        echo "<tr>";
        echo "<th> Nombre del Producto </th> <th> Precio </th>";
        echo "</tr>";
        $controlProds->showProducts($username);
        echo "</table>";
        echo "<img class='amd_icon' src='imgs/add_icon.png'>";
        echo "</div>";
    }else{
        echo 'no sos admin viejo sabroso';
        
    }




?>