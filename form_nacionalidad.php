<?php
include ("clase_nacionalidad.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$nacionalidad = new nacionalidad();
if (isset($_GET["ID"])) {
    $nacionalidad->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($nacionalidad);
    if ($arrayEntidad) {
        $nacionalidad->cargar($arrayEntidad[0]);
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
    <span>nacionalidad</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_nacionalidad" id="MyForm" method="get" action="procesar_nacionalidad.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $nacionalidad->ID; ?>"/>
    <table>
        <tr>
            <td class="text_right">Nacionalidad</td>
            <td>
                <input type="text" name="NOMBRE" label="NACIONALIDAD" ID="NOMBRE" value="<?php echo $nacionalidad->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="button" onClick="validarFormNacionalidad()" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_nacionalidad.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>