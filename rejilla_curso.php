<?php
    include ("clase_rejilla_xx.php");
    include_once ("clase_bd.php");

    $bd = new bd();
    $result = $bd->consultarArray("select ID,Familia,Especialidad,Horas,`Fecha Inicio`,`Fecha Fin`
                                    from vw_curso_especialidad_nivel_estudios_familia");

    $grupo = $loggedInUser->groupID();
?>

<!-- Titulo de pagina -->
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_curso.php" />
    <div class="titulo">
        <div class="grid_9 alpha"">
            <?php
                if ($grupo['Group_ID'] == PROFESOR || $grupo['Group_ID'] == ALUMNO)
                {
                     echo '<h2 class="caption">Listado de <span>cursos</span></h2>';                    
                }
                else
                {
                    echo '<h2 class="caption">Administraci&oacute;n de <span>cursos</span></h2>';
                }
            ?>
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
<!-- Fin Titulo de pÃƒÂ¡gina -->

    <?php
    if(isset($_GET['mensaje_error']))
    {
        echo "<div>".$_GET['mensaje_error']."</div>";
    }
    if ($result) {
        $rejilla = new rejilla_xx($result, "index.php?cuerpo=form_curso.php&", "ID", "ESPECIALIDAD","",$grupo['Group_ID']);
        echo $rejilla->pintar();
    }
    
    if ($grupo['Group_ID'] == ADMINISTRADOR || $grupo['Group_ID'] == SECRETARIA)
    {
        echo '<form action="index.php" method="get">';
        echo '<input type="hidden" name="cuerpo" value="form_curso.php" />';
        echo '<input type="submit" name="nuevo" value="Nuevo"/>';
        echo '</form>';
    }
    ?>
            
