<?php
include ("clase_alumno_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$alumno_curso = new alumno_curso();
if (isset($_GET["ID_CURSO"])) 
{
    $alumno_curso->ID_CURSO = ($_GET["ID_CURSO"]);
}

$c="";
if (isset($_GET["c"])&&($_GET["c"]<>""))
{
    $c="nuevo"; // Se viene de form_curso con un curso nuevo (sin alumnos)
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
    <input type="hidden" name="c" id="c" value="<?php echo $c; ?>"/>

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
                <?php
                $datosLista = $bd->consultar("select CONCAT(APELLIDOS,', ' ,NOMBRE) AS Alumno,ID 
                    from alumno");
                echo $util->pinta_selection($datosLista, "ID_ALUMNO", "Alumno", $alumno_curso->ID_ALUMNO);
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
                <input type="text" label="Fecha de Baja"  name="FECHA_BAJA" ID="FECHA_BAJA" value="<?php echo $alumno_curso->FECHA_BAJA; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Suplente</td>
            <td>
                <div class="radio_form"><input type="radio" value="0" name="SUPLENTE" id="SUPLENTE" />Matriculado</div>
                <div class="radio_form"><input type="radio" value="1" name="SUPLENTE" id="SUPLENTE" />Reserva</div>
            </td>
        </tr>
        <tr>
            <td><input type="submit" onclick="validarFormAlumnoCurso()" name="Enviar" value="Enviar"/></td>
            <td><input type="button" 
                        onClick="parent.location=
                    'index.php?cuerpo=procesar_alumno_curso.php&Cancelar=Cancelar&ID_CURSO=<?php echo $alumno_curso->ID_CURSO;?>&c=<?php echo $c; ?>'"
            name="Cancelar" value="Cancelar"></td>
        </tr>
    </table>
</form>