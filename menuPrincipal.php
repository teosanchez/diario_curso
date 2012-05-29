
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->

<link rel="stylesheet" type="text/css" href="css/lksMenuSkin2.css" />

<div class="menu">
    <?php
   
    include("clase_bd.php");

			$bd=new bd();
            $datos = $bd->consultar("SELECT * FROM `menu` ");
        

            $salida = "";
            if ($datos) {

                $salida = "<ul>";
                while ($row = mysql_fetch_array($datos)) {

                    $salida.="<li><a href=\"" . $row["enlace"] . "\">" . $row['texto'] . "</a>";
                    /*$datos2 = $bd->consultar("SELECT * FROM `menu` ");
                    if ($datos2) {
                        $salida.="<ul>";
                        while ($row2 = mysql_fetch_array($datos2)) {
                            $salida.="<li><a href=\"" . $row2["enlace"] . "\">" . $row2['texto'] . "</a></li>";
                        }
                        $salida.="</ul></li>";
                    }
					*/
                }
                $salida.="</ul>";
            }//Fin datos
        
        echo $salida;
    
    ?>

</div>
