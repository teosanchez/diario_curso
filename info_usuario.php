<div id="topper" class="container_14">
    <div id="content_user" class="container_12"> 
        <form action="index.php" method="get">
            <div class="right img_user">
                <?php
                require_once("userCake/models/config.php");
                if (isUserLoggedIn())
                    {
                    echo '<a href="logout.php"><img border="0" src="images/logout.jpg" width="20" height="20"></a>';
                    }
                ?>
            </div>                    
            <div class="right" id="user"> 
                <a href="index.php?cuerpo=bienvenida.php">
                    <?php if (isUserLoggedIn())
                    {
                        echo "<span> Bienvenido, </span>";
                        echo '<a href="index.php?cuerpo=account.php">'.$loggedInUser->display_username.'</a>';                
                    }
                    ?>
                </a>
            </div>        
            <div class="clear"></div>
        </form>
    </div>
</div>