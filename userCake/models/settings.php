<?php
	include_once ("constantes.php");
	//General Settings
	//--------------------------------------------------------------------------
	//Database Information
	$dbtype = "mysql"; 
	$db_host = SERVIDOR;
	$db_user = USUARIO;
	$db_pass = PASSWORD;
	$db_name = BD;
	$db_port = "3306";
	$db_table_prefix = "";

	$language = "en";
	
	//Generic website variables
	$websiteName = PAGINA_WEB;
	$websiteUrl = URL; //including trailing slash

	//Do you wish UserCake to send out emails for confirmation of registration?
	//We recommend this be set to true to prevent spam bots.
	//False = instant activation
	//If this variable is falses the resend-activation file not work.
	$emailActivation = false;

	//In hours, how long before UserCake will allow a user to request another account activation email
	//Set to 0 to remove threshold
	$resend_activation_threshold = 1;
	
	//Tagged onto our outgoing emails
	$emailAddress = "noreply@iloveUserCake.com";
	
	//Date format used on email's
	$emailDate = date("l \\t\h\e jS");
	
	//Directory where txt files are stored for the email templates.
	$mail_templates_dir = "models/mail-templates/";
	
	$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
	$default_replace = array($websiteName,$websiteUrl,$emailDate);
	
	//Display explicit error messages?
	$debug_mode = false;
	
	//---------------------------------------------------------------------------
?>