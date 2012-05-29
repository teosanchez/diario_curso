<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

	$bd=new bd();
	$result=$bd->consultarArray("select * from menu");
if($result)
{echo '<p><h1>menu<br></h1></p>';
	$rejilla=new rejilla($result,"index.php?cuerpo=form_menu.php&","ID","ID");
	echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
<input type="hidden" name="cuerpo" value="form_menu.php" />
<input type="submit" name="nuevo" value="Nuevo"/>
</form>