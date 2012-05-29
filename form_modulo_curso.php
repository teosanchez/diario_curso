<?php
include ("clase_modulo_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$modulo_curso = new modulo_curso();
if (isset($_GET["ID"])) {
    $modulo_curso->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($modulo_curso);
    if ($arrayEntidad) {
        $modulo_curso->cargar($arrayEntidad[0]);
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
    <span>m&oacute;dulo curso</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_modulo_curso" id="MyForm" method="get" action="procesar_modulo_curso.php"/>
<input type="hidden" name="ID" id="ID" value="<?php echo $modulo_curso->ID; ?>"/>
<table>
    <tr>
        <td class="form_td text_right">Curso</td>
        <td class="form_td">
            <?php
            $datosLista = $bd->consultar("select ESPECIALIDAD,ID from vw_curso_especialidad where ID ='" . $modulo_curso->ID_CURSO . "'");
            echo $util->pinta_selection($datosLista, "ID_ESPECIALIDAD", "ESPECIALIDAD", $modulo_curso->ID_CURSO);
            ?>
        </td>
    </tr>
    <tr>
        <td class="form_td text_right">M&oacute;dulos</td>
        <td class="form_td">
            <?php
            $modulos_seleccionados = $bd->consultarArray("Select MODULO  
                                                    from vw_modulo_curso where ID_CURSO='" . $modulo_curso->ID_CURSO . "'");
            echo $util->pinta_modulos($modulos_seleccionados);
            ?>    
        </td>
        <td>
            <input type="submit" name="Seleccionar_Modulos" value="Seleccionar M&oacute;dulos"/></td>
    </tr>
    <tr>
        <td class="text_right">Horas</td>
        <td>
            <input type="text" name="HORAS" id="HORAS" value="<?php echo $modulo_curso->HORAS; ?>"/>
        </td>
    </tr>
    <tr>
        <td class="text_right">Descripci&oacute;n</td>
        <td>
            <input type="text" name="DESCRIPCION" id="DESCRIPCION" value="<?php echo $modulo_curso->DESCRIPCION; ?>"/>
        </td>
    </tr>
    <tr>
        <td><input type="submit" name="Enviar" value="Enviar"></td>
        <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_modulo_curso.php'" name="Cancelar" value="Cancelar"></td>
    </tr>
</table>
</form>