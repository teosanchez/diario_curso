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
    <span>Profesor-Curso</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_profesor_curso" id="MyForm" method="get" action="procesar_profesor_curso.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $profesor_curso->ID; ?>"/>
    <input type="hidden" name="ID_CURSO" id="ID_CURSO" value="<?php echo $profesor_curso->ID_CURSO; ?>"/>
    <input type="hidden" name="origen" id="origen" value="<?php echo $_GET["origen"]; ?>"/>
    <table>
        <tr>
            <td class="text_right">Profesor</td>
            <td class="form_td">
                <input type="text" readonly="readonly" label="PROFESOR" require="true" name="PROFESOR" ID="PROFESOR" 
                       value="<?php
                                $curso = $bd->consultarArray("select ID,
                                    concat(APELLIDOS,', ',NOMBRE) AS Profesor
                                    from profesor where ID ='" . $profesor_curso->ID_PROFESOR . "'");
                                    echo ($curso[0]["Profesor"]);
                                ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Curso</td>
            <td class="form_td">
                <input type="text" readonly="readonly" label="ID_CURSO" require="true" name="CURSO" ID="CURSO" 
                       value="<?php
                                $curso = $bd->consultarArray("SELECT * from vw_form_profesor_curso_2 
                                    where ID ='" . $profesor_curso->ID_CURSO . "'");
                                    echo ($curso[0]["NOMBRE"]);
                                ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Fecha de Alta</td>
            <td class="form_td">
                <input type="text" label="FECHA_ALTA" require="true" name="FECHA_ALTA" ID="FECHA_ALTA" value="<?php echo $profesor_curso->FECHA_ALTA; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Fecha de Baja</td>
            <td class="form_td">
                <input type="text" label="FECHA_BAJA" name="FECHA_BAJA" ID="FECHA_BAJA" value="<?php echo $profesor_curso->FECHA_BAJA; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="button" onclick="validarFormProfesorCurso()" name="Enviar" value="Enviar"></td>
            <td><input type="button" 
            onClick="parent.location=
                    'index.php?cuerpo=procesar_profesor_curso.php&Cancelar=Cancelar&ID_CURSO=<?php echo $profesor_curso->ID_CURSO;?>&origen=<?php echo $_GET["origen"];?>'" 
                    name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>