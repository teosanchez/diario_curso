<?php

    include ("clase_bd.php");
    include ("clase_rejilla_alumno_curso.php");
    $bd = new bd();

    header( 'Content-type: text/html; charset=iso-8859-1' );
    
    $result = $bd->consultarArray("select ID,Alumno,`Fecha de Alta`,`Fecha de Baja`,Suplente
                            from vw_nombre_alumno_nombre_especialidad 
                            where ID_CURSO ='" . $_POST["ID_CURSO"] . "'");

    if ($result) 
    {
        $rejilla = new rejilla_alumno_curso($result, "index.php?cuerpo=form_alumno_curso.php&", "ID", "Alumno","app_inicio.php",$_POST["ID_GRUPO"]);
        echo $rejilla->pintar();
    }
?>   
