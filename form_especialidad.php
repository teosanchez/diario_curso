<?php
include ("clase_especialidad.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$especialidad = new especialidad();
if (isset($_GET["ID"])) {
    $especialidad->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($especialidad);
    if ($arrayEntidad) {
        $especialidad->cargar($arrayEntidad[0]);
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
    <span>especialidad</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_especialidad" id="MyForm" method="get" action="procesar_especialidad.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $especialidad->ID; ?>"/>
    <table>
        <tr>
            <td>Familia</td>
            <td>
<?php
$datosLista = $bd->consultar("select NOMBRE,ID from familia");
echo $util->pinta_selection($datosLista, "ID_FAMILIA", "NOMBRE", $especialidad->ID_FAMILIA);
?>
            </td>
        </tr>
        <tr>
            <td>Especialidad</td>
            <td>
                <input type="text" label="Especialidad" require="true" name="NOMBRE" ID="NOMBRE" value="<?php echo $especialidad->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" onclick="validarFormEspecialidad()" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_especialidad.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>