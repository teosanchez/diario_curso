<?php
	include ("clase_especialidad.php");
	include_once ("clase_bd.php");

        $mensaje_error="";
	$especialidad=new especialidad();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $especialidad->ID=$_GET["ID"];
			 $especialidad->ID_FAMILIA=$_GET["ID_FAMILIA"];
			 $especialidad->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($especialidad);
		}
		 else
		{
			$bd->actualizar($especialidad);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$especialidad->ID=$_GET["ID"];
		try
                {
                    $bd->borrar($especialidad);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar una especialidad asociada a un curso.";
                }
	 }
	 header('Location: index.php?cuerpo=rejilla_especialidad.php&mensaje_error='.$mensaje_error);
?>