
<script>
    $(document).ready(function(){
        $("#Provincias").change(function(e){
            $("#lista_municipios").load("cargar_municipios.php",
            {ID_PROVINCIA:  e.target.options[e.target.selectedIndex].value }); // El método load, carga lo que se le indica
        });
    });
</script>
<?php
include ("clase_profesor.php");
include ("clase_direccion.php");
include ("clase_provincia.php");
include ("clase_municipio.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$profesor = new profesor();
$direccion = new direccion();
$municipio = new municipio();
$provincia = new provincia();
if (isset($_GET["ID"])) {
    $profesor->ID = ($_GET["ID"]);
    $arrayEntidad = $bd->buscar($profesor);

    if ($arrayEntidad) {
        $profesor->cargar($arrayEntidad[0]);        
    }

    if (isset($profesor->ID_DIRECCION)) {
        $direccion->ID = $profesor->ID_DIRECCION;
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
    <span>profesor</span>
</h2>
<!-- Fin Titulo de pÃ¡gina -->

<form name="form_profesor" id="MyForm" method="get" action="procesar_profesor.php">
    <input type="hidden" name="ID" ID="ID" value="<?php echo $profesor->ID; ?>"/>
    <input type="hidden" name="ID_DIRECCION" ID="ID_DIRECCION" value="<?php echo $profesor->ID_DIRECCION; ?>"/>
    <table>
        <tr>
            <td class="text_right">Nombre</td>
            <td>
                <input type="text" label="Nombre" require="true" name="NOMBRE" ID="NOMBRE" value="<?php echo $profesor->NOMBRE; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Apellidos</td>
            <td>
                <input type="text" label="Apellidos" require="true" name="APELLIDOS" ID="APELLIDOS" value="<?php echo $profesor->APELLIDOS; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">DNI</td>
            <td>
                <input type="text" label="DNI" require="true" name="DNI" ID="DNI" value="<?php echo $profesor->DNI; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Usuario</td>
            <td>
                <?php
                if (isset($_GET["ID"]))
                    {
                    $usuario="select * from users where Email='".$profesor->EMAIL ."'";
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
                <input type="text" label="Calle" name="CALLE" ID="CALLE" value="<?php echo $direccion->CALLE; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">N&uacute;mero</td>
            <td>
                <input type="text" label="N&uacute;mero" name="NUMERO" ID="NUMERO" value="<?php echo $direccion->NUMERO; ?>"/>
            </td>
        </tr>
        <tr>
            <td class="text_right">Provincia</td>
            <td> <?php
                    $datosLista = $bd->consultar("select NOMBRE,ID from provincia");
                    echo $util->pinta_selection($datosLista, "Provincias", "NOMBRE", $municipio->ID_PROVINCIA);
                 ?>
            </td>
        </tr>
        <tr>
            <td class="text_right">
                Municipio
            </td>
            <td>
                <div id="lista_municipios">
                <?php
                $datosLista = $bd->consultar("select NOMBRE,ID from municipio where ID_PROVINCIA ='" . $municipio->ID_PROVINCIA . "'");
                echo $util->pinta_selection($datosLista, "Municipios", "NOMBRE", $direccion->ID_MUNICIPIO);
                ?> 
                </div>
            </td>
        </tr>
        <tr>
            <td class="text_right">Tel&eacute;fono</td>
            <td>
                <input type="text" name="TELEFONO" ID="TELEFONO" value="<?php echo $profesor->TELEFONO; ?>"/>
            </td>
        </tr>
        <tr>

            <td class="text_right">Email</td>
            <td>
                <input type="text" name="EMAIL" ID="EMAIL" value="<?php echo $profesor->EMAIL; ?>"/>
            </td>
        </tr>
        <tr>
            <!--td><input type="submit" name="Enviar" value="Enviar"></td-->

            <td><input type="submit" onclick="validarFormProfesor()" name="Enviar" value="Enviar"></td>

            <td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_profesor.php'" name="Cancelar" value="Cancelar"></td>          
        </tr>
    </table>
    <?php
    if (isset($_GET['msj']) && $_GET['msj'] != "")
        {//Incluir en Generador
        echo '<div id="errors" class="formlyRequired formlyAlert" style="display: block;">';
        echo $_GET['msj'];
        echo '</div>';
        }                               
    ?>
</form>