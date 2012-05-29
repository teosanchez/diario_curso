<?php
	include ("clase_profesor.php");
	include_once ("clase_bd.php");
        include ("clase_direccion.php");


        
	$profesor=new profesor();
	$bd=new bd();
        $direccion=new direccion();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $profesor->ID=$_GET["ID"];
			 $profesor->ID_DIRECCION=$_GET["ID_DIRECCION"];
			 $profesor->NOMBRE=$_GET["NOMBRE"];
			 $profesor->APELLIDOS=$_GET["APELLIDOS"];
			 $profesor->DNI=$_GET["DNI"];
			 $profesor->TELEFONO=$_GET["TELEFONO"];
                         
                         $direccion->ID_MUNICIPIO=$_GET["Municipios"];
                         $direccion->CALLE=$_GET["CALLE"];
                         $direccion->NUMERO=$_GET["NUMERO"];
		if($_GET["ID"]=="")
                 {
                     if (isset($_GET["Municipios"])&&($_GET["Municipios"]<>0))
                     {       
                        $profesor->ID_DIRECCION=$bd->insertar($direccion);
                        if (isset($_GET["ID_DIRECCION"]))
                        {       
                            $bd->insertar($profesor);
                        }
                     }
                 }
                 else
                 {
                    if(isset($_GET["ID_DIRECCION"]))
                    {
                        if (isset($_GET["Municipios"])&&($_GET["Municipios"]<>0))
                        {       
                            $profesor->ID_DIRECCION=$bd->insertar($direccion);
                        }
                        else
                        {
                            $direccion->ID=$_GET["ID_DIRECCION"];
                            $bd->actualizar($direccion);
                        }
                    }
                    $bd->actualizar($profesor);
                 }
                }
	}
	if(isset($_GET["Borrar"])) 
		{
		$profesor->ID=$_GET["ID"];
		$bd->borrar($profesor);
	 }
         header('Location: index.php?cuerpo=rejilla_profesor.php');
?>