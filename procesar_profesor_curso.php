<?php

include ("clase_profesor_curso.php");
include_once ("clase_bd.php");

$profesor_curso = new profesor_curso();
$bd = new bd();
$c="";
if (isset($_GET["c"])and ($_GET["c"])!="")
{
    $c="nuevo"; // Se viene de form_curso con un curso nuevo (sin módulos)
}

if (isset($_GET["origen"]))
{
    $origen = $_GET["origen"];
}

if (isset($_GET["Enviar"])) 
    {
    if (isset($_GET["ID"]))
        {
        $profesor_curso->ID = $_GET["ID"];
        $profesor_curso->ID_PROFESOR = $_GET["ID_PROFESOR"];
        $profesor_curso->ID_CURSO = $_GET["ID_CURSO"];
        $profesor_curso->FECHA_ALTA = date("Y-m-d", strtotime($_GET["FECHA_ALTA"]));
        $profesor_curso->FECHA_BAJA = date("Y-m-d", strtotime($_GET["FECHA_BAJA"]));
        if ($_GET["ID"] == "") 
            {
            $bd->insertar($profesor_curso);
            } 
        else 
            {
            $bd->actualizar($profesor_curso);
            }
        header('Location: index.php?cuerpo=rejilla_profesor_curso.php&ID='.$profesor_curso->ID_CURSO.'&origen='.$origen);
        }
    }
if (isset($_GET["Borrar"])) {
    $profesor_curso->ID = $_GET["ID"];
    $arrayEntidad = $bd->buscar($profesor_curso);
    if ($arrayEntidad) 
    {
        $profesor_curso->cargar($arrayEntidad[0]);
    }
    $bd->borrar($profesor_curso);
    header('Location: index.php?cuerpo=rejilla_profesor_curso.php&ID='.$profesor_curso->ID_CURSO.'&origen='.$origen);
}

if (isset($_GET["Cancelar"]))
        {
            if (isset($_GET["ID_CURSO"])) 
            {
                $profesor_curso->ID_CURSO = $_GET["ID_CURSO"];
            }
            if ($c=="nuevo")
            {
                header('Location: index.php?cuerpo=form_curso.php&ID='.$profesor_curso->ID_CURSO); //Incluir en Generador            
            }
            else
            {
                header('Location: index.php?cuerpo=rejilla_profesor_curso.php&ID='.$profesor_curso->ID_CURSO.'&origen='.$origen); //Incluir en Generador
            }
        }

?>