<script>
    $(document).ready(function(){
        $("#Cursos").change(function(e){
            $("#lista_entradas").load("cargar_entradas.php",
            {ID_CURSO:  e.target.options[e.target.selectedIndex].value ,
            ID_GRUPO: <?php echo $grupo['Group_ID'];?>}); // El método load, carga lo que se le indica
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
    include ("clase_rejilla.php");
    include_once ("clase_bd.php");
    include ("clase_profesor_curso.php");
    include ("utilidadesIU.php");

    $bd = new bd();
    $util = new utilidadesIU();
    $profesor_curso = new profesor_curso();
    
    $id_profesor_curso="";
    $id_curso="";
    $id_profesor="";
    
    if (isset($_GET["ID_PROFESOR_CURSO"])) 
    {
        $profesor_curso->ID = ($_GET["ID_PROFESOR_CURSO"]);

        $arrayEntidad = $bd->buscar($profesor_curso);
        if ($arrayEntidad) 
        {
            $profesor_curso->cargar($arrayEntidad[0]);
        }
        $id_profesor_curso = $profesor_curso->ID;
        $id_profesor = $profesor_curso->ID_PROFESOR;;
        $id_curso = $profesor_curso->ID_CURSO;
    }

    $grupo = $loggedInUser->groupID();
    if ($grupo['Group_ID'] == PROFESOR)
    {
        include ("clase_profesor.php");
        $profesor = new profesor();
        $profesor->EMAIL = ($loggedInUser->email);

        $arrayEntidad = $bd->buscar($profesor);
        if ($arrayEntidad) 
        {
            $profesor->cargar($arrayEntidad[0]);
        }
        $id_profesor = $profesor->ID;
    }
?>

<!-- Titulo de pagina -->
<!--<form action="index.php" method="get" onsubmit="return entrada_diario($grupo['Group_ID'])">-->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_diario.php" />
    <input type="hidden" name="ID_PROFESOR_CURSO" ID="ID_PROFESOR_CURSO" value="<?php echo $id_profesor_curso; ?>"/>
    <input type="hidden" name="ID_PROFESOR" ID="ID_PROFESOR" value="<?php echo $id_profesor; ?>"/>
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Entradas del curso: <span>  
            <form>
                <?php
                    $datosLista = $bd->consultar("select ESPECIALIDAD,ID
                        from vw_curso_especialidad");
                    echo $util->pinta_selection($datosLista, "Cursos", "ESPECIALIDAD",$id_curso);
                ?>
            </form>
             
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

            <div id="lista_entradas">

            <?php
                if ($grupo['Group_ID'] == PROFESOR)
                {
                    $diario = $bd->consultar("select * from vw_diario_profesor_curso 
                        where ID_PROFESOR_CURSO ='" . $id_profesor_curso . "'".
                            'order by ID desc');
                }
                else
                {
                    $diario = $bd->consultar("select * from vw_diario_profesor_curso 
                        where ID_CURSO ='" . $id_curso . "'");
                }

            if ($diario) {
                echo $util->pinta_entradas($diario,$grupo['Group_ID']);
            }
            ?>
            </div>
        </form> 
    </div>

            <div class="clear"></div>
</div> 
        <div class="clear"></div>        
    </div>

    <!-- Menu Lateral -->
    <div class="grid_3 omega">

    </div> 
    <div class="clear"></div>
</div>




