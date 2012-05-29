<?php
	include ("clase_provincia.php");
	include_once ("clase_bd.php");

	$provincia=new provincia();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $provincia->ID=$_GET["ID"];
			 $provincia->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($provincia);
		}
		 else
		{
			$bd->actualizar($provincia);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$provincia->ID=$_GET["ID"];
		$bd->borrar($provincia);
	 }
	 header('Location: index.php?cuerpo=rejilla_provincia.php');
?>