<?php
include 'Controlers/accessBD.php';
session_start();
$id = $_SESSION['userID'];
$admin = $_SESSION['admin'];

$bd = new accessBD();

if(isset($_POST['submit'])){
    header("Location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
        <div class='wrapper fadeInDown'>
            <div id='formContent'>
                <?php
        
                    $sql = "SELECT * FROM `usuarios` WHERE ID='$id'";
                    $consulta=mysqli_query($bd->getConnection(),$sql);
                    while ($fila=$consulta->fetch_assoc()) {
                        echo "<img class='profile_image' src='".$fila['image']."' >";
                        echo "<p class='flex_p'><b>Usuari:</b>".$fila['Usuario']."</p>";
                        echo "<p class='flex_p'><b>Contrasenya:</b>".$fila['Contraseña']."</p>";
                        echo "<p class='flex_p'><b>Correu:</b>".$fila['Correo']."</p>";
                        echo "<button type='submit' name='submit' class='buttons'>Tancar sessio</button>";
                    }
                    if($admin == 1){
                        echo "<a href='adminProds.php'>administrar productos </a>";
                    }                
                ?>
            </div>
        </div>
    </div>

</body>
</html>