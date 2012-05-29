<?php
include ("clase_menu.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$menu=new menu();
if(isset($_GET["ID"]))
{
$menu->ID=($_GET["ID"]);
$arrayEntidad=$bd->buscar($menu);
if($arrayEntidad)
{
	$menu->cargar($arrayEntidad[0]);
}
}
?>

<form name="form_menu" method="get" action="procesar_menu.php">
<input type="hidden" name="ID" ID="ID" value="<?php echo $menu->ID; ?>"/>
<table>
<tr>
<td>id</td>
<td>
<input type="text" name="id" ID="id" value="<?php echo  $menu->id; ?>"/>
</td>
</tr>
<tr>
<td>id_padre</td>
<td>
<input type="text" name="id_padre" ID="id_padre" value="<?php echo  $menu->id_padre; ?>"/>
</td>
</tr>
<tr>
<td>enlace</td>
<td>
<input type="text" name="enlace" ID="enlace" value="<?php echo  $menu->enlace; ?>"/>
</td>
</tr>
<tr>
<td>texto</td>
<td>
<input type="text" name="texto" ID="texto" value="<?php echo  $menu->texto; ?>"/>
</td>
</tr>
<tr>
	<td><input type="submit" name="Enviar" value="Enviar"></td>
	<td><input type="submit" name="Borrar" value="Borrar"></td>
	<td><input type="submit" name="Cancelar" value="Cancelar"></td>
        </tr>
     </table>
     </form>