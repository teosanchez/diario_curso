<?php
include ("clase_profesor_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$profesor_curso = new profesor_curso();
if (isset($_GET["ID"])) {
    $profesor_curso->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($profesor_curso);
    if ($arrayEntidad) {
        $profesor_curso->cargar($arrayEntidad[0]);
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
    <span>profesor-curso</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_profesor_curso" id="MyForm" method="get" action="procesar_profesor_curso.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $profesor_curso->ID; ?>"/>
    <table>
        <tr>
            <td class="text_right">ID</td>
            <td>
                <input type="text" label="ID" name="ID" ID="ID" value="<?php echo $profesor_curso->ID; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">ID_PROFESOR</td>
            <td>
                <input type="text" label="ID_PROFESOR" require="true" name="ID_PROFESOR" ID="ID_PROFESOR" value="<?php echo $profesor_curso->ID_PROFESOR; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">ID_CURSO</td>
            <td>
                <input type="text" label="ID_CURSO" require="true" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $profesor_curso->ID_CURSO; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">FECHA_ALTA</td>
            <td>
                <input type="text" label="FECHA_ALTA" require="true" name="FECHA_ALTA" ID="FECHA_ALTA" value="<?php echo $profesor_curso->FECHA_ALTA; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">FECHA_BAJA</td>
            <td>
                <input type="text" label="FECHA_BAJA" name="FECHA_BAJA" ID="FECHA_BAJA" value="<?php echo $profesor_curso->FECHA_BAJA; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_profesor_curso.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>