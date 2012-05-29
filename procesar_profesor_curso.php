<?php
	include ("clase_profesor_curso.php");
	include_once ("clase_bd.php");

	$profesor_curso=new profesor_curso();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $profesor_curso->ID=$_GET["ID"];
			 $profesor_curso->ID_PROFESOR=$_GET["ID_PROFESOR"];
			 $profesor_curso->ID_CURSO=$_GET["ID_CURSO"];
			 $profesor_curso->FECHA_ALTA=$_GET["FECHA_ALTA"];
			 $profesor_curso->FECHA_BAJA=$_GET["FECHA_BAJA"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($profesor_curso);
		}
		 else
		{
			$bd->actualizar($profesor_curso);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$profesor_curso->ID=$_GET["ID"];
		$bd->borrar($profesor_curso);
	 }
	 header('Location: index.php?cuerpo=rejilla_profesor_curso.php');
?>