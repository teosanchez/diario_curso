<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Diario de clase</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/formly.css" type="text/css" />

        <link rel="stylesheet" media="screen" type="text/css" href="css/datepicker.css" />
        

        
        <!-- Scripts -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="js/formly.js"></script>
        <!-- jwysiwyg js -->                
        <script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="js/wysiwyg.image.js"></script>
        <script type="text/javascript" src="js/wysiwyg.link.js"></script>
        <script type="text/javascript" src="js/wysiwyg.table.js"></script>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function() { 
                    $('#wysiwyg').wysiwyg();
                });
            })(jQuery);
        </script>
        
        <!-- Form JQUERY -->
        <?php
        $cuerpo="";
        if (isset($_GET["cuerpo"])) {
            $cuerpo = $_GET["cuerpo"];
            $entidad=  explode("_", $cuerpo);
            
            if (count($entidad)>0){
                $cuerpo=$entidad[1];
            }
        }
        ?>
        
        <script>
        <!-- Form JQUERY -->
            $(document).ready(function()
            { 
                $('#MyForm').formly(); 
                var $resp=$('#navigation a[href*="<?php echo $cuerpo ?>"]');
                if ($resp.lenght<=0){
                    //alert("No encontrado");
                }
                else
                    {            
                        $resp.addClass('current');
                    }
        });
        </script>
        

        <script type="text/javascript" src="js/validaciones.js"></script>
        <?php header( 'Content-type: text/html; charset=iso-8859-1' );?>     

    </head>

    <body>
        <!-- Login User -->
        <?php include ("info_usuario.php"); ?>        

        <div id="wrapper" class="container_12 clearfix">

            <!-- Cabecera -->
            <?php include ("cabecera.php"); ?>

            <!-- Content -->

            <div id="featured" class="container_12 grid_12"> 
                

            <!--div id="featured" class="clearfix grid_12"-->

                <?php include ("cuerpo.php"); ?>    
            </div>

            <!-- Footer -->
            <?php include ("pie.php"); ?> 


        </div><!--end wrapper-->

    </body>
</html>
