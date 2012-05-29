<?php
include ("clase_diario.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$diario = new diario();
if (isset($_GET["ID"])) {
    $diario->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($diario);
    if ($arrayEntidad) {
        $diario->cargar($arrayEntidad[0]);
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
    <span>entrada al diario</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->
<form name="form_diario" id="MyForm" method="get" action="procesar_diario.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $diario->ID; ?>"/>
    <input type="hidden" name="ID_PROFESOR_CURSO" ID="ID_PROFESOR_CURSO" value="<?php echo $diario->ID_PROFESOR_CURSO; ?>"/>
    <input type="hidden" name="FECHA" ID="FECHA" value="<?php date_default_timezone_set('Europe/Madrid'); echo date("Y/m/d H:i:s"); ?>"/>
    <table>        
        <tr>
            <td class="text_right">T&iacute;tulo</td>
            <td>
                <input type="text" name="TITULO" ID="TITULO" value="<?php echo $diario->TITULO; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Entrada</td>
            <td>
                <textarea name="ENTRADA" ID="ENTRADA" rows="10" onkeypress="return limitaCaracteres('ENTRADA',20, -1);"><?php echo $diario->ENTRADA; ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="text_right">
                <br/><br/>Aqui van
            </td>
            <td>
                <br/><br/>&nbsp;los chekboxes
            </td>
            
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>            
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_diario.php'" name="Cancelar" value="Cancelar"></td>

        </tr>
    </table>
</form>