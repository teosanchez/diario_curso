<?php

include ("clase_diario.php");
include ("clase_check_marcado.php");
include_once ("clase_bd.php");

$diario = new diario();
$check_marcado = new check_marcados();
$bd = new bd();
if (isset($_POST["Enviar"])) 
{
    if (isset($_POST["ID"])) 
    {
        $diario->ID = $_POST["ID"];
        if (isset($_POST["ID_PROFESOR_CURSO"])) 
        {
            $diario->ID_PROFESOR_CURSO = $_POST["ID_PROFESOR_CURSO"];
        }
    }
    $diario->FECHA = $_POST["FECHA"];
    $diario->ENTRADA = $_POST["ENTRADA"];
    $diario->TITULO = $_POST["TITULO"];
    if ($_POST["ID"] == "" && $_POST["ID_PROFESOR_CURSO"] <> "") 
    {
        $bd->insertar($diario);
    } else 
    {
        $bd->actualizar($diario);
    }
    
        $bd->consultar("delete from check_marcados where ID_DIARIO='" . $diario->ID . "'");

        if (isset($_POST["Checks_Seleccionados"])) 
        {
            $Checks_Seleccionados = $_POST["Checks_Seleccionados"];

            $num_checks = count($Checks_Seleccionados);
            for ($i = 0; $i < $num_checks; $i++) 
            {
                $check_marcado->ID_CHECK = $Checks_Seleccionados[$i];
                $check_marcado->ID_DIARIO = $diario->ID;
                $bd->insertar($check_marcado);
            }
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