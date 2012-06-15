<?php

include_once("constantes.php");
require_once("userCake/models/config.php");


$cuerpo = "bienvenida.php";
if (isUserLoggedIn()) {   //Si el usuario está identificado
    if (isset($_GET["cuerpo"])) {
        $archivo = RUTA_ARCHIVOS . $_GET["cuerpo"];
        if (file_exists($archivo)) {
            $cuerpo = $_GET["cuerpo"];
        }
    }
}
include ($cuerpo);
?>