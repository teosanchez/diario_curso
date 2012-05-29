<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

	$bd=new bd();
	$result=$bd->consultarArray("select * from vw_direccion_municipio");
if($result)
{echo '<p><h1>direccion<br></h1></p>';
	$rejilla=new rejilla($result,"index.php?cuerpo=form_direccion.php&","ID","CALLE");
	echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
<input type="hidden" name="cuerpo" value="form_direccion.php" />
<input type="submit" name="nuevo" value="Nuevo"/>
</form>

