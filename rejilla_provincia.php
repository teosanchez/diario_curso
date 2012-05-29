<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

$bd = new bd();
$result = $bd->consultarArray("select ID,NOMBRE as PROVINCIA from provincia");
?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_provincia.php" />
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Administraci&oacute;n de <span>provincias</span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nueva provincia"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
<!-- Fin Titulo de pÃ¡gina -->

<?php
if ($result)
    $rejilla = new rejilla($result, "index.php?cuerpo=form_provincia.php&", "ID", "PROVINCIA");
echo $rejilla->pintar();
?>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_provincia.php" />
    <input type="submit" name="nuevo" value="Nuevo"/>
</form>