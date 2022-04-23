<?php

if($_POST){
    include("conexion.php");


    if(!empty($_POST['id_usu'])){

        $arrUsuarios = array();
            $intId = intval($_POST['id_usu']);
            $query_select = mysqli_query($enlace, "SELECT * FROM usuarios WHERE id_usu = $intId");
            $num_rows = mysqli_num_rows($query_select);
            if($num_rows > 0){
                $arrUsuarios = mysqli_fetch_assoc($query_select);
                $json = json_encode($arrUsuarios, JSON_UNESCAPED_UNICODE);
                echo $json;
            }else {
                echo "noData";
            }
            exit;
    }
}
?>

