<?php
include ("clase_nivel_estudios.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$nivel_estudios = new nivel_estudios();
if (isset($_GET["ID"])) {
    $nivel_estudios->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($nivel_estudios);
    if ($arrayEntidad) {
        $nivel_estudios->cargar($arrayEntidad[0]);
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
    <span>nivel estudios</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_nivel_estudios" id="MyForm" method="get" action="procesar_nivel_estudios.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $nivel_estudios->ID; ?>"/>
    <table>
        <tr>
            <td class="text_right">Nivel de Estudios</td>
            <td>
                <input type="text" label="NIVEL DE ESTUDIOS" require="true" name="NOMBRE" ID="NOMBRE" value="<?php echo $nivel_estudios->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="button" onClick="validarFormNivelEstudios()" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_nivel_estudios.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>