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
<input type="hidden" name="ID_CURSO" id="ID_CURSO" value="<?php echo $modulo_curso->ID_CURSO; ?>"/>
<input type="hidden" name="ID_MODULO" id="ID_MODULO" value="<?php echo $modulo_curso->ID_MODULO; ?>"/>
<table>
    <tr>
        <td class="form_td text_right">Curso :</td>
        <td class="form_td">
            <?php
            $curso = $bd->consultarArray("select ESPECIALIDAD 
                                 from vw_curso_especialidad 
                                 where ID ='" . $modulo_curso->ID_CURSO . "'");
            echo ($curso[0]["ESPECIALIDAD"]);
            ?>
        </td>
    </tr>
    <tr>
        <td class="form_td text_right">M&oacute;dulo :</td>
        <td class="form_td">
            <?php
            $modulo = $bd->consultarArray("Select MODULO  
                                   from vw_modulo_curso 
                                   where ID_CURSO='" . $modulo_curso->ID_CURSO . "'");
            echo ($modulo[0]["MODULO"]);
            ?>    
        </td>
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
        <td><input type="submit" name="Enviar" value="Enviar"/></td>
        <!--<td><input type="button" 
                   onClick="parent.location='index.php?cuerpo=rejilla_modulo_curso.php&ID='
                            <?php echo $modulo_curso->ID_CURSO; ?>"
                   name="Cancelar" value="Cancelar"/>
        </td>-->
        <td><input type="submit" name="Cancelar" value="Cancelar"/></td>                          
    </tr>
</table>
</form>