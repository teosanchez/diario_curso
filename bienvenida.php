<?php
	require_once("userCake/models/config.php");
        
	if(!empty($_POST))
	{
		$errors = array();
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		//Perform some validation
		//Feel free to edit / change as required
		if($username == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
		}
		if($password == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
		}
		//End data validation
		if(count($errors) == 0)
		{
			//A security note here, never tell the user which credential was incorrect
			if(!usernameExists($username))
			{
				$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
			}
			else
			{
				$userdetails = fetchUserDetails($username);
			
				//See if the user's account is activation
				if($userdetails["Active"]==0)
				{
					$errors[] = lang("ACCOUNT_INACTIVE");
				}
				else
				{
					//Hash the password and use the salt from the database to compare the password.
					$entered_pass = generateHash($password,$userdetails["Password"]);

					if($entered_pass != $userdetails["Password"])
					{
						//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
						$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
					}
					else
					{
						//Passwords match! we're good to go'
						
						//Construct a new logged in user object
						//Transfer some db data to the session object
						$loggedInUser = new loggedInUser();
						$loggedInUser->email = $userdetails["Email"];
						$loggedInUser->user_id = $userdetails["User_ID"];
						$loggedInUser->hash_pw = $userdetails["Password"];
						$loggedInUser->display_username = $userdetails["Username"];
						$loggedInUser->clean_username = $userdetails["Username_Clean"];
						
						//Update last sign in
						$loggedInUser->updateLastSignIn();
		
						$_SESSION["userCakeUser"] = $loggedInUser;
						
						//Redirect to user account page
						header("Location: index.php?cuerpo=app_inicio.php");
						die();
					}
				}
			}
		}
	}
?> 

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/formly.css" />

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
        
            <!-- Control de Errores -->
            <?php
                if(!empty($_POST))
                    {
                        if(count($errors) > 0)
                    {
            ?>
            <div id="errors" class="formlyRequired formlyAlert" style="display: block;">
                <?php errorBlock($errors);} } ?>
            </div>
        <div id="wrapper" class="container_12 clearfix">

            <!-- Text Logo -->
            <h1 id="logo" class="grid_4">Diario de clase</h1>		
            <div class="hr grid_12 clearfix">&nbsp;</div>
            <!-- Portfolio Items -->
            
            <!-- Section 1 -->

            <!-- Section 3 -->
                <div class="grid_12">
                    <div class="login_form">                        
                        <form name="newUser" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="clear"></div>
                            <div>Usuario: <input type="text" name="username" /></div>
                            <div class="clear"></div>
                            <div>Contrase&ntilde;a: <input type="password" name="password" /></div>
                            <div class="clear"></div>
                            <div id="login_button"><input type="submit" value="Inciar Sesi&oacute;n" class="submit"/></div>
                            <div class="clear"></div>
                            <div id="login_a"><a href="login.html">&#191;Has olvidado tu Contrase&ntilde;a?</a></div>
                        </form>
                    </div>                     
                </div>        

            <div class="hr grid_12 clearfix">&nbsp;</div>

            <!-- Footer -->
            <p class="grid_12 footer clearfix">
                <span class="float"><b>&copy; Copyright</b> PHP-Tropical 2012 <b>Design by</b> Paco & Papita.</span>                
            </p>
        </div>

    </body> 