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
    if (isset($_GET["ID_PROFESOR_CURSO"])) 
    {
        $ID_PROFESOR_CURSO=$_GET["ID_PROFESOR_CURSO"];
    }
    if (isset($_GET["ID_PROFESOR"])) 
    {
        $ID_PROFESOR=$_GET["ID_PROFESOR"];
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
    <input type="hidden" name="ID_PROFESOR" ID="ID_PROFESOR" value="<?php echo $ID_PROFESOR; ?>"/>
    <input type="hidden" name="ID_PROFESOR_CURSO" ID="ID_PROFESOR_CURSO" value="<?php echo $ID_PROFESOR_CURSO; ?>"/>
    <input type="hidden" name="FECHA" ID="FECHA" value="<?php date_default_timezone_set('Europe/Madrid');
    echo date("Y/m/d H:i:s"); ?>"/>
    <table>        
        <tr>
            <td class="text_right">T&iacute;tulo</td>
            <td>
                <input type="text" require="true" label="TITULO" name="TITULO" ID="TITULO" value="<?php echo $diario->TITULO; ?>"/>
            </td>
        </tr>       
        <tr>
            
            <td colspan="2">
                <textarea id="wysiwyg" name="ENTRADA" rows="25" cols="115">
                <?php
                    $entrada = $bd->consultarArray("select ENTRADA from diario  where ID ='" . $diario->ID. "'");
                    echo $entrada_diario = $entrada[0]["ENTRADA"];
                ?>
                </textarea>
                
            </td>

        </tr>
          <tr>
            <td>Aqui van </td>
            <td>los checkbox</td>
        </tr> 
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>            
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_diario.php&ID_PROFESOR_CURSO=<?php echo $ID_PROFESOR_CURSO;?>'" name="Cancelar" value="Cancelar"></td>

        </tr>
    </table>
</form>