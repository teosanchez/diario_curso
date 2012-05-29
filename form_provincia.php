<?php
include ("clase_provincia.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$provincia = new provincia();
if (isset($_GET["ID"])) {
    $provincia->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($provincia);
    if ($arrayEntidad) {
        $provincia->cargar($arrayEntidad[0]);
    }
}
?>

<!-- Titulo de pÃ¡gina -->
<h2 class="grid_12 caption">
    <?php
    if (isset($_GET["nuevo"])) {
        echo 'Nueva ';
    } else {
        echo 'Editar ';
    }
    ?>
    <span>provincia</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_provincia" id="MyForm" method="get" action="procesar_provincia.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $provincia->ID; ?>"/>
    <table>
        <tr>
        </tr>
        <tr>
            <td class="text_right">Provincia</td>
            <td>
                <input type="text" label="Provincia" require="true" name="NOMBRE" ID="NOMBRE" value="<?php echo $provincia->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_provincia.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>