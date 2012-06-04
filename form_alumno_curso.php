<?php
include ("clase_alumno_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$alumno_curso = new alumno_curso();
if (isset($_GET["ID"])) 
{
    $alumno_curso->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($alumno_curso);
    if ($arrayEntidad) 
    {
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
    <input type="hidden" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $alumno_curso->ID_CURSO; ?>"/>
    <input type="hidden" name="ID_ALUMNO" id="ID_ALUMNO" value="<?php echo $alumno_curso->ID_ALUMNO; ?>"/>
    <table>
        <tr>
            <td>Curso</td>
            <td>
                <input type="text" label="Curso" require="true" name="CURSO" readonly="readonly" ID="CURSO"
                       value="                     
                        <?php
                        $curso = $bd->consultarArray("select ESPECIALIDAD 
                                from vw_curso_especialidad 
                                where ID ='" . $alumno_curso->ID_CURSO . "'");
                        echo ($curso[0]["ESPECIALIDAD"]);
                        ?>" />
            </td>
        </tr>
        <tr>
            <td>Alumno</td>
            <td>
                <input type="text" label="Alumno" require="true" name="ALUMNO" 
                       readonly="readonly" ID="ALUMNO"
                       value="<?php 
                                 $alumno = $bd->consultarArray("select Alumno
                                 from vw_nombre_alumno_nombre_especialidad 
                                 where ID ='" . $alumno_curso->ID . "'");
                                 echo ($alumno[0]["Alumno"]); ?>" />
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
                <input type="text" label="Fecha de Baja"  name="FECHA_BAJA" ID="FECHA_BAJA" value="<?php echo $alumno_curso->FECHA_BAJA; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Suplente</td>
            <td>
                <input type="text" label="Suplente"  name="SUPLENTE" ID="SUPLENTE" value="<?php echo $alumno_curso->SUPLENTE; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Enviar" value="Enviar"/></td>
            <!--<td><input type="button" 
            onClick="parent.location='index.php?cuerpo=rejilla_alumno_curso.php'" 
            name="Cancelar" value="Cancelar"></td>-->
            <td><input type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>