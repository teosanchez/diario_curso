<?php
include ("clase_modulo_curso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd = new bd();
$util = new utilidadesIU();
$modulo_curso = new modulo_curso();
//print_r($_GET);
if (isset($_GET["ID_CURSO"])) 
    {
        $modulo_curso->ID_CURSO = ($_GET["ID_CURSO"]);
    }
    
$c="";
if (isset($_GET["c"])&&($_GET["c"]<>""))
{
    $c="nuevo"; // Se viene de form_curso con un curso nuevo (sin módulos)
}
?>
<!-- Titulo de pagina -->

    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Edici&oacute;n M&oacute;dulos 
                <span>del curso:  
                     <?php
                        $curso = $bd->consultarArray("select ESPECIALIDAD 
                                from vw_curso_especialidad 
                                where ID ='" . $modulo_curso->ID_CURSO . "'");
                        echo ($curso[0]["ESPECIALIDAD"]);
                     ?>
                </span></h2>
        </div>
        <div class="grid_3 omega">            
        </div> 
        <div class="clear"></div>
    </div>
    <!-- Fin Titulo de pÃ¡gina -->

    <form name="form_modulo_checkboxes" method="get" action="procesar_modulo_checkboxes.php"/>
        <input type="hidden" name="ID_CURSO" id="ID_CURSO" value="<?php echo $modulo_curso->ID_CURSO; ?>"/>
        <input type="hidden" name="ID" id="ID" value="<?php echo $modulo_curso->ID; ?>"/>
        <input type="hidden" name="c" id="c" value="<?php echo $c; ?>"/>
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
                <td><input type="button" 
                            onClick="parent.location=
                'index.php?cuerpo=procesar_modulo_checkboxes.php&Cancelar=Cancelar&ID_CURSO=<?php echo $modulo_curso->ID_CURSO;?>&c=<?php echo $c; ?>'"
                name="Cancelar" value="Cancelar"></td>
            </tr>
        </table>
    </form>
