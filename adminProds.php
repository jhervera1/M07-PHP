<?php
 include_once 'Controlers/controlProducts.php';
 include_once 'Controlers/controlUsers.php';
 session_start();
 
    $id = $_SESSION['userID'];
    $controlProds = new ControlProducts();
    $controlUsers = new ControlUsers();
    
?> 
    <html>
    
    <link rel='stylesheet' href='styles.css'>
    <body>
        <header id="header_background">
            <a class="cart_icon" href='carrito.php'><img class="cart_icon white_icon" src="imgs/cart_icon.png"></a>
        </header>
        <div class='itemList itemListContent'>
            <table>
                <tr>
                <th></th><th> Nombre del Producto </th> <th> Precio </th>
                </tr>
                <?php $controlProds->showProducts(); ?>
            </table>
            <a href='addProds.html' ><img class='amd_icon' src='imgs/add_icon.png'></a>
        </div>
    <body>
    </html>




