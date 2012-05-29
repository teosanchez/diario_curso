<?php
include ("clase_situacion_laboral.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$situacion_laboral = new situacion_laboral();
if (isset($_GET["ID"])) {
    $situacion_laboral->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($situacion_laboral);
    if ($arrayEntidad) {
        $situacion_laboral->cargar($arrayEntidad[0]);
    }
}
?>
<!-- Titulo de pÃ¡gina -->
<h2 class="grid_12 caption">
<?php
if (isset($_GET["nuevo"])) {
    echo 'Nuevo ';
} else {
    echo 'Editar ';
}
?>
    <span>situaci&oacute;n laboral</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_situacion_laboral" id="MyForm" method="get" action="procesar_situacion_laboral.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $situacion_laboral->ID; ?>"/>
    <table>
        <tr>
            <td class="text_right">Situaci&oacute;n laboral</td>
            <td>
                <input type="text" name="NOMBRE" ID="NOMBRE" value="<?php echo $situacion_laboral->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_situacion_laboral.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>