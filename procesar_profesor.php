<?php
	include ("clase_profesor.php");
	include_once ("clase_bd.php");
        include ("clase_direccion.php");        
      
        $mensaje_error="";
	$profesor=new profesor();
	$bd=new bd();
        $direccion=new direccion();
        
	/*if(isset($_GET["Enviar"])) 
	{*/
	 if(isset($_GET["ID"],$_GET["ID_DIRECCION"],$_GET["NOMBRE"],$_GET["APELLIDOS"],$_GET["DNI"],$_GET["TELEFONO"],$_GET["EMAIL"],$_GET["Municipios"],$_GET["CALLE"],$_GET["NUMERO"],$_GET["username"],$_GET["password"]))
		{
			 $profesor->ID=$_GET["ID"];
			 $profesor->ID_DIRECCION=$_GET["ID_DIRECCION"];
			 $profesor->NOMBRE=$_GET["NOMBRE"];
			 $profesor->APELLIDOS=$_GET["APELLIDOS"];
			 $profesor->DNI=$_GET["DNI"];
			 $profesor->TELEFONO=$_GET["TELEFONO"];
                         $profesor->EMAIL=$_GET["EMAIL"];
                         
                         $direccion->ID_MUNICIPIO=$_GET["Municipios"];
                         $direccion->CALLE=$_GET["CALLE"];
                         $direccion->NUMERO=$_GET["NUMERO"];
                         
                         include ("userCake/models/funcs.general.php");
                         $username=$_GET["username"];
                         $password=generateHash($_GET["password"]);                          
                         
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
							'".$profesor->EMAIL."',							
							'".time()."',
							'0',
							'1',
							'".PROFESOR."',
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
                            $profesor->ID_DIRECCION=$bd->insertar($direccion);
                        }
                        else
                        {
                            $direccion->ID=$_GET["ID_DIRECCION"];
                            $bd->actualizar($direccion);
                        }
                    }
                    $bd->actualizar($profesor);
                    $datos=$bd->consultar("select Email from users where User_ID='".$_GET["User_ID"]."'");
                    while ($fila = mysql_fetch_array($datos)) 
                        {
                            $email=$fila["Email"];       //email en base de datos de usuario                   
                        }
                    $sql= "UPDATE `users` SET `Username`='".$username."',`Username_Clean`='".$username."',`Email`='".$profesor->EMAIL."'where Email='".$email."'";
                    $bd->consultar($sql);
                 }
                //}
	}
	if(isset($_GET["Borrar"])) 
		{
		$profesor->ID=$_GET["ID"];
                $datos=$bd->consultar("select EMAIL from profesor where ID='".$profesor->ID."'");
                while ($fila = mysql_fetch_array($datos)) 
                            {
                            $email=$fila["EMAIL"];                        
                            }        
                            
                if(isset($email))
                    {
                    $delete="delete from users where Email='" . $email . "'";
                    $bd->consultar($delete);
                    }
		try
                {
                    $bd->borrar($profesor);       
                }
                catch(Exception $e)
                {
                    $mensaje_error="No se puede eliminar un profesor que tiene datos asociados";
                }                
	 }
         header('Location: index.php?cuerpo=rejilla_profesor.php&mensaje_error='.$mensaje_error);
?>