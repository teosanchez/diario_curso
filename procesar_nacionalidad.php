<?php
	include ("clase_nacionalidad.php");
	include_once ("clase_bd.php");

	$nacionalidad=new nacionalidad();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $nacionalidad->ID=$_GET["ID"];
			 $nacionalidad->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($nacionalidad);
		}
		 else
		{
			$bd->actualizar($nacionalidad);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$nacionalidad->ID=$_GET["ID"];
		$bd->borrar($nacionalidad);
	 }
	 header('Location: index.php?cuerpo=rejilla_nacionalidad.php');
?>