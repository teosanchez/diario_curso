<?php
	include ("clase_alumno_curso.php");
	include_once ("clase_bd.php");

	$alumno_curso=new alumno_curso();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $alumno_curso->ID=$_GET["ID"];
			 $alumno_curso->ID_ALUMNO=$_GET["ID_ALUMNO"];
			 $alumno_curso->ID_CURSO=$_GET["ID_CURSO"];
			 $alumno_curso->FECHA_ALTA=$_GET["FECHA_ALTA"];
			 $alumno_curso->FECHA_BAJA=$_GET["FECHA_BAJA"];
			 $alumno_curso->SUPLENTE=$_GET["SUPLENTE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($alumno_curso);
		}
		 else
		{
			$bd->actualizar($alumno_curso);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$alumno_curso->ID=$_GET["ID"];
		$bd->borrar($alumno_curso);
	 }
	 header('Location: index.php?cuerpo=rejilla_alumno_curso.php');
?>