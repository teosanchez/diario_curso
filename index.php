<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Diario de clase</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/formly.css" type="text/css" />

        <!-- Scripts -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="js/formly.js"></script>
        <!-- Form JQUERY -->
        <script>
            $(document).ready(function()
            { $('#MyForm').formly(); });
        </script>
             
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
            </div>

            <!-- Footer -->
            <?php include ("pie.php"); ?> 


        </div><!--end wrapper-->

    </body>
</html>