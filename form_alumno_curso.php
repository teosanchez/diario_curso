<?php
include ("clase_alumno_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$alumno_curso = new alumno_curso();
if (isset($_GET["ID"])) {
    $alumno_curso->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($alumno_curso);
    if ($arrayEntidad) {
        $alumno_curso->cargar($arrayEntidad[0]);
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
    <span>alumno_curso</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_alumno_curso" id="MyForm" method="get" action="procesar_alumno_curso.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $alumno_curso->ID; ?>"/>
    <table>
        <tr>
            <td>Alumno</td>
            <td>
<?php
$datosLista = $bd->consultar("select ID, concat(alumno.apellidos,',  ',alumno.nombre) as Alumno from alumno");
echo $util->pinta_selection($datosLista, "ID_ALUMNO", "Alumno", $alumno_curso->ID_ALUMNO);
?>
            </td>
        </tr>
        <tr>
            <td>Curso</td>
            <td>
<?php
$datosLista = $bd->consultar("select curso.ID,especialidad.NOMBRE from curso JOIN especialidad ON curso.ID_ESPECIALIDAD=especialidad.ID");
echo $util->pinta_selection($datosLista, "ID_CURSO", "NOMBRE", $alumno_curso->ID_CURSO);
?>
            </td>
        </tr>
        <tr>
            <td>Fecha de Alta</td>
            <td>
                <input type="text" label="Fecha de Alta" require="true" name="FECHA_ALTA" ID="FECHA_ALTA" value="<?php echo $alumno_curso->FECHA_ALTA; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Fecha de baja</td>
            <td>
                <input type="text" label="Fecha de Baja" require="true" name="FECHA_BAJA" ID="FECHA_BAJA" value="<?php echo $alumno_curso->FECHA_BAJA; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Suplente</td>
            <td>
                <input type="text" label="Suplente" require="true" name="SUPLENTE" ID="SUPLENTE" value="<?php echo $alumno_curso->SUPLENTE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_alumno_curso.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>