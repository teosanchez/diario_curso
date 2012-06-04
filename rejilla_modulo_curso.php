<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");
include ("clase_curso.php");

$bd = new bd();
$curso = new curso();
if (isset($_GET["ID"]))
{
    $curso->ID = ($_GET["ID"]);
    $result = $bd->consultarArray("select ID,Modulo,Horas 
                    from vw_modulo_curso_2
                    where ID_CURSO ='" . $curso->ID . "'");
}
?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="modulo_checkboxes.php" />
    <input type="hidden" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $curso->ID; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Administraci&oacute;n de <span>m&oacute;dulos del curso:  
                     <?php
                        $curso = $bd->consultarArray("select ESPECIALIDAD 
                                from vw_curso_especialidad 
                                where ID ='" . $curso->ID . "'");
                        echo ($curso[0]["ESPECIALIDAD"]);
                     ?>
            </span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nuevo m&oacute;dulo"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
    <!-- Fin Titulo de pÃ¡gina -->

<?php
if ($result) {
    $rejilla = new rejilla($result, "index.php?cuerpo=form_modulo_curso.php&", "ID", "ESPECIALIDAD");
    echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_curso.php" />
    <input type="hidden" name="ID" ID="ID" value="<?php echo $_GET["ID"]; ?>"/>
    <input type="submit" name="volver" value="Volver"/>
</form>