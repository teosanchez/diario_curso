<?php

include ("clase_modulo_curso.php");
include_once ("clase_bd.php");
print_r($_GET);
$bd = new bd();
$modulo_curso = new modulo_curso();
if (isset($_GET["Enviar"])) 
{
    if (isset($_GET["ID"])) 
    {
        $modulo_curso->ID_CURSO = $_GET["ID"];
        $arrayEntidad = $bd->buscar($modulo_curso);
        if ($arrayEntidad) 
        {
            //$modulo_curso->cargar($arrayEntidad[0]);
            $bd->consultar("delete from modulo_curso where ID_CURSO='" . $modulo_curso->ID_CURSO . "'");
            //$msj2 = "Registro Eliminado Correctamente."; //Incluir en Generador

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
        }
        header('Location: index.php?cuerpo=form_modulo_curso.php&ID='.$modulo_curso->ID); //Incluir en Generador
    }
}
if (isset($_GET["Cancelar"]))
{
    if (isset($_GET["ID_MODULO_CURSO"])) 
    {
        $modulo_curso->ID = $_GET["ID_MODULO_CURSO"];
        header('Location: index.php?cuerpo=form_modulo_curso.php&ID='.$modulo_curso->ID); //Incluir en Generador
    }
}
   

?>