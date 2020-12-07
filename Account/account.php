<!DOCTYPE html>
<?php //session_start(); ?>
<html>
    <head>
		<meta charset="UTF-8" />
		<title>PC4U</title>
        <link rel="stylesheet" type="text/css" href="../DIY_BuildPage/Buildpage.css" />
        <link rel="stylesheet" type="text/css" href="account.css" />
	</head>
    <body>
        <?php require_once "../Menu/nav.php" ?>
        <div class="main">
            <div class="wrap">
                <div class="sidebar">
                    <a href="changePassword.php">Change your password</a>
                </div>
                <div class="content">
                    <?php echo "<h3>". $_SESSION['signedin']. "'s profile</h3>"?>
                    <div>
                    <h3>Your recommendations</h3>
                    <?php //include "recommendations.php"?>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            
        </footer>
    </body>
</html>