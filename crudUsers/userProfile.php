<?php

include "../Controlers/controlUsers.php";

$id = $_GET['id'];
$ctrlUsers = new ControlUsers();
$user = $ctrlUsers -> getUserById($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel='stylesheet' href='../styles.css'> 
</head>
<body>
<div>
        <div class='wrapper fadeInDown'>
            <div id='formContent'>
                    <img class='profile_image' src='<?php echo $user->getAvatar() ?>' >
                    <p class='flex_p'><b>Usuari:</b><?php echo $user->getUsername() ?></p>
                    <p class='flex_p'><b>Correu:</b><?php echo $user->getMail() ?></p>
            </div>
        </div>
    </div>

</body>
</html>