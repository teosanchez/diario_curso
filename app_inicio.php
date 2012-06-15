<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Diario de clase >> Inicio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/styles.css" />

        <!-- Scripts -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    
    </head>

    <body class="portfolio">
        
        <!-- Login User -->
        
        <div id="wrapper" class="container_12 clearfix">
            <!-- Text Logo -->
       

            <!-- Portfolio Items -->
            
            <!-- Section 1 -->

            <!-- Section 3 -->
            <div class="catagory_1 clearfix">
                <!-- Row 1 -->

                <div class="grid_12">
                    
                    <?php
                        include ("utilidadesIU.php");
                        $util = new utilidadesIU();

                        $grupo = $loggedInUser->groupID();
                        //echo $grupo['Group_Name']; 
                        //echo $grupo['Group_ID'];
                        
                        echo $util->pinta_inicio($grupo['Group_ID']);
                    ?>
               
                </div>
            </div>

            <div class="hr grid_12 clearfix">&nbsp;</div>

            <!-- Footer -->
          
        
            
        </div><!--end wrapper-->

    </body>
</html>
