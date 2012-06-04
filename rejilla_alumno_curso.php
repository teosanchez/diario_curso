<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");
include ("clase_curso.php");

$bd = new bd();
$curso = new curso();
if (isset($_GET["ID"])) 
{
    $curso->ID = ($_GET["ID"]);
    $result = $bd->consultarArray("select ID,Alumno,`Fecha de Alta`,`Fecha de Baja`,Suplente
                            from vw_nombre_alumno_nombre_especialidad 
                            where ID_CURSO ='" . $curso->ID . "'");
}
?>
<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_alumno_curso2.php" />
    <input type="hidden" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $curso->ID; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Administraci&oacute;n de <span>alumnos del curso:
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
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nuevo alumno"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
    <!-- Fin Titulo de pÃ¡gina -->

<?php
if ($result) 
{
    $rejilla = new rejilla($result, "index.php?cuerpo=form_alumno_curso.php&", "ID", "Alumno");
    echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_curso.php" />
    <input type="hidden" name="ID" ID="ID" value="<?php echo $_GET["ID"]; ?>"/>
    <input type="submit" name="volver" value="Volver"/>
</form>