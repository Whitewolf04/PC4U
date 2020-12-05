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
                    if(isset($_SESSION['prebuilt'])){
                        if(file_exists("../Database/prebuilds.txt")){
                            $stream = fopen("../Database/prebuilds.txt", "r");
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
                    if(isset($_SESSION['pcWizard'])){
                        // $pcParts = $_SESSION['pcWizard'];
                        // for($x = 0; $x < count($pcParts); $x++){
                        //     echo $pcParts[$x]."<br>";
                        // }
                        if(file_exists("../Database/products.txt")){
                            $stream = fopen("../Database/products.txt", "r");
                            $pcParts = $_SESSION['pcWizard'];
                            for($x = 0; $x < count($pcParts); $x++){
                                //echo $pcParts[$x]."<br>";
                                $title = substr($pcParts[$x], 0, strpos($pcParts[$x], "\t"));
                                $productCode = trim(substr($pcParts[$x], strpos($pcParts[$x], "\t")+1, strlen($pcParts[$x])-strpos($pcParts[$x], "\t")));
                                //echo $title." ".$productCode."<br>";
                                while(($line=fgets($stream))!==false){
                                    if(strpos($line, $title) !== false){
                                        if(strpos($line, $productCode)!== false){
                                            $line = trim(substr($line, strpos($line, $productCode) + strlen($productCode), strlen($line)-strpos($line, $productCode)+ strlen($productCode)));
                                            $name = trim(substr($line, 0, strpos($line, "\t")));
                                            $line = trim(substr($line, strpos($line, $name) + strlen($name), strlen($line)-strpos($line, $name) + strlen($name)));
                                            $price = trim(substr($line, 0, strpos($line, "\t")));
                                            $cart[$name] = $price;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    print_r($cart);
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