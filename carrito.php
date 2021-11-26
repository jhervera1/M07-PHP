<?php


include_once('Controlers/controlProducts.php');

session_start();

$cartIds = $_SESSION['cart'];
$ctrlProds = new ControlProducts();

$cart = array();

foreach($cartIds as $prodId){
    $cart[] = $ctrlProds->findProdById($prodId);
}

?>


<html>

<body>
    <div>
        <div class='wrapper fadeInDown'> 
            <div id='formContent'>
                <?php
                
                foreach($cart as $value){
                ?>
                <img class='profile_image' src='<?php echo $value->getImg() ?>' >
                <p class='flex_p'><b>Nombre:</b><?php echo $value->getName() ?></p>
                <p class='flex_p'><b>Precio:</b><?php echo $value->getPrice() ?></p>
                <?php } ?>
               
            </div>
        </div>
    </div>

</body>


</html>