<html>
    <head>
		<meta charset="UTF-8" />
		<title>PC4U</title>
		<link rel="stylesheet" type="text/css" href="../DIY_BuildPage/Buildpage.css" />
	</head>
    <body>
        <?php require_once "../Menu/nav.php" ?>
        <br>
        <div class="main">
            <div class="wrap">
                <div class="content">
                    <h1>Your Cart</h1>
                    <div id="cart">
                    <?php
                    $cart = array();
                    //checks if a prebuild was added to the cart
                    if(isset($_SESSION['prebuilt'])){
                        $prebuild = "";
                        $price = "";
                        //checks to see if prebuilds.txt file exists
                        if(file_exists("../Database/prebuilds.txt")){
                            $stream = fopen("../Database/prebuilds.txt", "r");
                            //reads through prebuilds.txt line by line
                            while(($line=fgets($stream))!==false){
                                //if line is blank it skips it
                                if($line===""){
                                    continue;
                                }
                                //if this line contains the value of prebuilt
                                if(strpos($line, $_SESSION['prebuilt'])!==false){
                                    //extracts prebuild components list from line
                                    $prebuild = substr($line, strpos($line, " "), strlen($line)-strpos($line, " "));
                                    //extracts price from line
                                    $price = substr($line, strrpos($line, "\t"), strlen($line)-strrpos($line, "\t"));
                                    //removes price from prebuild string
                                    $prebuild = substr($prebuild, 0, strrpos($prebuild,"\t"));
                                break;
                                }
                            }
                        }
                        //explode prebuild line into parts
                        $parts = explode(",",$prebuild);
                        //starts cart of with prebuild entry to indicate the start of a prebuild.
                        $cart["Prebuild"] = "";
                        //adds to the cart the parts with blank price entries
                        for($i=0; $i<count($parts); $i++){
                            $cart[$parts[$i]] = "";
                        }
                        //adds the final price at the end of components list
                        $cart["Total price of prebuild"] = trim($price);
                    }
                    //checks to see if pcWizard stuff 
                    if(isset($_SESSION['pcWizard'])){
                        //checks to see if products.txt file exists
                        if(file_exists("../Database/products.txt")){
                            $stream = fopen("../Database/products.txt", "r");
                            //gets all the pc parts from the pcWizard array
                            $pcParts = $_SESSION['pcWizard'];
                            //goes through pc parts array
                            for($x = 0; $x < count($pcParts); $x++){
                                //takes the title and productCode of pcpart (Ex: title: CPU AMD, productCode: 3100)
                                $title = substr($pcParts[$x], 0, strpos($pcParts[$x], "\t"));
                                $productCode = trim(substr($pcParts[$x], strpos($pcParts[$x], "\t")+1, strlen($pcParts[$x])-strpos($pcParts[$x], "\t")));
                                //goes through the file
                                while(($line=fgets($stream))!==false){
                                    //checks to see if it has the title in the line
                                    if(strpos($line, $title) !== false){
                                        //checks to see if the line has a productCode
                                        if(strpos($line, $productCode)!== false){
                                            //removes all of the line before the product code
                                            $line = trim(substr($line, strpos($line, $productCode) + strlen($productCode), strlen($line)-strpos($line, $productCode)+ strlen($productCode)));
                                            //extracts the name from the line a \t after the product code
                                            $name = trim(substr($line, 0, strpos($line, "\t")));
                                            //removes the name from the line
                                            $line = trim(substr($line, strpos($line, $name) + strlen($name), strlen($line)-strpos($line, $name) + strlen($name)));
                                            //extracts the price from the line
                                            $price = trim(substr($line, 0, strpos($line, "\t")));
                                            //adds this as an element to the cart
                                            $cart[$name] = $price;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //print_r($cart);
                    if(isset($_POST['puchaseNow'])){
                        $_SESSION['cart'] = $cart;
                    }
                    if(isset($_POST['purchaseLater'])){
                        $_SESSION['cart'] = $cart;
                        header("Location: Budget.php");
                    }
                    ?>
                    <table border = "1">
                        <?php
                        //creates table elements for the parts and prebuilds
                        $totalPrice = 0;
                        foreach($cart as $name=>$price){
                            if($price!==""){
                                echo "<tr><td>".$name."</td><td>".$price."$</td></tr>";
                                $totalPrice += $price;
                            }else{
                                echo "<tr><td>".$name."</td><td>".$price."</td></tr>";
                            }
                        }
                        echo "<tr><td>Total Price : </td><td>".$totalPrice."$</td></tr>";
                        ?>
                    </table>
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