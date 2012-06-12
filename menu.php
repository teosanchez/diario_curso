<h2 class="grid_12 caption">   
    Administraci&oacute;n <span>General</span>
</h2>
<?php
include_once ("clase_bd.php");

$bd=new bd();

$datos=$bd->consultar("SELECT * FROM `menu` where id_padre='".ADMINISTRACION."'");

$salida="";
if ($datos)
    {
    $salida='<ul class="grid_12 clearfix">';
    while($row = mysql_fetch_array($datos))
        {
        $salida.='<li><a href="'.$row['enlace'].'">'.$row['texto'].'</a></li>';
        }    
    $salida.="</ul>";
    }
echo $salida;
?>