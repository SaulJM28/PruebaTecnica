<?php

include("conexion.php");


$id = $_POST['id_usu'];

$sql = "DELETE FROM usuarios WHERE id_usu='$id'";

echo mysqli_query($enlace, $sql);
$enlace->close();

?>