<?php

include ("clase_bd.php");
include ("utilidadesIU.php");
$bd = new bd();
$util = new utilidadesIU();

$datosLista = $bd->consultar("select NOMBRE,ID from especialidad where ID_FAMILIA='" . $_POST['ID_FAMILIA'] . "'");
echo $util->pinta_selection($datosLista, "Especialidades", "NOMBRE");
?>
        

