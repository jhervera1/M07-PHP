<?php


include_once('Controlers/controlProducts.php');

session_start();

$cartIds = $_SESSION['cart'];
$ctrlProds = new ControlProducts();

$cart = array();

foreach ($cartIds as $prodId) {
    $cart[] = $ctrlProds->findProdById($prodId);
}

?>


<html>
<link rel="stylesheet" href="styles.css">

<body>
    <header id="header_background">
        <a class="cart_icon" href="adminProds.php"><img class="cart_icon white_icon" src="back_icon.png"></a>
    </header>
    <div>

        <div class='wrapper fadeInDown'>
            <?php
            foreach ($cart as $value) {
            ?>
                <div id='formContent'>
                    <img class='profile_image' src='<?php echo $value->getImg() ?>'>
                    <p class='flex_p'><b>Nombre:</b><?php echo $value->getName() ?></p>
                    <p class='flex_p'><b>Precio:</b><?php echo $value->getPrice() ?></p>
                </div>
            <?php } ?>
        </div>

    </div>

</body>


</html>