<?php

include("conexion.php");
    
    $nombre = $_POST['nombre'];
    $puesto  = $_POST['puesto'];
    $ubicacion = $_POST['ubicacion'];

    $sql = "INSERT INTO  USUARIOS (id_usu, nombre, puesto, ubicacion) VALUES ('','$nombre', '$puesto', '$ubicacion')";

    echo mysqli_query($enlace,$sql);
    $enlace->close();
?>

