<?php

    include ("clase_bd.php");
    include ("clase_rejilla_xx.php");
    $bd = new bd();

    header( 'Content-type: text/html; charset=iso-8859-1' );
    
    $result = $bd->consultarArray("select ID,Profesor,`Tel&eacute;fono`,`Fecha Alta`,`Fecha Baja` 
                from vw_nombre_profesor_curso_especialidad 
                where ID_CURSO ='" . $_POST["ID_CURSO"] . "'");

    if ($result)
    {
        $rejilla = new rejilla_xx($result, "index.php?cuerpo=form_profesor_curso.php&", "ID", "Profesor","app_inicio.php",$_POST["ID_GRUPO"]);
        echo $rejilla->pintar();
    }
    
?>