<?php
	require_once("userCake/models/config.php");
	
	//Prevent the user visiting the logged in page if he/she is already logged in
	if(isUserLoggedIn()) { header('Location: index.php?cuerpo=account.php'); die(); }
?>

<?php
if(!empty($_POST))
{
		$errors = array();
		$email = trim($_POST["email"]);
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$confirm_pass = trim($_POST["passwordc"]);
	
		//Perform some validation
		//Feel free to edit / change as required
		
		if(minMaxRange(5,25,$username))
		{
			$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
		}
		if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
		{
			$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
		}
		else if($password != $confirm_pass)
		{
			$errors[] = lang("ACCOUNT_PASS_MISMATCH");
		}
		if(!isValidEmail($email))
		{
			$errors[] = lang("ACCOUNT_INVALID_EMAIL");
		}
		//End data validation
		if(count($errors) == 0)
		{	
				//Construct a user object
				$user = new User($username,$password,$email);
				
				//Checking this flag tells us whether there were any errors such as possible data duplication occured
				if(!$user->status)
				{
					if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
					if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
				}
				else
				{
					//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
					if(!$user->userCakeAddUser())
					{
						if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
						if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
					}
				}
		}
	}
?>
<div id="wrapper">
	<div id="content">	
    	    
        <div id="main">
			
            <h1>Registro</h1>

			<?php
            if(!empty($_POST))
            {
				if(count($errors) > 0)
				{
            ?>
            <div id="errors">
            <?php errorBlock($errors); ?>
            </div>     
            <?php
           		 } else {
          
            	$message = lang("ACCOUNT_REGISTRATION_COMPLETE_TYPE1");
        
            	if($emailActivation)
				{
               		 $message = lang("ACCOUNT_REGISTRATION_COMPLETE_TYPE2");
				}
        ?> 
        <div id="success">
        
           <p><?php echo $message ?></p>
           
        </div>
        <?php } }?>

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
                    <label>Confirmar:</label>
                    <input type="password" name="passwordc" />
                </p>
                
                <p>
                    <label>Email:</label>
                    <input type="text" name="email" />
                </p>
                
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Registrar"/>
                </p>
                
                </form>
            </div>

			<div class="clear"></div>
	 	</div>
	</div>
</div>
