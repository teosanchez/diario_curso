<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Diario de clase >> Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/styles.css" />

        <!-- Scripts -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <!--[if IE 6]>
        <script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
        <script>
          /* EXAMPLE */
          DD_belatedPNG.fix('.button');
          
          /* string argument can be any CSS selector */
          /* .png_bg example is unnecessary */
          /* change it to what suits you! */
        </script>
        <![endif]-->

    </head>

    <body class="portfolio">
       
        <div id="wrapper" class="container_12 clearfix">

            <!-- Text Logo -->
            <h1 id="logo" class="grid_4">Diario de clase</h1>		
           <!-- <div class="hr grid_12 clearfix">&nbsp;</div> -->

            <div class="catagory_1 clearfix">
          

                <div class="grid_12">
                    <div class="login_form">                        
                    <form action="index.php" method="get">
                    <input type="hidden" name="cuerpo" value="rejilla_diario.php" />
                         
                            <?php
                            include_once ("clase_bd.php");
                            include ("utilidadesIU.php");

                            $bd = new bd();
                            $util = new utilidadesIU();
                            $datosLista = $bd->consultar("select ESPECIALIDAD,ID from vw_curso_especialidad_profesor_curso");
                            echo $util->pinta_selection($datosLista, "ID_PROFESOR_CURSO", "ESPECIALIDAD");
                            ?>
                      
                            <div id="cancelar_seleccion_curso"><input type="reset" value="Cancelar" ></input></div>
                            <div id="seleccion_curso"><input name="seleccionar" type="submit" value="Seleccionar" ></input></div>
                        
                        </form>
                    </div>                     
                </div>
            </div>

            <div class="hr grid_12 clearfix">&nbsp;</div>

            <!-- Footer -->
            <p class="grid_12 footer clearfix">
                <span class="float"><b>&copy; Copyright</b> PHP-Tropical 2012 <b>Design by</b> Paco & Papita.</span>
                <a class="float right" href="#">top</a>
            </p>

        </div><!--end wrapper-->

    </body>
</html>
