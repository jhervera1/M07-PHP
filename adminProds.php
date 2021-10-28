<?php
 include 'Controlers/controlProducts.php';
 include 'Controlers/controlUsers.php';
 session_start();
 
    $id = $_SESSION['userID'];
    $controlProds = new ControlProducts();
    $controlUsers = new ControlUsers();
    
    if($controlUsers->checkAdmin($id)){
        echo "<link rel='stylesheet' href='styles.css'>";
        echo "<div class='itemList itemListContent'>";
        echo "<table>";
        echo "<tr>";
        echo "<th> Nombre del Producto </th> <th> Precio </th>";
        echo "</tr>";
        $controlProds->showProducts();
        echo "</table>";
        echo "<a href='addProds.html' ><img class='amd_icon' src='imgs/add_icon.png'></a>";
        echo "</div>";
    }else{
        echo 'no sos admin viejo sabroso';
        
    }




?>