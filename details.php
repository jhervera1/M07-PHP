<?php
include 'Controlers/controlProducts.php';
session_start();

$pid = $_GET['pid'];
$controlProducts = new ControlProducts();
$product;
foreach ($controlProducts->getProducts() as $prod) {
    if ($prod->getId() == $pid) {
        $product = $prod;
    }
}

?>

<html>
<link rel="stylesheet" href="styles.css">

<body>
    <header id="header_background">
        <a href="adminProds.php"><img class='amd_icon' src="./imgs/back_icon.png"></a>
    </header>
    <div>
        <div class='wrapper fadeInDown'>
            <div id='formContent'>
                <img class='profile_image' src='<?php echo $product->getImg(); ?>'>
                <p class='flex_p'><b>Nombre:</b><?php echo $product->getName(); ?></p>
                <p class='flex_p'><b>Precio:</b><?php echo $product->getPrice(); ?></p>
                <form action="addToCart.php?pid=<?php echo $pid ?>" method="post">
                    <button type='submit' name='submit' class='buttons'>Añadir a la cesta</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>