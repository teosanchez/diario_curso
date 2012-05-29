<?php
	include ("clase_situacion_laboral.php");
	include_once ("clase_bd.php");

	$situacion_laboral=new situacion_laboral();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $situacion_laboral->ID=$_GET["ID"];
			 $situacion_laboral->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($situacion_laboral);
		}
		 else
		{
			$bd->actualizar($situacion_laboral);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$situacion_laboral->ID=$_GET["ID"];
		$bd->borrar($situacion_laboral);
	 }
	 header('Location: index.php?cuerpo=rejilla_situacion_laboral.php');
?>