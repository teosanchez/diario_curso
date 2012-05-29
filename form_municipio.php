<?php
include ("clase_municipio.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$municipio = new municipio();
if (isset($_GET["ID"])) {
    $municipio->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($municipio);
    if ($arrayEntidad) {
        $municipio->cargar($arrayEntidad[0]);
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
    <span>municipio</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_municipio" id="MyForm" method="get" action="procesar_municipio.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $municipio->ID; ?>"/>
    <table>
        <tr>
            <td class="form_td text_right">Provincia</td>
            <td class="form_td">
            <!--input type="text" name="ID_PROVINCIA" ID="ID_PROVINCIA" value="<?php /* echo  $municipio->ID_PROVINCIA; */ ?>"/-->
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from provincia");
                echo $util->pinta_selection($datosLista, "ID_PROVINCIA", "NOMBRE", $municipio->ID_PROVINCIA);
                ?>    
            </td>
        </tr>
        <tr>
            <td class="text_right">Municipio</td>
            <td>
                <input type="text" label="Municipio" require="true" name="NOMBRE" ID="NOMBRE" value="<?php echo $municipio->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_municipio.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>