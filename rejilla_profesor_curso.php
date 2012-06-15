<script>
    $(document).ready(function(){
        $("#Cursos").change(function(e){
            $("#lista_profesores").load("cargar_profesores.php",
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

$bd = new bd();

include ("utilidadesIU.php");
$util = new utilidadesIU();

$id_curso="";
$result="";

if(isset($_GET["ID"]))      // Venimos de form_curso.php con un curso elegido
{
    $id_curso = ($_GET["ID"]);
}

if (isset($_GET["ID_CURSO"])) 
{
    $id_curso = $_GET["ID_CURSO"];
}

$grupo = $loggedInUser->groupID();

?>

<!-- Titulo de pagina -->
<form action="index.php" id="formNuevo" method="get">
    <input type="hidden" name="cuerpo" value="form_profesor_curso2.php" />
    <input type="hidden" name="ID_CURSO" ID="ID_CURSO" value="<?php echo $id_curso; ?>"/>
    <input type="hidden" name="origen" id="origen" value="<?php echo $_GET["origen"]; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha">

             <h2 class="caption">Administraci&oacute;n de <span>Profesor-Curso
                 <?php
                        $curso = $bd->consultarArray("select ESPECIALIDAD 
                        from vw_curso_especialidad 
                        where ID ='" . $curso->ID . "'");
                        echo ($curso[0]["ESPECIALIDAD"]);
                    ?>
                 </span></h2>

             <h2 class="caption">Administraci&oacute;n de <span>profesores del curso:
                               
                <?php
                $datosLista = $bd->consultar("select ESPECIALIDAD,ID from vw_curso_especialidad ");
                echo $util->pinta_selection($datosLista, "Cursos", "ESPECIALIDAD", $id_curso);
                ?>
                        
            </span></h2>

        </div>
        <div class="grid_3 omega">
            <div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>  
            <div class="left boton_principal"><input type="button" onClick="validarListaCursos()" name="nuevo" value="A&ntilde;adir Profesor"/></div>                   
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
</form>
<!-- Fin Titulo de pÃ¡gina -->

<div id="lista_profesores">

    <?php
        $result = $bd->consultarArray("select ID,Profesor,`Tel&eacute;fono`,`Fecha Alta`,`Fecha Baja` 
                        from vw_nombre_profesor_curso_especialidad 
                        where ID_CURSO ='" . $id_curso . "'");
        if ($result)
        {
            $rejilla = new rejilla_xx($result, "index.php?cuerpo=form_profesor_curso.php&", "ID", "Profesor",$_GET["origen"],$grupo["Group_ID"]);
            echo $rejilla->pintar();
        }
    ?>
    
</div>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="<?php echo $_GET["origen"]; ?>" />
    <input type="hidden" name="ID" ID="ID" value="<?php echo $id_curso; ?>"/>
    <input type="submit" name="volver" value="Volver"/>
</form>