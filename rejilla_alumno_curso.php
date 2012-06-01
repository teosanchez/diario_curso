<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

$bd = new bd();
$result = $bd->consultarArray("select  ID,Alumno,`Fecha de Alta`,`Fecha de Baja`,Suplente
                            from vw_nombre_alumno_nombre_especialidad");
if ($result) {
    ?>
    <!-- Titulo de pagina -->
    <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="form_alumno_curso.php" />
        <div class="titulo">
            <div class="grid_9 alpha"">
                 <h2 class="caption">Administraci&oacute;n de <span>alumno_curso</span></h2>
            </div>
            <div class="grid_3 omega">
                <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
                <div class="left boton_principal"><input type="submit" name="nuevo" value="Nuevo alumno_curso"/></div>                   
                <div class="clear"></div>
            </div> 
            <div class="clear"></div>
        </div>
        <!-- Fin Titulo de pÃ¡gina -->

        <?php
        $rejilla = new rejilla($result, "index.php?cuerpo=form_alumno_curso.php&", "ID", "Alumno");
        echo $rejilla->pintar();
    }
    ?>
    <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="form_alumno_curso.php" />
        <input type="submit" name="nuevo" value="Nuevo"/>
    </form>