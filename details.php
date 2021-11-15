<?php 
    include 'Controlers/controlProducts.php';
    session_start();

    $pid = $_GET['pid'];
    $controlProducts = new ControlProducts();
    $product;
    foreach($controlProducts->getProducts() as $prod){
        if($prod->getId() == $pid){
            $product = $prod;
        }
    }

?>

<html>

<body>
    <div>
        <div class='wrapper fadeInDown'>
            <div id='formContent'>
                <img class='profile_image' src='<?php echo $product->getImg(); ?>' >
                <p class='flex_p'><b>Nombre:</b><?php echo $product->getName(); ?></p>
                <p class='flex_p'><b>Precio:</b><?php echo $product->getPrice(); ?></p>
                <form>
                    <button type='submit' name='submit' class='buttons'>Tancar sessio</button>
                </form>
                
            </div>
        </div>
    </div>

</body>

</html>

<?php
if(isset($_POST['submit'])) { 

    $_SESSION['cart'][] = $product;

}

?>
