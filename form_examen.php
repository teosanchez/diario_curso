<?php
include ("clase_examen.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$examen=new examen();
if(isset($_GET["ID"]))
{
$examen->ID=($_GET["ID"]);
$arrayEntidad=$bd->buscar($examen);
if($arrayEntidad)
{
	$examen->cargar($arrayEntidad[0]);
}
}
?>

<form name="form_examen" method="get" action="procesar_examen.php">
<input type="hidden" name="ID" ID="ID" value="<?php echo $examen->ID; ?>"/>
<table>
<tr>
<td>ID</td>
<td>
<input type="text" name="ID" ID="ID" value="<?php echo  $examen->ID; ?>"/>
</td>
</tr>
<tr>
<td>ID_CURSO</td>
<td>
<input type="text" name="ID_CURSO" ID="ID_CURSO" value="<?php echo  $examen->ID_CURSO; ?>"/>
</td>
</tr>
<tr>
<td>ID_PROFESOR</td>
<td>
<input type="text" name="ID_PROFESOR" ID="ID_PROFESOR" value="<?php echo  $examen->ID_PROFESOR; ?>"/>
</td>
</tr>
<tr>
<td>ID_ALUMNO</td>
<td>
<input type="text" name="ID_ALUMNO" ID="ID_ALUMNO" value="<?php echo  $examen->ID_ALUMNO; ?>"/>
</td>
</tr>
<tr>
	<td><input type="submit" name="Enviar" value="Enviar"></td>
	<td><input type="submit" name="Borrar" value="Borrar"></td>
	<td><input type="submit" name="Cancelar" value="Cancelar"></td>
        </tr>
     </table>
     </form>