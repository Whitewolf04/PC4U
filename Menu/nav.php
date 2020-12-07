<?php
    session_start();

    unset($_SESSION['form']);					//Used in any form
    unset($_SESSION['state']);					//Used in any form
    unset($_SESSION['name']);					//Used in signup, signin
    unset($_SESSION['email']);					//Used in signup, signin, payment
    unset($_SESSION['password']);				//Used in signup, signin
    unset($_SESSION['errors']);					//Used in signup, signin
    unset($_SESSION['code']);					//Used in signup, signin
    unset($_SESSION['subject']);				//Used in signup, signin, payment
	unset($_SESSION['body']);					//Used in signup, signin, payment
	unset($_SESSION['CCnum']);					//Used in payment
	unset($_SESSION['CCname']);					//Used in payment
	unset($_SESSION['CCmm']);					//Used in payment
	unset($_SESSION['CCyy']);					//Used in payment
	unset($_SESSION['CCvv']);					//Used in payment
	unset($_SESSION['billingaddressl1']);		//Used in payment
	unset($_SESSION['billingaddressl2']);		//Used in payment
	unset($_SESSION['billingphone']);			//Used in payment
	unset($_SESSION['billingpostalcode']);		//Used in payment
	unset($_SESSION['billingcity']);			//Used in payment
	unset($_SESSION['billingprovince']);		//Used in payment
	unset($_SESSION['shippingaddressl1']);		//Used in payment
	unset($_SESSION['shippingaddressl2']);		//Used in payment
	unset($_SESSION['shippingphone']);			//Used in payment
	unset($_SESSION['shippingpostalcode']);		//Used in payment
	unset($_SESSION['shippingcity']);			//Used in payment
	unset($_SESSION['shippingprovince']);		//Used in payment
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../Menu/nav.css" />
        <script type="text/javascript" src="../Menu/nav.js"></script>
    </head>
    <body class="darkmode">
        <div id="nav">
            <ul id="buttonGroup">
                <li><img src="../placeholder.png" width="50" height="50" id="logo"/></li>
                <li><a class="menuButton" href="../DIY_BuildPage/DIY_Mainpage.php">Prebuilt</a></li>
                <li><a class="menuButton" href="../Newsletter/Newsletter.php">Promotions</a></li>
                <li><a class="menuButton" href="../DIY_BuildPage/DIY_GUIDE_PAGE.php">Guides</a></li>
            </ul>

            <?php
                if(!isset($_SESSION['signedin']))
                {
                    echo '
                        <ul>
							<li><a class="menuButton" href="../Menu/signin.php">Account</a></li>
							<li><a href="../Account/cart.php"><img id="shoppingCart" src="../Account/Images/placeholder.png" width="30px" height="30px" /></a></li>
                        </ul>
                    ';
                } else {
                    echo '
                        <ul>
                            <li class="dropdownMenu">
                                <a class="menuButton" href="#">Account</a>
                                <div class="dropdownOptions">
                                    <a class="menuButton" href="../Account/account.php">Profile</a>
                                    <a class="menuButton" href="">Orders?</a>
                                    <a class="menuButton" href="../Menu/navhandler.php?signout=true">Sign Out</a>
                                </div>
                            </li>
                            <li><a href="../Account/cart.php"><img id="shoppingCart" src="../Account/Images/placeholder.png" width="30px" height="30px" /></a></li>
                        </ul>
                    ';
                }
            ?>
        </div>
    </body>
</html>