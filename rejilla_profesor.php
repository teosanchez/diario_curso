
<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

$bd = new bd();

$result = $bd->consultarArray("select `ID`, `Profesor`, `Tel&eacute;fono`, `Email`  from vw_profesor_direccion");

?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_profesor.php" />
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Administraci&oacute;n de <span>profesores</span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nuevo profesor"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
    <!-- Fin Titulo de pÃ¡gina -->

    <?php
    if(isset($_GET['mensaje_error']))
    {
        echo "<div>".$_GET['mensaje_error']."</div>";
    }
    if ($result) {
        $rejilla = new rejilla($result, "index.php?cuerpo=form_profesor.php&", "ID", "NOMBRE");
        echo $rejilla->pintar();
    }
    ?>
    <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="form_profesor.php" />
        <input type="submit" name="nuevo" value="Nuevo"/>
    </form>