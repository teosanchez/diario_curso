<?php
	include ("clase_menu.php");
	include_once ("clase_bd.php");

	$menu=new menu();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["ID"]))
		{
			 $menu->id=$_GET["id"];
			 $menu->id_padre=$_GET["id_padre"];
			 $menu->enlace=$_GET["enlace"];
			 $menu->texto=$_GET["texto"];
		if($_GET["ID"]=="")
		{
			$bd->insertar($menu);
		}
		 else
		{
			$bd->actualizar($menu);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$menu->ID=$_GET["ID"];
		$bd->borrar($menu);
	 }
	 header('Location: index.php?cuerpo=rejilla_menu.php');
?>