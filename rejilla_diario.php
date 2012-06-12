<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");
include ("clase_profesor_curso.php");
include ("utilidadesIU.php");


$bd = new bd();
$util = new utilidadesIU();
$profesor_curso = new profesor_curso();
if (isset($_GET["ID_PROFESOR_CURSO"])) {
    $profesor_curso->ID = ($_GET["ID_PROFESOR_CURSO"]);
    
}
?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_diario.php" />
    <input type="hidden" name="ID_PROFESOR_CURSO" ID="ID_CURSO" value="<?php echo $profesor_curso->ID; ?>"/>
    <input type="hidden" name="ID_PROFESOR" ID="ID_PROFESOR" value="<?php echo $codigo_profesor; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Entradas del curso: <span>  
                     <?php
                        $nombre_curso = $bd->consultarArray("select ESPECIALIDAD 
                                from vw_curso_especialidad_profesor_curso 
                                where ID ='" . $profesor_curso->ID . "'");
                        echo ($nombre_curso[0]["ESPECIALIDAD"]);
                     ?>
            </span></h2>
        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="submit" name="nuevo" value="Nueva entrada"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
<!-- Fin Titulo de pagina -->

<div class="titulo">
    <!-- Cuerpo Entradas -->
 
            <div class="left boton_principal">
                <form action="index.php" method="get">
                    <input type="hidden" name="cuerpo" value="form_diario.php" />
                    <input type="hidden" name="ID_PROFESOR" ID="ID_PROFESOR" value="<?php echo $codigo_profesor; ?>"/>
                    <?php
                    $diario = $bd->consultar("select * from vw_diario_profesor_curso where ID_PROFESOR_CURSO ='" . $profesor_curso->ID . "'");
                    $modulos = $bd->consultar("select MODULO from vw_diario_profesor_curso_nombre_check where ID_PROFESOR_CURSO ='" . $profesor_curso->ID . "'");

                    if ($diario) {
                        echo $util->pinta_entradas($diario, $modulos);
                    }
                    ?>
                  
                </form> 
            </div

            <div class="clear"></div>
        </div> 
        <div class="clear"></div>        
    </div>

    <!-- Menu Lateral -->
    <div class="grid_3 omega">

    </div> 
    <div class="clear"></div>
</div>




