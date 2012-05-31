<?php
    include ("clase_curso.php");
    include_once ("clase_bd.php");

    $curso=new curso();
    $bd=new bd();

    if(isset($_GET["Enviar"]) || isset($_GET["Programa_del_curso"])) 
    {
        if(isset($_GET["ID"]))
        {
             $curso->ID=$_GET["ID"];
             $curso->ID_ESPECIALIDAD=$_GET["Especialidades"];
             $curso->ID_NIVEL_ESTUDIOS=$_GET["NIVEL_ESTUDIOS"];
             $curso->HORAS=$_GET["HORAS"];
             $curso->FECHA_INICIO=date("Y-m-d",strtotime($_GET["FECHA_INICIO"]));
             $curso->FECHA_FIN=date("Y-m-d",strtotime($_GET["FECHA_FIN"]));
             $curso->HORA_INICIO=date("H:i",strtotime($_GET["HORA_INICIO"]));
             $curso->HORA_FIN=date("H:i",strtotime($_GET["HORA_FIN"]));
            if($_GET["ID"]=="")
            {
                if (isset($_GET["Familias"]) && isset($_GET["Especialidades"]) && isset($_GET["NIVEL_ESTUDIOS"]))
                {       
                    $bd->insertar($curso);
                }
            }
             else
            {
                    $bd->actualizar($curso);
            }
        }
    }
    if(isset($_GET["Borrar"])) 
    {
            $curso->ID=$_GET["ID"];
            $bd->borrar($curso);
    }
    if (isset($_GET["Borrar"]) || isset($_GET["Enviar"]))
    {
        header('Location: index.php?cuerpo=rejilla_curso.php');
    }
    else
    {
        if (isset($_GET["Programa_del_curso"]))
        {
            header('Location: index.php?cuerpo=rejilla_modulo_curso.php&ID='.$curso->ID);
        }
    }
?>