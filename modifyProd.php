<?php
include 'Controlers/controlProducts.php';
session_start();
$id = $_GET['id'];
$controlProducts = new ControlProducts();
$product;
foreach ($controlProducts->getProducts() as $prod) {
    if ($prod->getId() == $id) {
        $product = $prod;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar producto</title>
</head>

<body>
<header id="header_background">
        <a class="cart_icon" href="adminProds.php"><img class="cart_icon white_icon" src="./imgs/back_icon.png"></a>
    </header>
    <div class="wrapper fadeInDown" style="margin-top:5px">
        <div id="formContent">
            <form action="updateProds.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                <label>Id </label><br>
                <input type="number" id="pid" name="pid" value="<?php echo $product->getId() ?>" readonly><br>
                <label>Nombre </label><br>
                <input type="text" id="name" name="name" value="<?php echo $product->getName() ?>"><br>
                <label>Precio </label><br>
                <input type="number" id="price" name="price" value="<?php echo $product->getPrice() ?>"><br>
                <label>Disponibilidad</label><br>
                <input type="number" id="available" name="available" value="<?php echo $product->getAvailability() ?>"><br>
                <input type="submit">
            </form>
        </div>
    </div>
</body>

</html>