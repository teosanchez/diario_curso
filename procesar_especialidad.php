<?php
	include ("clase_especialidad.php");
	include_once ("clase_bd.php");

	$especialidad=new especialidad();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $especialidad->ID=$_GET["ID"];
			 $especialidad->ID_FAMILIA=$_GET["ID_FAMILIA"];
			 $especialidad->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($especialidad);
		}
		 else
		{
			$bd->actualizar($especialidad);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$especialidad->ID=$_GET["ID"];
		$bd->borrar($especialidad);
	 }
	 header('Location: index.php?cuerpo=rejilla_especialidad.php');
?>