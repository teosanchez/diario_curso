<?php

include ("clase_alumno_curso.php");
include_once ("clase_bd.php");

$alumno_curso = new alumno_curso();
$bd = new bd();

$c="";
if (isset($_GET["c"])&&($_GET["c"]<>""))
{
    $c="nuevo"; // Se viene de form_curso con un curso nuevo (sin alumnos)
}

if (isset($_GET["origen"]))
{
    $origen = $_GET["origen"];
}

if (isset($_GET["Enviar"])) 
{
    if (isset($_GET["ID"])) 
    {
        $alumno_curso->ID = $_GET["ID"];
        $alumno_curso->ID_ALUMNO = $_GET["ID_ALUMNO"];
        $alumno_curso->ID_CURSO = $_GET["ID_CURSO"];
        $alumno_curso->FECHA_ALTA = date("Y-m-d",strtotime($_GET["FECHA_ALTA"]));
        $alumno_curso->FECHA_BAJA = date("Y-m-d",strtotime($_GET["FECHA_BAJA"]));
        $alumno_curso->SUPLENTE = $_GET["SUPLENTE"];
        if ($_GET["ID"] == "") 
        {
            $bd->insertar($alumno_curso);
        } 
        else 
        {
            $bd->actualizar($alumno_curso);
        }
        header('Location: index.php?cuerpo=rejilla_alumno_curso.php&ID='.$alumno_curso->ID_CURSO.'&origen='.$origen);
    }
}

if (isset($_GET["Borrar"])) 
{
    $alumno_curso->ID = $_GET["ID"];
    $arrayEntidad = $bd->buscar($alumno_curso);
    if ($arrayEntidad) 
    {
        $alumno_curso->cargar($arrayEntidad[0]);
    }
    $bd->borrar($alumno_curso);
    header('Location: index.php?cuerpo=rejilla_alumno_curso.php&ID='.$alumno_curso->ID_CURSO.'&origen='.$origen);
}

if (isset($_GET["Cancelar"])) 
{
    if (isset($_GET["ID_CURSO"])) 
    {
        $alumno_curso->ID_CURSO = $_GET["ID_CURSO"];
    }
    if ($c=="nuevo")
    {
        header('Location: index.php?cuerpo=form_curso.php&ID='.$alumno_curso->ID_CURSO);             
    }
    else
    { 
        header('Location: index.php?cuerpo=rejilla_alumno_curso.php&ID='.$alumno_curso->ID_CURSO.'&origen='.$origen); 
    }
}
?>