<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8" />
		<title>PC4U</title>
        <link rel="stylesheet" type="text/css" href="account.css" />
		<link rel="icon" href="../pc_icon.png">
	</head>
    <body>
		<?php
			require_once "../Menu/nav.php";
			if(!isset($_SESSION['signedin']))
			{
				header("Location: ../Menu/signin.php");
				exit;
			}
		?>
        <div class="main">
            <div class="wrap">
				<div class="outer"><div class="sidebar">
                    <a href="changePassword.php">Change your password</a>
                </div></div>
                <div class="content">
                    <?php echo "<h3>". $_SESSION['signedin']. "'s profile</h3>"?>
                    <h3>Your Order History</h3>
                    <?php
                    include "orderHistory.php";
                    ?>
                </div>
            </div>
        </div>
        <footer>
            
        </footer>
    </body>
</html>