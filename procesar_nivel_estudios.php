<?php
	include ("clase_nivel_estudios.php");
	include_once ("clase_bd.php");

        $mensaje_error="";
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
		try
                {
                    $bd->borrar($nivel_estudios);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar un nivel de estudios asociado a un alumno";
                }
	 }
	 header('Location: index.php?cuerpo=rejilla_nivel_estudios.php&mensaje_error='.$mensaje_error);
?>