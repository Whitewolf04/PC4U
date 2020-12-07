<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8" />
		<title>PC4U</title>
        <link rel="stylesheet" type="text/css" href="../DIY_BuildPage/Buildpage.css" />
        <link rel="stylesheet" type="text/css" href="account.css" />
		<link rel="icon" href="../pc_icon.png">
	</head>
    <body>
        <?php require_once "../Menu/nav.php"; $_SESSION['redirect'] = "../Account/account.php"; ?>
        <div class="main">
            <div class="wrap">
                <div class="sidebar">
                    <a href="changePassword.php">Change your password</a>
                </div>
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