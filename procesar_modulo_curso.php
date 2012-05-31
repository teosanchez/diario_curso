<?php
	include ("clase_modulo_curso.php");
	include_once ("clase_bd.php");
        print_r($_GET);
	$modulo_curso=new modulo_curso();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
            if(isset($_GET["ID"]))
            {
                $modulo_curso->ID=$_GET["ID"];
                $modulo_curso->ID_MODULO=$_GET["ID_MODULO"];
                $modulo_curso->ID_CURSO=$_GET["ID_CURSO"];
                $modulo_curso->HORAS=$_GET["HORAS"];
                $modulo_curso->DESCRIPCION=$_GET["DESCRIPCION"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($modulo_curso);
		}
		 else
		{
			$bd->actualizar($modulo_curso);
		}
            }
	}
	if(isset($_GET["Borrar"])) 
	{
            if(isset($_GET["ID"]))
            {
                $modulo_curso->ID=$_GET["ID"];
                $arrayEntidad = $bd->buscar($modulo_curso);
                if ($arrayEntidad) 
                {
                    $modulo_curso->cargar($arrayEntidad[0]);
                }
                
                $bd->borrar($modulo_curso);
            }
	}
        if (isset($_GET["Cancelar"]))
        {
            if (isset($_GET["ID_CURSO"])) 
            {
                $modulo_curso->ID_CURSO = $_GET["ID_CURSO"];
            }
        }

        header('Location: index.php?cuerpo=rejilla_modulo_curso.php&ID='.$modulo_curso->ID_CURSO);
        
                
?>