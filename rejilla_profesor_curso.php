<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

$bd = new bd();
$result = $bd->consultarArray("select ID,Profesor,`Tel&eacute;fono`,`Fecha Alta`,`Fecha Baja` 
                    from vw_nombre_profesor_curso_especialidad");
?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_profesor_curso.php" />
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Administraci&oacute;n de <span>profesor-curso</span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nuevo profesor-curso"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
<!-- Fin Titulo de pÃ¡gina -->

<?php
if ($result)
    $rejilla = new rejilla($result, "index.php?cuerpo=form_profesor_curso.php&", "ID", "ID");
echo $rejilla->pintar();
?>
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_profesor_curso.php" />
    <input type="submit" name="nuevo" value="Nuevo"/>
</form>