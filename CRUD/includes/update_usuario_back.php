<?php

include("conexion.php");


$id = $_POST['id_usu'];
$nombre = $_POST['nombre'];
$puesto  = $_POST['puesto'];
$ubicacion = $_POST['ubicacion'];


$sql = "UPDATE usuarios SET nombre='$nombre', puesto='$puesto', ubicacion='$ubicacion' WHERE id_usu='$id'";

echo mysqli_query($enlace, $sql);
$enlace->close();

?>