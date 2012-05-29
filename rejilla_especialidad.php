<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

$bd = new bd();
$result = $bd->consultarArray("select especialidad.ID, familia.nombre AS Familia,
            especialidad.NOMBRE AS Especialidad from especialidad join familia 
            on especialidad.ID_FAMILIA=familia.id order by Familia, Especialidad");?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_especialidad.php" />
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Administraci&oacute;n de <span>especialidad</span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nueva especialidad"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
    <!-- Fin Titulo de pÃ¡gina -->
    
    <?php
if ($result) {
    $rejilla = new rejilla($result, "index.php?cuerpo=form_especialidad.php&", "ID", "Especialidad");
    echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_especialidad.php" />
    <input type="submit" name="nuevo" value="Nuevo"/>
</form>