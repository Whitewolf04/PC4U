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
                    $prebuild = "";
                    //checks if a prebuild was added to the cart
                    if($_SESSION['prebuild']!=null){
                        if(file_exists("prebuilds.txt")){
                            $stream = fopen("prebuilds.txt", "r");
                            while(($line=fgets($stream))!==false){
                                if($line===null){
                                    continue;
                                }
                                if(substr($line, 0, strpos($line, ':'))==$_SESSION['prebuild']){
                                    $prebuild = substr($line, strpos($line, '{'), strpos($line,'}')-strpos($line, '{'));
                                break;
                                }
                            }
                        }
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