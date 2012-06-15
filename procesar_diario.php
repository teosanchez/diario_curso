<?php

include ("clase_diario.php");
include ("clase_check_marcado.php");
include ("clase_profesor_curso.php");
include_once ("clase_bd.php");

$profesor_curso = new profesor_curso();
$diario = new diario();
$check_marcado = new check_marcados();
$bd = new bd();
$id_curso="";

if (isset($_GET["Enviar"])) 
{
    if (isset($_GET["ID"])) 
    {
        $diario->ID = $_GET["ID"];
        if (isset($_GET["ID_PROFESOR_CURSO"])) 
        {
            $diario->ID_PROFESOR_CURSO = $_GET["ID_PROFESOR_CURSO"];
            
            $profesor_curso->ID = $diario->ID_PROFESOR_CURSO;
            $arrayEntidad = $bd->buscar($profesor_curso);
            if ($arrayEntidad) 
            {
                $profesor_curso->cargar($arrayEntidad[0]);
            }
            $id_curso = $profesor_curso->ID_CURSO;
        }
    }
    $diario->FECHA = $_GET["FECHA"];
    $diario->ENTRADA = $_GET["ENTRADA"];
    $diario->TITULO = $_GET["TITULO"];
    if ($_GET["ID"] == "" && $_GET["ID_PROFESOR_CURSO"] <> "") 
    {
        $diario->ID = $bd->insertar($diario);
    } else 
    {
        $bd->actualizar($diario);
    }
    
        $bd->consultar("delete from check_marcados where ID_DIARIO='" . $diario->ID . "'");

        if (isset($_GET["Checks_Seleccionados"])) 
        {
            $Checks_Seleccionados = $_GET["Checks_Seleccionados"];

            $num_checks = count($Checks_Seleccionados);
            for ($i = 0; $i < $num_checks; $i++) 
            {
                $check_marcado->ID_CHECK = $Checks_Seleccionados[$i];
                $check_marcado->ID_DIARIO = $diario->ID;
                $bd->insertar($check_marcado);
            }
        }

}

if (isset($_GET["Borrar"])) 
{
    if (isset($_GET["ID_PROFESOR_CURSO"])) 
    {
        $diario->ID_PROFESOR_CURSO = $_GET["ID_PROFESOR_CURSO"];
        
        $profesor_curso->ID = $diario->ID_PROFESOR_CURSO;
        $arrayEntidad = $bd->buscar($profesor_curso);
        if ($arrayEntidad) 
        {
            $profesor_curso->cargar($arrayEntidad[0]);
        }
        $id_curso = $profesor_curso->ID_CURSO;
    }

    $diario->ID = $_GET["ID"];
    $bd->borrar($diario);
}
header('Location: index.php?cuerpo=rejilla_diario.php&ID_CURSO=' . $id_curso);
?>