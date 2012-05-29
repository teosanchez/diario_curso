<?php
	include ("clase_nivel_estudios.php");
	include_once ("clase_bd.php");

	$nivel_estudios=new nivel_estudios();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $nivel_estudios->ID=$_GET["ID"];
			 $nivel_estudios->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($nivel_estudios);
		}
		 else
		{
			$bd->actualizar($nivel_estudios);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$nivel_estudios->ID=$_GET["ID"];
		$bd->borrar($nivel_estudios);
	 }
	 header('Location: index.php?cuerpo=rejilla_nivel_estudios.php');
?>