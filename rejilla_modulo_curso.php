<?php
include ("clase_rejilla_xx.php");
include_once ("clase_bd.php");
include ("clase_curso.php");

$bd = new bd();
$curso = new curso();

include ("clase_profesor_curso.php");
$profesor_curso = new profesor_curso();

if (isset($_GET["ID_PROFESOR_CURSO"]))  // Venimos de "Seleccionar un curso"
{
    $profesor_curso->ID = $_GET["ID_PROFESOR_CURSO"];
    $arrayEntidad = $bd->buscar($profesor_curso);
    if ($arrayEntidad) 
    {
        $profesor_curso->cargar($arrayEntidad[0]);
    }
    $id_curso = $profesor_curso->ID_CURSO;
    $result = $bd->consultarArray("select ID,`M&oacute;dulo`,Horas 
                from vw_modulo_curso_2
                where ID_CURSO ='" . $id_curso . "'");

}


if (isset($_GET["ID"]))
{
    $curso->ID = ($_GET["ID"]);
    $id_curso = $curso->ID;
    $result = $bd->consultarArray("select ID,`M&oacute;dulo`,Horas 
                    from vw_modulo_curso_2
                    where ID_CURSO ='" . $curso->ID . "'");
}

$grupo = $loggedInUser->groupID();

?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="modulo_checkboxes.php" />
    <input type="hidden" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $id_curso; ?>"/>
    <input type="hidden" name="origen" ID="origen" value="<?php echo $_GET["origen"]; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha"">
            <?php
                if ($grupo['Group_ID'] == PROFESOR || $grupo['Group_ID'] == ALUMNO)
                {
                     echo '<h2 class="caption">Listado de <span>m&oacute;dulos del curso:';
                }
                else
                {
                    echo '<h2 class="caption">Administraci&oacute;n de <span>m&oacute;dulos del curso:';
                }
                                     
                 $curso = $bd->consultarArray("select ESPECIALIDAD 
                            from vw_curso_especialidad 
                            where ID ='" . $id_curso . "'");
                 echo ($curso[0]["ESPECIALIDAD"]);

            ?>
            </span></h2>
        </div>
        <div class="grid_3 omega">
            <?php
                if ($grupo['Group_ID'] == ADMINISTRADOR || $grupo['Group_ID'] == SECRETARIA)
                {
                echo '<div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>'; 
                echo '<div class="left boton_principal"><input type="submit" name="nuevo" value="Nueva entrada"/></div>';                   
                }
            ?>
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
    <!-- Fin Titulo de pÃ¡gina -->

<?php
if ($result) {
    $rejilla = new rejilla_xx($result, "index.php?cuerpo=form_modulo_curso.php&", "ID", "ESPECIALIDAD",$_GET["origen"],$grupo['Group_ID']);
    echo $rejilla->pintar();
}

?>
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="<?php echo $_GET["origen"]; ?>"/>
    <input type="hidden" name="ID" ID="ID" value="<?php echo $id_curso; ?>"/>
    <input type="submit" name="volver" value="Volver"/>
</form>