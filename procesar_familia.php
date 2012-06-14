<?php
	include ("clase_familia.php");
	include_once ("clase_bd.php");

        $mensaje_error="";
	$familia=new familia();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $familia->ID=$_GET["ID"];
			 $familia->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($familia);
		}
		 else
		{
			$bd->actualizar($familia);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$familia->ID=$_GET["ID"];
		try
                {
                    $bd->borrar($familia);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar una familia asociada a una especialidad.";
                }
	 }
	 header('Location: index.php?cuerpo=rejilla_familia.php&mensaje_error='.$mensaje_error);
?>