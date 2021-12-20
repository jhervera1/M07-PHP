<?php

include '../Controlers/controlUsers.php';

$id = $_GET['id'];
$ctrlUsers = new ControlUsers();
$user = $ctrlUsers->getUserById($id);


/*function  createConfirmationmbox(){
    echo '<script type="text/javascript"> ';
    echo ' function createConfirmAlert {';
    echo '  if (confirm("Estas seguro de que quieres modificar este usuario?")) {';
    echo '   return true;'           
    echo '  }else{ return false;}';
    echo '}';
    echo '</script>';
}
*/
?>


<html>
<link rel='stylesheet' href='../styles.css'>
<header id="header_background">
    <a class="cart_icon" href="checkUsers.php"><img class="cart_icon white_icon" src="../imgs/back_icon.png"> </a>
</header>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <form action="confirmModify.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">

            <input type="hidden" id="uid" name="uid" value="<?php echo $user->getId() ?>" readonly><br>
            <label>Nombre </label><br>
            <input type="text" id="username" name="username" value="<?php echo $user->getUsername() ?>"><br>
            <label>Contraseña </label><br>
            <input type="text" id="password" name="password" value="<?php echo $user->getPassword() ?>"><br>
            <label>Correo</label><br>
            <input type="text" id="mail" name="mail" value="<?php echo $user->getMail() ?>"><br>
            <img  style="width: 150px;align-items: center;" src="<?php echo $user->getAvatar() ?>"><br>
            <input type="file" name="image">
            <input type="submit">
        </form>
    </div>
</div>

</html>