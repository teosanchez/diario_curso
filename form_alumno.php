<script>
    $(document).ready(function(){
        $("#Provincias").change(function(e){
            $("#lista_municipios").load("cargar_municipios.php",
            {ID_PROVINCIA:  e.target.options[e.target.selectedIndex].value }); // El método load, carga lo que se le indica
        });
    });
    $.ajaxSetup({
    'beforeSend' : function(xhr) {
    try{
    xhr.overrideMimeType('text/html; charset=iso-8859-1');
    }
    catch(e){
        
    }
    }});
</script>


	
<?php
include ("clase_alumno.php");
include ("utilidadesIU.php");
include ("clase_direccion.php");
include ("clase_municipio.php");
include ("clase_provincia.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$alumno = new alumno();
$direccion = new direccion();
$municipio = new municipio();
$provincia = new provincia();

//print_r($_GET);

if (isset($_GET["ID"])) {
    $alumno->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($alumno);
    if ($arrayEntidad)
        {
        $alumno->cargar($arrayEntidad[0]);
        }    
}
if (isset($alumno->ID_DIRECCION)) {
    $direccion->ID = $alumno->ID_DIRECCION;
    $arrayEntidad = $bd->buscar($direccion);
    if ($arrayEntidad) {
        $direccion->cargar($arrayEntidad[0]);
    }
}
if (isset($direccion->ID_MUNICIPIO)) {
    $municipio->ID = $direccion->ID_MUNICIPIO;
    $arrayEntidad = $bd->buscar($municipio);
    if ($arrayEntidad) {
        $municipio->cargar($arrayEntidad[0]);
    }
}
if (isset($municipio->ID_PROVINCIA)) {
    $provincia->ID = $municipio->ID_PROVINCIA;
    $arrayEntidad = $bd->buscar($provincia);
    if ($arrayEntidad) {
        $provincia->cargar($arrayEntidad[0]);
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
    <span>alumno</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_alumno" id="MyForm" method="get" action="procesar_alumno.php">
    <!--<form name="form_alumno" method="get" onsubmit="return validacion()" action="procesar_alumno.php">-->
    <input type="hidden" name="ID" ID="ID" value="<?php echo $alumno->ID; ?>"/>
    <input type="hidden" name="ID_DIRECCION" ID="ID_DIRECCION" value="<?php echo $alumno->ID_DIRECCION; ?>"/>
    <table>
        <tr>
            <td class="text_right">Nombre</td>
            <td>
                <input type="text" label="Nombre" name="NOMBRE" require="true" ID="NOMBRE" value="<?php echo $alumno->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Apellidos</td>
            <td>
                <input type="text" label="Apellidos" require="true" name="APELLIDOS" ID="APELLIDOS" value="<?php echo $alumno->APELLIDOS; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Usuario</td>
            <td>
                <?php
                if (isset($_GET["ID"]))
                    {
                    $usuario="select * from users where Email='".$alumno->EMAIL ."'";
                    $datos= $bd->consultar($usuario);
                    while ($fila = mysql_fetch_array($datos)) 
                        {
                        echo '<input type="hidden" label="User_ID" ID="User_ID" name="User_ID" value="'.$fila["User_ID"].'"/>';
                        echo '<input type="text" label="username" ID="username" name="username" value="'.$fila["Username"].'"/>';
                        }                                      
                    }
                else
                    {
                    echo '<input type="text" label="username" ID="username" name="username" />';
                    }                
                ?>
            </td>
        </tr>
        <tr>            
               <?php
                if (!isset($_GET["ID"]))
                    {                   
                        echo '<td class="text_right">Contrase&ntilde;a</td>';
                        echo '<td><input type="password" label="password" ID="password" name="password" /><td>';                                                        
                    }                              
                ?>        
        </tr>
        <tr>
            <td class="text_right">Calle</td>
            <td>
                <input type="text" label="Calle" name="CALLE"  value="<?php echo $direccion->CALLE; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">N&uacute;mero</td>
            <td>
                <input type="text" label="Número" name="NUMERO" ID="NUMERO" value="<?php echo $direccion->NUMERO; ?>"/>
            </td>
        </tr>

        <tr>
            <td class="form_td text_right">Provincia</td>
            <td class="form_td">
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from provincia ");
                echo $util->pinta_selection($datosLista, "Provincias", "NOMBRE", $municipio->ID_PROVINCIA);
                ?>
            </td>
        </tr>
        <td class="text_right">Municipio</td>
        <td>
            <div id="lista_municipios">
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from municipio where ID_PROVINCIA ='" . $municipio->ID_PROVINCIA . "'");
                echo $util->pinta_selection($datosLista, "Municipios", "NOMBRE", $direccion->ID_MUNICIPIO);
                ?>
            </div>
        </td>
        <tr>
            <td class="text_right">Fecha de nacimiento</td>
            <td>
                <input type="text" label="Fecha de nacimiento" require="true" name="FECHA_NACIMIENTO" ID="FECHA_NACIMIENTO" value="<?php echo $alumno->FECHA_NACIMIENTO; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Sexo</td>
            <td>
                <?php
                if (!isset($_GET["ID"])) {
                    echo '<div class="radio_form"><input type="radio" value="0" name="SEXO" id="SEXO" CHECKED/>Hombre</div>';
                    echo '<div class="radio_form"><input type="radio" value="1" name="SEXO" id="SEXO" />Mujer</div>';
                } else {
                    if ($alumno->SEXO == 0) {
                        echo '<div class="radio_form"><input type="radio" value="0" name="SEXO" id="SEXO" CHECKED/>Hombre</div>';
                        echo '<div class="radio_form"><input type="radio" value="1" name="SEXO" id="SEXO" />Mujer</div>';
                    } else {
                        echo '<div class="radio_form"><input type="radio" value="0" name="SEXO" id="SEXO" />Hombre</div>';
                        echo '<div class="radio_form"><input type="radio" value="1" name="SEXO" id="SEXO" CHECKED/>Mujer</div>';
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="text_right">DNI</td>
            <td>
                <input type="text" label="DNI" require="true" name="DNI" ID="DNI" value="<?php echo $alumno->DNI; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="form_tr text_right">Situaci&oacute;n Laboral</td>
            <td class="form_td">
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from situacion_laboral");
                echo $util->pinta_selection($datosLista, "ID_SITUACION", "NOMBRE", $alumno->ID_SITUACION);
                ?>
            </td>
        </tr>
        <tr>
            <td class="form_tr text_right">Nacionalidad</td>
            <td class="form_td">
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from nacionalidad");
                echo $util->pinta_selection($datosLista, "ID_NACIONALIDAD", "NOMBRE", $alumno->ID_NACIONALIDAD);
                ?>
            </td>
        </tr>
        <tr>
            <td class="form_tr text_right">Nivel de Estudios</td>
            <td class="form_td">
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from nivel_estudios");
                echo $util->pinta_selection($datosLista, "ID_NIVEL_ESTUDIOS", "NOMBRE", $alumno->ID_NIVEL_ESTUDIOS);
                ?>
            </td>
        </tr>
        <tr>
            <td class="text_right">Tel&eacute;fono</td>
            <td>
                <input type="text" name="TELEFONO" ID="TELEFONO" value="<?php echo $alumno->TELEFONO; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Email</td>
            <td>
                <input type="text" name="EMAIL" validate="email" ID="EMAIL" value="<?php echo $alumno->EMAIL; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" onClick="validarFormAlumno()" name="Enviar" value="Enviar"></td>           
            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_alumno.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
        
    </table>
    <div id="errores"></div>
    <?php
    if (isset($_GET['msj']) && $_GET['msj'] != "")
        {//Incluir en Generador
        echo '<div id="errors" class="formlyRequired formlyAlert" style="display: block;">';
        echo $_GET['msj'];
        echo '</div>';
        }                               
    ?>
</form>