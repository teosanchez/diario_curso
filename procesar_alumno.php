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
                 $alumno->ID_SITUACION=$_GET["ID_SITUACION"];
                 $alumno->ID_NACIONALIDAD=$_GET["ID_NACIONALIDAD"];
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
                 
                 include ("userCake/models/funcs.general.php");
                 $username=$_GET["username"];
                 $password=  generateHash($_GET["password"]);                                  
                 
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
                     $sql = "INSERT INTO `Users` (	`Username`,
							`Username_Clean`,
							`Password`,
							`Email`,							
							`LastActivationRequest`,
							`LostPasswordRequest`, 
							`Active`,
							`Group_ID`,
							`SignUpDate`,
							`LastSignIn`
							)
					 		VALUES (
							'".$username."',
							'".$username."',
							'".$password."',
							'".$alumno->EMAIL."',							
							'".time()."',
							'0',
							'1',
							'".ALUMNO."',
							'".time()."',
							'0'
							)";
                   $bd->consultar($sql);  
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
                    $datos=$bd->consultar("select Email from users where User_ID='".$_GET["User_ID"]."'");
                    while ($fila = mysql_fetch_array($datos)) 
                        {
                        $email=$fila["Email"];  //email en base de datos de usuario                      
                        }
                    $sql= "UPDATE `users` SET `Username`='".$username."',`Username_Clean`='".$username."',`Email`='".$alumno->EMAIL."'where Email='".$email."'";
                    $bd->consultar($sql);
                }
            }
	}
        
	if(isset($_GET["Borrar"])) 
	{
            $alumno->ID=$_GET["ID"];
            
            $datos=$bd->consultar("select EMAIL from alumno where ID='".$alumno->ID."'");
            while ($fila = mysql_fetch_array($datos)) 
                        {
                        $email=$fila["EMAIL"];                        
                        }                                
           
            if(isset($email))
                {
                $delete="delete from users where Email='" . $email . "'";
                $bd->consultar($delete);
                } 
                
            $bd->borrar($alumno);
            if (isset($_GET["ID_DIRECCION"]))
            {
                $direccion->ID=$_GET["ID_DIRECCION"];
                $bd->borrar($direccion);
            }
	}
	header('Location: index.php?cuerpo=rejilla_alumno.php');
?>