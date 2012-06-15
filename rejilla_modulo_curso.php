<script>
    $(document).ready(function(){
        $("#Cursos").change(function(e){
            $("#lista_modulos").load("cargar_modulos.php",
            {ID_CURSO:  e.target.options[e.target.selectedIndex].value,
             ID_GRUPO: <?php echo $grupo["Group_ID"]; ?> }); 
         // El método load, carga lo que se le indica
        });
    });
    $.ajaxSetup({
    'beforeSend' : function(xhr) {
    try{
    xhr.overrideMimeType('text/html; charset=iso-8859-1');
    }
    catch(e){
        
    }
    }});
</script>

<?php
include ("clase_rejilla_xx.php");
include_once ("clase_bd.php");
include ("clase_curso.php");

$bd = new bd();
$curso = new curso();

include ("utilidadesIU.php");
$util = new utilidadesIU();

$id_curso="";
$result="";

if (isset($_GET["ID"]))
{
    $curso->ID = ($_GET["ID"]);
    $id_curso = $curso->ID;
    $result = $bd->consultarArray("select ID,`M&oacute;dulo`,Horas 
                    from vw_modulo_curso_2
                    where ID_CURSO ='" . $curso->ID . "'");
}

$grupo = $loggedInUser->groupID();
//echo ("grupo_id: ".$grupo["Group_ID"]);

?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="modulo_checkboxes.php" />
    <input type="hidden" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $id_curso; ?>"/>
    <input type="hidden" name="origen" ID="origen" value="<?php echo $_GET["origen"]; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha"">
            <?php
                if ($grupo['Group_ID'] == PROFESOR || $grupo['Group_ID'] == ALUMNO)
                {
                     echo '<h2 class="caption">Listado de <span>m&oacute;dulos del curso:';
                }
                else
                {
                    echo '<h2 class="caption">Administraci&oacute;n de <span>m&oacute;dulos del curso:';
                }
                                     
                $datosLista = $bd->consultar("select ESPECIALIDAD,ID from vw_curso_especialidad ");
                echo $util->pinta_selection($datosLista, "Cursos", "ESPECIALIDAD", $id_curso);

            ?>
            </span></h2>
        </div>
        <div class="grid_3 omega">
            <?php
                if ($grupo['Group_ID'] == ADMINISTRADOR || $grupo['Group_ID'] == SECRETARIA)
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
    <!-- Fin Titulo de pÃ¡gina -->
    
<div id="lista_modulos">

    <?php
        if ($result) 
        {
            $rejilla = new rejilla_xx($result, "index.php?cuerpo=form_modulo_curso.php&", "ID", "ESPECIALIDAD",$_GET["origen"],$grupo['Group_ID']);
            echo $rejilla->pintar();
        }

    ?>
    
</div>    
    
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="<?php echo $_GET["origen"]; ?>"/>
    <input type="hidden" name="ID" ID="ID" value="<?php echo $id_curso; ?>"/>
    <input type="submit" name="volver" value="Volver"/>
</form>