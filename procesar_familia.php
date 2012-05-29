<?php
	include ("clase_familia.php");
	include_once ("clase_bd.php");

	$familia=new familia();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $familia->ID=$_GET["ID"];
			 $familia->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($familia);
		}
		 else
		{
			$bd->actualizar($familia);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$familia->ID=$_GET["ID"];
		$bd->borrar($familia);
	 }
	 header('Location: index.php?cuerpo=rejilla_familia.php');
?>