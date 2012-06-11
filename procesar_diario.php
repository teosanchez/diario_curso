<?php

include ("clase_diario.php");
include_once ("clase_bd.php");

$diario = new diario();
$bd = new bd();
if (isset($_GET["Enviar"])) {
    if (isset($_GET["ID"])) {
        $diario->ID = $_GET["ID"];
        if (isset($_GET["ID_PROFESOR_CURSO"])) {
            $diario->ID_PROFESOR_CURSO = $_GET["ID_PROFESOR_CURSO"];
        }
    }
    $diario->FECHA = $_GET["FECHA"];
    $diario->ENTRADA = $_GET["ENTRADA"];
    $diario->TITULO = $_GET["TITULO"];
    if ($_GET["ID"] == "" && $_GET["ID_PROFESOR_CURSO"] <> "") {
        $bd->insertar($diario);
    } else {
        $bd->actualizar($diario);
    }
}

if (isset($_GET["Borrar"])) {
    if (isset($_GET["ID_PROFESOR_CURSO"])) {
        $diario->ID_PROFESOR_CURSO = $_GET["ID_PROFESOR_CURSO"];
    }

    $diario->ID = $_GET["ID"];
    $bd->borrar($diario);
}
header('Location: index.php?cuerpo=rejilla_diario.php&ID_PROFESOR_CURSO=' . $diario->ID_PROFESOR_CURSO);
?>