<?php

include("userCake/models/config.php");

//Log the user out
if (isUserLoggedIn())
    $loggedInUser->userLogOut();

if (!empty($websiteUrl)) 	// $websiteUrl está definida en settings.php dentro de userCake/models
{	
    $add_http = "";

    if (strpos($websiteUrl, "http://") === false) 
	{
        $add_http = "http://";
    }

    header("Location: " . $add_http . $websiteUrl);
    die();
} 
else 
{
    header("Location: http://" . $_SERVER['HTTP_HOST']);
    die();
}
?>


