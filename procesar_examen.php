<?php
	include ("clase_examen.php");
	include_once ("clase_bd.php");

	$examen=new examen();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $examen->ID=$_GET["ID"];
			 $examen->ID_CURSO=$_GET["ID_CURSO"];
			 $examen->ID_PROFESOR=$_GET["ID_PROFESOR"];
			 $examen->ID_ALUMNO=$_GET["ID_ALUMNO"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($examen);
		}
		 else
		{
			$bd->actualizar($examen);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$examen->ID=$_GET["ID"];
		$bd->borrar($examen);
	 }
	 header('Location: index.php?cuerpo=rejilla_examen.php');
?>