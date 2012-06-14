<?php
    include ("clase_bd.php");
    $bd = new bd();

    include ("clase_rejilla_xx.php");
	
    //header( 'Content-type: text/html; charset=iso-8859-1' );
    $result = $bd->consultarArray("select ID,`M&oacute;dulo`,Horas 
                    from vw_modulo_curso_2
                    where ID_CURSO ='" . $_POST["ID_CURSO"]. "'");
    if ($result)
    {
    $rejilla = new rejilla_xx($result, "index.php?cuerpo=form_modulo_curso.php&", "ID", "ESPECIALIDAD","",ADMINISTRADOR);
    echo $rejilla->pintar();
    }

?>