<?php 

$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$edad = $_POST['Edad'];
/*echo "El nombre es ".$nombre." la edad es ".$edad. " y el DNI es".$DNI;*/
$servidor = "localhost";
$usuario="root";
$password="usbw";
$bd="daw2";

$con=mysqli_connect($servidor, $usuario, $password, $bd);

if (!$con) {
    die(" No se a podido realizar la conexion_".mysqli_connect_error()."<br>");
}
else {
    mysqli_set_charset($con,"utf8");
    echo " Se ha establecido la conexion correctamente a la base de datos ";

    $sql="INSERT INTO `alumnos`(`ID`, `Nombre`, `Apellidos`, `Edad`) VALUES (NULL,'".$nombre."','".$apellidos."',".$edad.")";
    
    $consulta=mysqli_query($con,$sql);
    
    if (!$consulta) {
        die(" No se a podido realizar el insert ");
    }
    else {
        echo " El insert se a realizado correctamente ";
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=0, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table>
    <?php
        $sql2="SELECT * FROM `alumnos` WHERE 1"; 
        $consulta=mysqli_query($con,$sql2);
        while ($fila=$consulta->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$fila["ID"]."</td>";
            echo "<td>".$fila["Nombre"]."</td>";
            echo "<td>".$fila["Apellidos"]."</td>";
            echo "<td>".$fila["Edad"]."</td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>
<?php
    }
?>