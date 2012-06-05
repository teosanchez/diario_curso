<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");
include ("clase_curso.php");

$bd = new bd();
$curso = new curso();

if(isset($_GET["ID"]))
{
    $curso->ID = ($_GET["ID"]);
    $result = $bd->consultarArray("select ID,Profesor,`Tel&eacute;fono`,`Fecha Alta`,`Fecha Baja` 
                    from vw_nombre_profesor_curso_especialidad where ID_CURSO ='" . $curso->ID . "'");
}


?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_profesor_curso2.php" />
    <input type="hidden" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $curso->ID; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha">
             <h2 class="caption">Administraci&oacute;n de <span>Profesor-Curso</span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="A&ntilde;adir nuevo Profesor"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
<!-- Fin Titulo de pÃ¡gina -->

<?php
if ($result)
    $rejilla = new rejilla($result, "index.php?cuerpo=form_profesor_curso.php&", "ID", "Profesor");
echo $rejilla->pintar();
?>
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_curso.php" />
    <input type="hidden" name="ID" ID="ID" value="<?php echo $_GET["ID"]; ?>"/>
    <input type="submit" name="volver" value="Volver"/>
</form>