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

    $arrayEntidad = $bd->buscar($profesor_curso);
    if ($arrayEntidad) {
        $profesor_curso->cargar($arrayEntidad[0]);
    }

}

$grupo = $loggedInUser->groupID();

?>

<!-- Titulo de pagina -->
<!--<form action="index.php" method="get" onsubmit="return entrada_diario($grupo['Group_ID'])">-->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_diario.php" />
    <input type="hidden" name="ID_PROFESOR_CURSO" ID="ID_PROFESOR_CURSO" value="<?php echo $profesor_curso->ID; ?>"/>
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
            <?php
                if ($grupo['Group_ID'] == PROFESOR)
                {
                echo '<div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>'; 
                echo '<div class="left boton_principal"><input type="submit" name="nuevo" value="Nueva entrada"/></div>';                   
                }
            ?>
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
                    <?php
                    $diario = $bd->consultar("select * from vw_diario_profesor_curso 
                        where ID_PROFESOR_CURSO ='" . $profesor_curso->ID . "'");

                    if ($diario) {
                        echo $util->pinta_entradas($diario,$grupo['Group_ID']);
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




