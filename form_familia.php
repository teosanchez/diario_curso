<?php
include ("clase_familia.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$familia = new familia();
if (isset($_GET["ID"])) {
    $familia->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($familia);
    if ($arrayEntidad) {
        $familia->cargar($arrayEntidad[0]);
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
    <span>familia</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_familia" id="MyForm" method="get" action="procesar_familia.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $familia->ID; ?>"/>
    <table>
        <tr>
            <td>Familia</td>
            <td>
                <input type="text" label="Familia" require="true" name="NOMBRE" ID="NOMBRE" value="<?php echo $familia->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_familia.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>