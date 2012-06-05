<?php
	include ("clase_alumno.php");
	include_once ("clase_bd.php");
        include ("clase_direccion.php");
        print_r($_GET);
	$alumno=new alumno();
        $direccion=new direccion();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
            
            if(isset($_GET["ID"]))
            {
                 $alumno->ID=$_GET["ID"];
                 if($_GET["ID_SITUACION"]!=0)
                 {
                 $alumno->ID_SITUACION=$_GET["ID_SITUACION"];
                 }
                 if($_GET["ID_NACIONALIDAD"]!=0)
                 {
                 $alumno->ID_NACIONALIDAD=$_GET["ID_NACIONALIDAD"];
                 }
                 $alumno->ID_NIVEL_ESTUDIOS=$_GET["ID_NIVEL_ESTUDIOS"];
                 $alumno->ID_DIRECCION=$_GET["ID_DIRECCION"];
                 $alumno->NOMBRE=$_GET["NOMBRE"];
                 $alumno->APELLIDOS=$_GET["APELLIDOS"];                               
                 
                 $alumno->FECHA_NACIMIENTO=date("Y-m-d",strtotime($_GET["FECHA_NACIMIENTO"]));
                 
                 $alumno->SEXO=$_GET["SEXO"];
                 $alumno->DNI=$_GET["DNI"];
                 $alumno->TELEFONO=$_GET["TELEFONO"];
                 $alumno->EMAIL=$_GET["EMAIL"];
                 
                 $direccion->ID_MUNICIPIO=$_GET["Municipios"];
                 $direccion->CALLE=$_GET["CALLE"];
                 $direccion->NUMERO=$_GET["NUMERO"];
                 
                 if($_GET["ID"]=="")
                 {
                     if (isset($_GET["Municipios"])&&($_GET["Municipios"]<>0))
                     {       
                        $alumno->ID_DIRECCION=$bd->insertar($direccion);
                        if (isset($_GET["ID_SITUACION"])&&isset($_GET["ID_NACIONALIDAD"])&&isset($_GET["ID_NIVEL_ESTUDIOS"])&&isset($_GET["ID_DIRECCION"]))
                        {       
                            $bd->insertar($alumno);
                        }
                     }
                 }
                 else
                 {
                    if(isset($_GET["ID_DIRECCION"]))
                    {
                        if (isset($_GET["Municipios"])&&($_GET["Municipios"]<>0))
                        {       
                            $alumno->ID_DIRECCION=$bd->insertar($direccion);
                        }
                        else
                        {
                            $direccion->ID=$_GET["ID_DIRECCION"];
                            $bd->actualizar($direccion);
                        }
                    }
                    $bd->actualizar($alumno);
                 }
            }
	}
        
	if(isset($_GET["Borrar"])) 
	{
            $alumno->ID=$_GET["ID"];
            $bd->borrar($alumno);
            if (isset($_GET["ID_DIRECCION"]))
            {
                $direccion->ID=$_GET["ID_DIRECCION"];
                $bd->borrar($direccion);
            }

	}
        
	header('Location: index.php?cuerpo=rejilla_alumno.php');
?>