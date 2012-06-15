<script type="text/javascript" src="validaciones.js"></script>
<?php
include ("clase_modulo.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$modulo = new modulo();
if (isset($_GET["ID"])) {
    $modulo->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($modulo);
    if ($arrayEntidad) {
        $modulo->cargar($arrayEntidad[0]);
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
    <span>m&oacute;dulo</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_modulo" id="MyForm" method="get" action="procesar_modulo.php"/>
<input type="hidden" name="ID" id="ID" value="<?php echo $modulo->ID; ?>"/>
<table>
    <tr>    
        <td class="text_right">M&oacute;dulo</td>
        <td>
            <input type="text" require="true" label="MODULO" name="NOMBRE" id="NOMBRE" value="<?php echo $modulo->NOMBRE; ?>"/>
        </td>
    </tr>
    <tr>
        <td><input type="button" onClick="validarFormModulo()" name="Enviar" value="Enviar"></td>
        <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_modulo.php'" name="Cancelar" value="Cancelar"></td>
    </tr>
</table>
</form>