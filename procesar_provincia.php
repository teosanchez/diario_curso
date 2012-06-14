<?php
	include ("clase_provincia.php");
	include_once ("clase_bd.php");

        $mensaje_error="";
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
		try
                {
                    $bd->borrar($provincia);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar una provincia asociada a un municipio";
                }
	 }
	 header('Location: index.php?cuerpo=rejilla_provincia.php&mensaje_error='.$mensaje_error);
?>