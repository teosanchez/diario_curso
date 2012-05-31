<script type="text/javascript" src="validaciones.js"></script>
    
<?php
include ("clase_direccion.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");
include ("clase_municipio.php");
include ("clase_provincia.php");

$bd=new bd();
$util=new utilidadesIU();
$direccion=new direccion();
$municipio=new municipio();
$provincia=new provincia();


if(isset($_GET["ID"])){
    $direccion->ID=$_GET["ID"];
    $arrayEntidad=$bd->buscar($direccion);
    if($arrayEntidad)
    {
        $direccion->cargar($arrayEntidad[0]);
    }
}
if(isset($direccion->ID_MUNICIPIO))
{
    $municipio->ID=$direccion->ID_MUNICIPIO;
    $arrayEntidad=$bd->buscar($municipio);
    if($arrayEntidad)
    {
        $municipio->cargar($arrayEntidad[0]);
    }
}
if(isset($municipio->ID_PROVINCIA))
{
    $provincia->ID=$municipio->ID_PROVINCIA;
    $arrayEntidad=$bd->buscar($provincia);
    if($arrayEntidad)
    {
        $provincia->cargar($arrayEntidad[0]);
    }
}


?>
<script>
        $(document).ready(function(){
            $("#Provincias").change(function(e){
                 $("#lista_municipios").load("cargar_municipios.php",
                 {ID_PROVINCIA:  e.target.options[e.target.selectedIndex].value }); // El método load, carga lo que se le indica
            });
        });
        </script>

<form name="form_direccion" method="get" id="MyForm" action="procesar_direccion.php">
<input type="hidden" name="ID" id="ID" value="<?php echo $direccion->ID; ?>"/>
<table>
<tr>
    <td>Provincia</td>
    <td>
        <?php
        $datosLista = $bd->consultar("select NOMBRE,ID from provincia");
        echo $util->pinta_selection($datosLista, "Provincias","NOMBRE",$municipio->ID_PROVINCIA);
        ?>
    </td>
</tr>    
<tr>
<td>Municipio</td>
<td>
<div id="lista_municipios">
            <?php
            $datosLista=$bd->consultar("select NOMBRE,ID from municipio where ID_PROVINCIA ='".$municipio->ID_PROVINCIA."'");
            echo $util->pinta_selection($datosLista,"Municipios","NOMBRE",$direccion->ID_MUNICIPIO);
            ?>
        
    </div>
</td>
</tr>
<tr>
<td>Calle</td>
<td>
<input type="text" name="CALLE" require="true" label="CALLE" ID="CALLE" value="<?php echo  $direccion->CALLE; ?>"/>
</td>
</tr>
<tr>
<td>Numero</td>
<td>
<input type="text" name="NUMERO" require="true" label="NUMERO" ID="NUMERO" value="<?php echo  $direccion->NUMERO; ?>"/>
</td>
</tr>
<tr>
	<td><input type="submit" name="Enviar" value="Enviar"></td>
	
	<td><input type="button" onClick="parent.location='index.php?cuerpo=rejilla_direccion.php'" name="Cancelar" value="Cancelar"></td>
        </tr>
     </table>
     </form>
