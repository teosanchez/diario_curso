<?php
include ("clase_modulo_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd;
$util = new utilidadesIU();
$modulo_curso = new modulo_curso();
print_r($_GET);
if (isset($_GET["ID_CURSO"])) 
    {
        $modulo_curso->ID_CURSO = ($_GET["ID_CURSO"]);
        $arrayEntidad = $bd->buscar($modulo_curso);
        if ($arrayEntidad) 
        {
            $modulo_curso->cargar($arrayEntidad[0]);
        }
    }

?>
<!-- Titulo de pagina -->

    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Edici&oacute;n M&oacute;dulos 
                <span>ID_CURSO = <?php echo($modulo_curso->ID_CURSO); ?></span></h2>
        </div>
        <div class="grid_3 omega">            
        </div> 
        <div class="clear"></div>
    </div>
    <!-- Fin Titulo de pÃ¡gina -->

    <form name="form_modulo_checkboxes" method="get" action="procesar_modulo_checkboxes.php"/>
        <input type="hidden" name="ID_CURSO" id="ID_CURSO" value="<?php echo $modulo_curso->ID_CURSO; ?>"/>
        <input type="hidden" name="ID" id="ID" value="<?php echo $modulo_curso->ID_CURSO; ?>"/>
        <table>
            <tr>
                <!--<td>M&oacute;dulos</td>-->
                <td>
                    <?php
                    $modulos = $bd->consultarArray("SELECT * FROM modulo ORDER BY NOMBRE asc");
                    $modulos_seleccionados = $bd->consultarArray("Select ID_MODULO 
                                            from modulo_curso where ID_CURSO='" . $modulo_curso->ID_CURSO . "'");
                    echo $util->pinta_checkboxes($modulos, $modulos_seleccionados, "Modulos_Seleccionados", "NOMBRE");
                    ?>
                </td>
            </tr>
            <tr>
                <td>        
                    <input type="submit" name="Enviar" value="Enviar"/>
                </td>
                <td>
                    <input type="submit" name="Cancelar" value="Cancelar"/>
                </td>
            </tr>
        </table>
    </form>
