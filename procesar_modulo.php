<?php
	include ("clase_modulo.php");
	include_once ("clase_bd.php");

        $mensaje_error="";
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
		try
                {
                    $bd->borrar($modulo);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar un modulo asociado a un modulo de curso";
                } 
	 }
	 header('Location: index.php?cuerpo=rejilla_modulo.php&mensaje_error='.$mensaje_error);
?>