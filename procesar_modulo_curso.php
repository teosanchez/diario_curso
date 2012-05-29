<?php
	include ("clase_modulo_curso.php");
	include_once ("clase_bd.php");
        //print_r($_GET);
	$modulo_curso=new modulo_curso();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
            if(isset($_GET["ID"]))
            {
                $modulo_curso->ID=$_GET["ID"];
                //$modulo_curso->ID_MODULO=$_GET["ID_MODULO"];
                $modulo_curso->ID_CURSO=$_GET["ID_ESPECIALIDAD"];
                $modulo_curso->HORAS=$_GET["HORAS"];
                $modulo_curso->DESCRIPCION=$_GET["DESCRIPCION"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($modulo_curso);
		}
		 else
		{
			$bd->actualizar($modulo_curso);
		}
            }
	}
	if(isset($_GET["Borrar"])) 
	{
            if(isset($_GET["ID"]))
            {
                $modulo_curso->ID=$_GET["ID"];
                $bd->borrar($modulo_curso);
            }
	}
        if (isset($_GET["Seleccionar_Modulos"]))
        {
            header('Location: index.php?cuerpo=modulo_checkboxes.php&ID='.$_GET["ID_ESPECIALIDAD"].'&ID_MODULO_CURSO='.$_GET["ID"]);
        }
        else 
        {
            header('Location: index.php?cuerpo=rejilla_modulo_curso.php');
        }
                
?>