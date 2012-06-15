<?php
	include ("clase_nacionalidad.php");
	include_once ("clase_bd.php");

        $mensaje_error="";
	$nacionalidad=new nacionalidad();
	$bd=new bd();
	
        /*if(isset($_GET["Enviar"])) 
	{*/
	 if(isset($_GET["ID"],$_GET["NOMBRE"]))
		{
			 $nacionalidad->ID=$_GET["ID"];
			 $nacionalidad->NOMBRE=$_GET["NOMBRE"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($nacionalidad);
		}
		 else
		{
			$bd->actualizar($nacionalidad);
		}
	}
	//}
	if(isset($_GET["Borrar"])) 
		{
		$nacionalidad->ID=$_GET["ID"];
		try
                {
                    $bd->borrar($nacionalidad);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar una nacionalidad asociada a un alumno";
                }
	 }
	 header('Location: index.php?cuerpo=rejilla_nacionalidad.php&mensaje_error='.$mensaje_error);
?>