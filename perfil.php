<?php
include_once 'Controlers/accessBD.php';
include_once 'Controlers/controlUsers.php';
session_start();
$id = $_SESSION['userID'];
$admin = $_SESSION['admin'];
$ctrlUsers = new ControlUsers();
$bd = new accessBD();

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
                    if ($fila=$consulta->fetch_assoc()) {?>
                        <img class='profile_image' src='<?php echo $fila['image'] ?>' >
                        <p class='flex_p'><b>Usuari:</b><?php echo $fila['Usuario'] ?></p>
                        <p class='flex_p'><b>Contrasenya:</b><?php echo $fila['Contraseña'] ?></p>
                        <p class='flex_p'><b>Correu:</b><?php echo $fila['Correo'] ?></p>
                        <form action="logout.php">
                            <button type='submit' name='submit' class='buttons'>Tancar sessio</button>
                        </form>
                    <?php
                    } 
                    if($ctrlUsers->checkAdmin()){ ?>
                        <a href='crudUsers/checkUsers.php'>Administrar usuarios </a>       
                    <?php } ?>    
                    <a href='adminProds.php'>administrar productos </a>
            </div>
        </div>
    </div>

</body>
</html>