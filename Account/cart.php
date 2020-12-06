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
                    $cookie_cart = explode("~", $_COOKIE['cart']);
                    //print_r($cookie_cart);
                    $cart = array();
                    //checks if a prebuild was added to the cart
                    for($i = 0; $i < count($cookie_cart); $i++){
                        $title = substr($cookie_cart[$i], 0, strpos($cookie_cart[$i], " "));
                        if($title === "Prebuilt"){
                            $key = substr($cookie_cart[$i], strrpos($cookie_cart[$i], " ")+1, strlen($cookie_cart[$i])-strrpos($cookie_cart[$i], " "));
                            $prebuild = "";
                            $price = "";
                            //checks to see if prebuilds.txt file exists
                            if(file_exists("../Database/prebuilds.txt")){
                                $stream = fopen("../Database/prebuilds.txt", "r");
                                //reads through prebuilds.txt line by line
                                while(($line=fgets($stream))!==false){
                                    //if line is blank it skips it
                                    //if this line contains the value of prebuilt
                                    if(strpos($line, $key)!==false){
                                        //extracts prebuild components list from line
                                        $prebuild = substr($line, strpos($line, " "), strlen($line)-strpos($line, " "));
                                        //extracts price from line
                                        $price = substr($line, strrpos($line, "\t"), strlen($line)-strrpos($line, "\t"));
                                        //removes price from prebuild string
                                        $prebuild = substr($prebuild, 0, strrpos($prebuild,"\t"));
                                    }
                                }
                                fclose($stream);
                            }
                            //explode prebuild line into parts
                            $parts = explode(",",$prebuild);
                            //starts cart of with prebuild entry to indicate the start of a prebuild.
                            $cart["Prebuild ".$i] = "";
                            //adds to the cart the parts with blank price entries
                            for($x=0; $x<count($parts); $x++){
                                $cart[$parts[$x]] = "";
                            }
                            //adds the final price at the end of components list
                            $cart["Total price of prebuild ". $i] = trim($price);
                        }else if($title === "PCwizard"){
                            $key = substr_replace($cookie_cart[$i], "", 0, 9);
                            //print_r(json_decode($key));
                            //echo $key;
                            //checks to see if products.txt file exists
                            if(file_exists("../Database/products.txt")){
                                //gets all the pc parts from the pcWizard array
                                $pcParts = json_decode($key);
                                //goes through pc parts array
                                for($x = 0; $x < count($pcParts); $x++){
                                    $stream = fopen("../Database/products.txt", "r");
                                    //takes the title and productCode of pcpart (Ex: title: CPU AMD, productCode: 3100)
                                    $start = substr($pcParts[$x], 0, strpos($pcParts[$x], "\t"));
                                    $productCode = trim(substr($pcParts[$x], strpos($pcParts[$x], "\t")+1, strlen($pcParts[$x])-strpos($pcParts[$x], "\t")+1));
                                    $productCode .= "\t";
                                    echo $start." ".$productCode."<br>";
                                    //goes through the file
                                    while(($line=fgets($stream))!==false){
                                        //checks to see if it has the title in the line
                                        if(strpos($line, $start) !== false){
                                            //echo "hello";
                                            //checks to see if the line has a productCode
                                            if(preg_match('/^.*'.$productCode.'.*$/', $line)){
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
                                    fclose($stream);
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
                        //header("Location: Budget.php");
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