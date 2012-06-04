<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");
$bd = new bd();


$result = $bd->consultarArray("select `ID`, `Alumno`, `Situaci&oacute;n Laboral`, `Tel&eacute;fono`, `Email` from vw_rejilla_alumno_situacion_estudios");

?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_alumno.php" />
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Administraci&oacute;n de <span>alumnos</span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nuevo alumno"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
    <!-- Fin Titulo de pÃ¡gina -->

    <?php
    if ($result) {
        $rejilla = new rejilla($result, "index.php?cuerpo=form_alumno.php&", "ID", "APELLIDOS");
        echo $rejilla->pintar();
    }
    ?>

    <input type="submit" name="nuevo" value="Nuevo"/>
</form>