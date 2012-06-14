<?php
	include ("clase_direccion.php");
	include_once ("clase_bd.php");

        $mensaje_error="";
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
		try
                {
                    $bd->borrar($direccion);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar una direccion que tiene datos asociados";
                } 
	 }
         print_r($_GET);
	 header('Location: index.php?cuerpo=rejilla_direccion.php&mensaje_error='.$mensaje_error);
?>