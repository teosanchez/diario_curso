<?php
	require_once("userCake/models/config.php");
	//Prevent the user visiting the logged in page if he/she is not logged in
	if(!isUserLoggedIn()) { header("Location: index.php?cuerpo=bienvenida.php"); die(); }
?>
<div id="wrapper">

	<div id="content">            
        
        <div id="main">
        	<h1>Tu cuenta</h1>
        
        	<p>Bienvenido a Diario Clase <strong><?php echo $loggedInUser->display_username; ?></strong></p>

            <p>Yo soy un <strong><?php  $group = $loggedInUser->groupID(); echo $group['Group_Name']; ?></strong></p>
          
            
            <p>Tu te registraste el <?php echo date("l jS Y",$loggedInUser->signupTimeStamp()); ?> </p>
            <p>Tu contrase&ntilde;a es </p>
  		</div>
  
	</div>
</div>
