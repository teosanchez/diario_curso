<script>
    $(document).ready(function(){
        $("#Cursos").change(function(e){
            $("#lista_entradas").load("cargar_entradas.php",
            {ID_CURSO:  e.target.options[e.target.selectedIndex].value,
             ID_GRUPO: <?php echo $grupo["Group_ID"]; ?>}); 
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
//include ("clase_rejilla.php");
include_once ("clase_bd.php");
include ("clase_alumno.php");
include ("clase_alumno_curso.php");
include ("clase_profesor.php");
include ("clase_profesor_curso.php");
include ("utilidadesIU.php");

$bd = new bd();
$util = new utilidadesIU();
$alumno = new alumno();
$alumno_curso = new alumno_curso();
$profesor = new profesor();
$profesor_curso = new profesor_curso();

$id_curso = "";
$id_alumno = "";
$id_profesor = "";

$grupo = $loggedInUser->groupID();

$email = $loggedInUser->email;

if ($grupo["Group_ID"] == ALUMNO)
{
    $alumno->EMAIL = $email;
    $arrayEntidad = $bd->buscar($alumno);
    if ($arrayEntidad) 
    {
        $alumno->cargar($arrayEntidad[0]);
    }
    $id_alumno = $alumno->ID;
    
    $alumno_curso->ID_ALUMNO = $id_alumno;
    $arrayEntidad = $bd->buscar($alumno_curso);
    if ($arrayEntidad) 
    {
        $alumno_curso->cargar($arrayEntidad[0]);
    }
    $id_curso = $alumno_curso->ID_CURSO;
}

if ($grupo["Group_ID"] == PROFESOR)
{
    $profesor->EMAIL = $email;
    $arrayEntidad = $bd->buscar($profesor);
    if ($arrayEntidad) 
    {
        $profesor->cargar($arrayEntidad[0]);
    }
    $id_profesor = $profesor->ID;
    
    $profesor_curso->ID_PROFESOR = $id_profesor;
    $arrayEntidad = $bd->buscar($profesor_curso);
    if ($arrayEntidad) 
    {
        $profesor_curso->cargar($arrayEntidad[0]);
    }
    $id_curso = $profesor_curso->ID_CURSO;
}

if (isset($_GET["ID_CURSO"])) 
{
    $id_curso = $_GET["ID_CURSO"];
}

//echo ("id_curso: ".$id_curso."</br>");
//echo ("id_alumno: ".$id_alumno."</br>");
//echo ("id_profesor: ".$id_profesor."</br>");
//echo ("email: ".$email."</br>");
//echo ("grupo_id: ".$grupo["Group_ID"]."</br>");

?>

<!--<script>
    function muestraOculta(elemento){
        texto = document.getElementById("texto_mostrar_" + elemento);
        boton = document.getElementById("boton_mostrar_" + elemento);
        if(texto.style.display == "none"){
            texto.style.display = "block";
            //boton.innerHTML = "Ocultar contenidos";
        }else{
            texto.style.display = "none";
            //boton.innerHTML = "Mostrar contenidos";
        }
    }
</script>
-->
<!-- Titulo de pagina -->
<!--<form action="index.php" method="get" onsubmit="return entrada_diario($grupo['Group_ID'])">-->
<form action="index.php" id="formNuevo" method="get">
    <input type="hidden" name="cuerpo" value="form_diario.php" />
    <div class="titulo">
        <div class="grid_9 alpha"">
             <h2 class="caption">Entradas del curso: <span>  
                     
                <?php
                    if ($grupo["Group_ID"] == ADMINISTRADOR || $grupo["Group_ID"] == SECRETARIA)
                    {
                        $datosLista = $bd->consultar("select ESPECIALIDAD,ID 
                                from vw_curso_especialidad ");
                        echo $util->pinta_selection($datosLista, "Cursos", "ESPECIALIDAD", $id_curso);
                    }
                    
                    if ($grupo["Group_ID"] == ALUMNO)                   
                    {
                        $datosLista = $bd->consultar("select Curso,ID_CURSO 
                                from vw_nombre_alumno_nombre_especialidad 
                                where ID_ALUMNO ='" . $id_alumno . "'");                       
                        echo $util->pinta_selection_cursos($datosLista, "Cursos", "Curso", $id_curso);
                    }
                    
                    if ($grupo["Group_ID"] == PROFESOR)                   
                    {
                        $datosLista = $bd->consultar("select ESPECIALIDAD,ID_CURSO 
                                from vw_nombre_profesor_curso_especialidad 
                                where ID_PROFESOR ='" . $id_profesor . "'");                       
                        echo $util->pinta_selection_cursos($datosLista, "Cursos", "ESPECIALIDAD", $id_curso);
                    }
                    
                ?>
                     
            </span></h2>
        </div>
        <div class="grid_3 omega">
            <?php
                if ($grupo['Group_ID'] == PROFESOR)
                {
                echo '<div class="left boton_principal"><img alt="Nuevo" src="images/add.png"/></div>'; 
                echo '<div class="left boton_principal"><input type="button" onClick="validarListaCursos()" name="nuevo" value="A&ntilde;adir entrada"/></div>';                   
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
                        $diario = $bd->consultar("select * from vw_diario_profesor_curso 
                            where ID_CURSO ='" . $id_curso . "'".
                                'order by FECHA DESC');

                        if ($diario) 
                        {
                            echo $util->pinta_entradas($diario,$grupo['Group_ID']);
                        }
                    ?>
                        
                    </div>
                  
                </form> 
            </div>

            <div class="clear"></div>

    </div> 

        <div class="clear"></div>        


    <!-- Menu Lateral -->
    <div class="grid_3 omega">

    </div> 
    <div class="clear"></div>





