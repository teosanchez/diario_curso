<?php
	include ("clase_municipio.php");
	include_once ("clase_bd.php");

	$municipio=new municipio();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $municipio->ID=$_GET["ID"];
			 $municipio->ID_PROVINCIA=$_GET["ID_PROVINCIA"];
			 $municipio->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($municipio);
		}
		 else
		{
			$bd->actualizar($municipio);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$municipio->ID=$_GET["ID"];
		$bd->borrar($municipio);
	 }
         
	 header('Location: index.php?cuerpo=rejilla_municipio.php');
?>