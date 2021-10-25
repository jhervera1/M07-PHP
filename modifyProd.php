<?php 
    include 'Controlers/controlProducts.php';

    $id = $_GET['id'];
    $user = $_GET['user'];
    $controlProducts = new ControlProducts();
    $product;
    echo $user;
    foreach($controlProducts->getProducts() as $prod){
        if($prod->getId() == $id){
            $product = $prod;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar producto</title>
</head>
<body>
    <form action="updateProds.php?id=<?php echo $id ?>&user=<?php echo $user ?>" method="POST" enctype="multipart/form-data">
        <label>Id </label><br>
        <input type="number" id="pid" name="pid" value="<?php echo $product->getId() ?>"><br>
        <label>Nombre </label><br>
        <input type="text" id="name" name="name" value="<?php echo $product->getName() ?>"><br>
        <label>Precio </label><br>
        <input type="number" id="price" name="price" value="<?php echo $product->getPrice()?>"><br>
        <label>Disponibilidad</label><br>
        <input type="number" id="available" name="available" value="<?php echo $product->getAvailability()?>"><br>
        <input type="submit"> 
    </form>
</body>
</html>

