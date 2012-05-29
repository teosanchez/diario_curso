<?php 
if (isset($_GET["cuerpo"]))
    {
    $cuerpo=$_GET["cuerpo"];
    }
else
    {
    $cuerpo="bienvenida.php";
    }
include ($cuerpo);
?>