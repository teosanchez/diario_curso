<?php
	include ("clase_modulo.php");
	include_once ("clase_bd.php");

	$modulo=new modulo();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $modulo->ID=$_GET["ID"];
			 $modulo->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($modulo);
		}
		 else
		{
			$bd->actualizar($modulo);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$modulo->ID=$_GET["ID"];
		$bd->borrar($modulo);
	 }
	 header('Location: index.php?cuerpo=rejilla_modulo.php');
?>