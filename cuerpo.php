<?php
include("constantes.php");

$cuerpo = "bienvenida.php";

if (isset($_GET["cuerpo"])) {
 $archivo=RUTA_ARCHIVOS.$_GET["cuerpo"];
    if (file_exists($archivo)) {
        $cuerpo = $_GET["cuerpo"];
    }
}

include ($cuerpo);
?>