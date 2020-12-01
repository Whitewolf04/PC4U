<?php session_start(); ?>
<html>
    <head>
		<meta charset="UTF-8" />
		<title>PC4U</title>
		<link rel="stylesheet" type="text/css" href="../DIY_BuildPage/Buildpage.css" />
	</head>
    <body>
        <?php //require_once "menu.php" ?>
        <br>
        <div class="main">
            <div class="wrap">
                <div class="content">
                    <h1>Your Cart</h1>
                    <div id="cart">
                    <?php
                    $cart = array();
                    switch($_SESSION['prebuild']){
                        case "budget1":
                        break;
                        case "budget2":
                        break;
                        case "budget3":
                        break;
                        case "budget4":
                        break;
                        case "budget5":
                        break;
                        default:
                        break;
                    }
                    if(isset($_POST['puchaseNow'])){
                        $_SESSION['cart'] = $cart;
                    }
                    if(isset($_POST['purchaseLater'])){
                        $_SESSION['cart'] = $cart;
                        header("Location: Budget.php");
                    }
                    ?>
                    </div>
                    <form method="post" action="">
                    <input type="submit" name="purchaseNow" value="Purchase now">
                    <input type="submit" name="purchaseLater" value="Purchase later">
                    </form>
                </div>
                <div class="sidebar">
                </div>
            </div>
        </div>
        <footer>
            
        </footer>
    </body>
</html>