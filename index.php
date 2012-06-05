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
        <script type="text/javascript" src="js/datepicker.js"></script>
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
            $(document).ready(function()
            { 
                $('#MyForm').formly(); 
                var $resp=$('#navigation a[href*="<?php echo $cuerpo ?>"]');
                if ($resp.lenght<=0){
                    alert("No encontrado");
                }
                else
                    {            
                        $resp.addClass('current');
                    }
        });
        </script>
        
        	
        <?php header( 'Content-type: text/html; charset=iso-8859-15' );?>     
    </head>

    <body>
        <!-- Login User -->
        <?php include ("login_user.php"); ?>  

        <div id="wrapper" class="container_12 clearfix">

            <!-- Cabecera -->
            <?php include ("cabecera.php"); ?>

            <!-- Content -->
            <div id="featured" class="clearfix grid_12">
                <?php include ("cuerpo.php"); ?> 
                <script>
                    $('input').DatePicker(click);
                </script>
            </div>

            <!-- Footer -->
            <?php include ("pie.php"); ?> 


        </div><!--end wrapper-->

    </body>
</html>
