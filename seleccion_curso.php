<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">

      
    <body class="portfolio">
       
        <div id="wrapper" class="container_12 clearfix">

            <!-- Text Logo -->
            <h2 id="logo" class="grid_4">Seleccione un curso</h2>		
           <!-- <div class="hr grid_12 clearfix">&nbsp;</div> -->

            <div class="catagory_1 clearfix">
          

                <div class="grid_12">
                    <div id="formulario_seleccion">                        
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

  
        </div><!--end wrapper-->

    </body>
</html>
