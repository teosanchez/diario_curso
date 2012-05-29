<?php

include ("clase_bd.php");
include ("utilidadesIU.php");
$bd = new bd();
$util = new utilidadesIU();

$datosLista = $bd->consultar("select NOMBRE,ID from municipio where ID_PROVINCIA='" . $_POST['ID_PROVINCIA'] . "'");
echo $util->pinta_selection($datosLista, "Municipios", "NOMBRE");
?>
        

