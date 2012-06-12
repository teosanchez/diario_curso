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
						header("Location: index.php?cuerpo=rejilla_diario.php");
						die();
					}
				}
			}
		}
	}
?>
<div id="main">
    <h1>Bienvenido a Diario de clases 1.0</h1>

    <p>Aqui va el mensaje de bienvenida del sistema</p>    

<?php 
	if (!isUserLoggedIn()) 
		{
		$group = $loggedInUser->groupID();
		echo $group['Group_Name']; 
		}
	 ?>

	 </strong></p>

	<div id="regbox">
		<form name="newUser" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<p>
			<label>Usuario:</label>
			<input type="text" name="username" />
		</p>

		<p>
                    <label>Contrase&ntilde;a:</label>
                    <input type="password" name="password" />
		</p>

		<p>
			<label>&nbsp;</label>
                        <input type="submit" value="Inciar Sesi&oacute;n" class="submit"/>
		</p>
                </form>			
        </div>	
</div>