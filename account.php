<div id="wrapper">

	<div id="content">            
        
            <div id="main">
                <h1>Tu cuenta</h1>

                <p>Bienvenido a Diario Clase <strong><?php echo $loggedInUser->display_username; ?></strong></p>

                <p>Yo soy un <strong><?php  $group = $loggedInUser->groupID(); echo $group['Group_Name']; ?></strong></p>

                <p>Tu te registraste el <?php echo date("l jS Y",$loggedInUser->signupTimeStamp()); ?> </p>
                
                <h4>Cambiar contrase&ntilde;a</h4>
                
                
                <?php
                if (isset($_GET['msj']) && $_GET['msj'] != "")
                    {//Incluir en Generador
                    echo '<div id="errors" class="formlyRequired formlyAlert" style="display: block;">';
                    echo $_GET['msj'];
                    echo '</div>';
                    }                               
                ?>
                
                </div>                            
                    <div id="regbox">
                        <form name="changePass" action="procesar_cambio_clave.php" method="post">

                            <div><br/>Contrase&ntilde;a:<br/><br/><input type="password" name="password" /></div>

                            <div><br/>Nueva contrase&ntilde;a:<br/><br/><input type="password" name="passwordc" /></div>

                            <div><br/>Confirmar contrase&ntilde;a:<br/><br/><input type="password" name="passwordcheck" /></div>

                            <div><input type="submit" value="Actualizar contrase&ntilde;a" class="submit" /></div>                                        
                        </form>                               
                    </div>                                            
        </div>
    </div>  
