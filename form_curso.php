<?php
include ("clase_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");
include ("clase_especialidad.php");
include ("clase_familia.php");

$bd = new bd();
$util = new utilidadesIU();
$curso = new curso();
$especialidad = new especialidad();
$familia = new familia();

if (isset($_GET["ID"])) 
{
    $curso->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($curso);
    if ($arrayEntidad) 
    {
        $curso->cargar($arrayEntidad[0]);
    }
}

if (isset($curso->ID_ESPECIALIDAD)) 
{
    $especialidad->ID = $curso->ID_ESPECIALIDAD;
    $arrayEntidad = $bd->buscar($especialidad);
    if ($arrayEntidad) 
    {
        $especialidad->cargar($arrayEntidad[0]);
    }
}

if (isset($especialidad->ID_FAMILIA)) 
{
    $familia->ID = $especialidad->ID_FAMILIA;
    $arrayEntidad = $bd->buscar($familia);
    if ($arrayEntidad) 
    {
        $familia->cargar($arrayEntidad[0]);
    }
}

?>

<script>
    $(document).ready(function(){
        $("#Familias").change(function(e){
            $("#lista_especialidades").load("cargar_especialidades.php",
            {ID_FAMILIA:  e.target.options[e.target.selectedIndex].value }); // El método load, carga lo que se le indica
        });
    });
</script>

<!-- Titulo de pÃ¡gina -->
<h2 class="grid_12 caption">
    <?php
    if (isset($_GET["nuevo"])) {
        echo 'Nuevo ';
    } else {
        echo 'Editar ';
    }
    ?>
    <span>curso</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_curso" id="MyForm" method="get" action="procesar_curso.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $curso->ID; ?>"/>
    <table>
        <tr>
            <td>Familia</td>
            <td>
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from familia");
                echo $util->pinta_selection($datosLista, "Familias", "NOMBRE", $especialidad->ID_FAMILIA);
                ?>
            </td>
        </tr>
        <tr>
            <td>Especialidad</td>
            <td>
                <div id="lista_especialidades">
                    <?php
                    $datosLista = $bd->consultar("select NOMBRE,ID from especialidad 
                                            where ID_FAMILIA ='" . $especialidad->ID_FAMILIA . "'");
                    echo $util->pinta_selection($datosLista, "Especialidades", "NOMBRE", 
                                                $curso->ID_ESPECIALIDAD);
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Nivel de Estudios</td>
            <td>
                <?php
                $datosLista = $bd->consultar("select substr(NOMBRE, 1, 25)as NOMBRE,`ID` FROM `nivel_estudios`");
                echo $util->pinta_selection($datosLista, "NIVEL_ESTUDIOS", "NOMBRE", $curso->ID_NIVEL_ESTUDIOS);
                ?>
            </td>
        </tr>
        <tr>
            <td>Duraci&oacute;n del curso (Horas)</td>
            <td>
                <input type="text" label="Duraci&oacute;n del curso" require="true" name="HORAS" ID="HORAS" value="<?php echo $curso->HORAS; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Fecha Inicio</td>
            <td>
                <input type="text" label="Fecha de Inicio" require="true" name="FECHA_INICIO" ID="FECHA_INICIO" value="<?php echo $curso->FECHA_INICIO; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Fecha Finalizaci&oacute;n</td>
            <td>
                <input type="text" label="Fecha de Finalizaci&oacute;n" require="true" name="FECHA_FIN" ID="FECHA_FIN" value="<?php echo $curso->FECHA_FIN; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Hora Inicio</td>
            <td>
                <input type="text" label="Hora Inicio" name="HORA_INICIO" ID="HORA_INICIO" value="<?php echo $curso->HORA_INICIO; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Hora Fin</td>
            <td>
                <input type="text" label="Hora Fin" name="HORA_FIN" ID="HORA_FIN" value="<?php echo $curso->HORA_FIN; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" onclick="validarFormCurso()" name="Enviar" value="Enviar"></td>
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_curso.php'" name="Cancelar" value="Cancelar"></td>
            <td><input type="submit" name="Programa_del_curso" value="Programa del curso" /></td>
            <td><input type="submit" name="Profesores_del_curso" value="Profesores del curso" /></td>
            <td><input type="submit" name="Alumnos_del_curso" value="Alumnos del curso" /></td>
        </tr>
    </table>
</form>