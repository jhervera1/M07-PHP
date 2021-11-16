<?php


include_once('Controlers/controlProducts.php');
$ctrlProds = new ControlProducts();

$cart = $ctrlProds->getCart();
foreach($cart as $value){
    echo $value->getName();
}
?>

<!--
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
                <form action="logout.php">
                    <button type='submit' name='submit' class='buttons'>Tancar sessio</button>
                </form>
            </div>
        </div>
    </div>

</body>


</html>->