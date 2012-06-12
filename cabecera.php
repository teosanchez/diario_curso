<div class="clearfix">
    <?php 
	include("clase_bd.php");
	require_once("userCake/models/config.php");
	if (isUserLoggedIn())   //Si el usuario está identificado
		{
			
			$bd=new bd();
			$grupo=$loggedInUser->groupID();
			if ($grupo["Group_ID"]==ADMINISTRADOR)    // Administración
				{
				$datos=$bd->consultar("SELECT * FROM `menu` where id_padre=0");
				}
			if ($grupo["Group_ID"]==ALUMNO)
				{
				$datos=$bd->consultar("SELECT * FROM `menu` where id_padre=0");
				}
                        if ($grupo["Group_ID"]==PROFESOR)
				{
				$datos=$bd->consultar("SELECT * FROM `menu` where id_padre=0");
				}
                        if ($grupo["Group_ID"]==SECRETARIA)
				{
				$datos=$bd->consultar("SELECT * FROM `menu` where id_padre=0");
				}        
			$salida="";
			if ($datos) //Pintar menu
			{
				 $salida='<ul id="navigation" class="grid_12 clearfix">';
				 while($row = mysql_fetch_array($datos))
				 {
                                    $salida.='<li><a href="'.$row['enlace'].'"><span class="meta">'.$row['texto'].'</span><br/>'.$row['texto'].'</a></li>';                                    
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