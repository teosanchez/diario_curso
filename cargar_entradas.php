<?php
echo ("hola");
echo ("id_curso: ".$_POST["ID_CURSO"]);
    include ("clase_bd.php");
    include ("utilidadesIU.php");
    $bd = new bd();
    $util = new utilidadesIU();
    
    header( 'Content-type: text/html; charset=iso-8859-1' );
    
    $diario = $bd->consultar("select * from vw_diario_profesor_curso 
        where ID_PROFESOR_CURSO ='" . $_POST["ID_CURSO"] . "'");

    if ($diario) {
        echo $util->pinta_entradas($diario,$_POST["ID_GRUPO"]);
    }
?>