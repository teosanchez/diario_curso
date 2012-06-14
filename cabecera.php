<div class="clearfix">

    <?php 
	include("clase_bd.php");
	require_once("userCake/models/config.php");
	if (isUserLoggedIn())   //Si el usuario está identificado
        {
                $bd=new bd();
                $grupo=$loggedInUser->groupID();

                $fila1= array('texto'=>'Inicio',
                            'enlace'=>'index.php?cuerpo=app_inicio.php');
                $fila2= array('texto'=>'Administraci&oacute;n',
                            'enlace'=>'index.php?cuerpo=menu.php');
                $fila3= array('texto'=>'Diario',
                            'enlace'=>'index.php?cuerpo=rejilla_diario.php&origen=app_inicio.php');
                $fila4= array('texto'=>'Curso',
                            'enlace'=>'index.php?cuerpo=rejilla_curso.php');
                $fila5= array('texto'=>'Alumno_Curso',
                            'enlace'=>'index.php?cuerpo=rejilla_alumno_curso.php&origen=app_inicio.php');
                $fila6= array('texto'=>'Profesor_Curso',
                            'enlace'=>'index.php?cuerpo=rejilla_profesor_curso.php&origen=app_inicio.php');
                $fila7= array('texto'=>'Programa',
                            'enlace'=>'index.php?cuerpo=rejilla_modulo_curso.php&origen=app_inicio.php');

                if ($grupo["Group_ID"]==ADMINISTRADOR)    // Administración
                {
                    //$datos=$bd->consultar("SELECT * FROM `menu` where id_padre=0");
                    $datos= array($fila7,$fila6,$fila5,$fila4,$fila3,$fila2,$fila1);
                }

                if ($grupo["Group_ID"]==ALUMNO)
                {
                    $datos= array($fila7,$fila4,$fila3,$fila1);
                }

                if ($grupo["Group_ID"]==PROFESOR)
                {
                    $datos= array($fila7,$fila4,$fila3,$fila1);
                }

                if ($grupo["Group_ID"]==SECRETARIA)
                {
                    $datos= array($fila7,$fila6,$fila5,$fila4,$fila3,$fila2,$fila1);
                }        

                //print "<pre>";                    
                //print_r($datos);
                //print "</pre>";

                $salida="";
                if ($datos) //Pintar menu
                {
                     $salida='<ul id="navigation" class="grid_12 clearfix">';
                     foreach ($datos as $fila => $valor)
                     {
                            $salida.='<li><a href="'.$valor['enlace'].'">';
                            $salida.='<span class="meta">'.$valor['texto'].'</span>';
                            $salida.='<br/>'.$valor['texto'];
                            $salida.='</a></li>';                                    
                     }
                     $salida.="</ul>";
                }
                echo $salida;
        }
    ?>   

</div>

<div class="clearfix">
    <div class="hr_1 grid_12 clearfix">&nbsp;</div>
</div>

<div class="head_body">
    <!-- Text Logo -->    
    <div class="grid_9 alfa"><h1 id="logo_form">Diario de clase</h1></div>              
    <!-- Search Zone -->
    <div class="grid_3 omega">
        <form id="busqueda" action="index.php" method="get">
            <div class="right" id="lupa"><input name="lupa" type=image src="images/lupa.png" width="24" height="24"></div>
            <div class="right"><input type="text" name="busqueda" value="B&uacute;squeda..." /></div>        
            <div class="clear"></div>
        </form>
    </div>
    <div class="clear"></div>
</div>

<div class="clearfix">
    <div class="hr_1 grid_12 clearfix">&nbsp;</div>
</div>