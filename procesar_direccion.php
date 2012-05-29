<?php
	include ("clase_direccion.php");
	include_once ("clase_bd.php");

	$direccion=new direccion();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $direccion->ID=$_GET["ID"];
			 $direccion->ID_MUNICIPIO=$_GET["Municipios"];
			 $direccion->CALLE=$_GET["CALLE"];
			 $direccion->NUMERO=$_GET["NUMERO"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($direccion);
		}
		 else
		{
			$bd->actualizar($direccion);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$direccion->ID=$_GET["ID"];
		$bd->borrar($direccion);
	 }
         print_r($_GET);
	 header('Location: index.php?cuerpo=rejilla_direccion.php');
?>