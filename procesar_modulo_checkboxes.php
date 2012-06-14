<?php

include ("clase_modulo_curso.php");
include_once ("clase_bd.php");
print_r($_GET);
$bd = new bd();
$modulo_curso = new modulo_curso();
$c="";
if (isset($_GET["c"])&&($_GET["c"]<>""))
{
    $c="nuevo"; // Se viene de form_curso con un curso nuevo (sin módulos)
}

if (isset($_GET["origen"]))
{
    $origen = $_GET["origen"];
}

if (isset($_GET["Enviar"])) 
{
    if (isset($_GET["ID_CURSO"])) 
    {
        $modulo_curso->ID_CURSO = $_GET["ID_CURSO"];
        $bd->consultar("delete from modulo_curso where ID_CURSO='" . $modulo_curso->ID_CURSO . "'");

        if (isset($_GET["Modulos_Seleccionados"])) 
        {
            $Modulos_Seleccionados = $_GET["Modulos_Seleccionados"];

            $num_modulos = count($Modulos_Seleccionados);
            echo ("num_modulos: " . $num_modulos);
            for ($i = 0; $i < $num_modulos; $i++) 
            {
                $modulo_curso->ID_MODULO = $Modulos_Seleccionados[$i];
                $bd->insertar($modulo_curso);
                //$msj2 = "Registro Insertado Correctamete."; //Incluir en Generador
            }
        }
        
        header('Location: index.php?cuerpo=rejilla_modulo_curso.php&ID='.$modulo_curso->ID_CURSO.'&origen=form_curso.php'); //Incluir en Generador
    }
}
if (isset($_GET["Cancelar"]))
{
    
    if (isset($_GET["ID_CURSO"])) 
    {
        $modulo_curso->ID_CURSO = $_GET["ID_CURSO"];
        if ($c=="nuevo")
        {
            header('Location: index.php?cuerpo=form_curso.php&ID='.$modulo_curso->ID_CURSO);             
        }
        else
        {
            header('Location: index.php?cuerpo=rejilla_modulo_curso.php&ID='.$modulo_curso->ID_CURSO.'&origen=form_curso.php'); 
        }
    }
}
   

?>
