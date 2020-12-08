<html>
    <head>
		<meta charset="UTF-8" />
		<title>PC4U</title>
        <link rel="stylesheet" type="text/css" href="cart.css" />
		<script type="text/javascript" src="cart.js"></script>
		<link rel="icon" href="../pc_icon.png">
	</head>
    <body>
        <?php require_once "../Menu/nav.php"; $_SESSION['redirect'] = "../Account/cart.php"; ?>
		<h1>Your Cart</h1>
		<div id="cart">
		<?php
		if(!isset($_COOKIE['cart'])){
			setcookie("cart","~", false, "/");
			header("Location: ".$_SESSION['redirect']);
			exit;
		}else{
			$cookievalue = $_COOKIE['cart'];
			setcookie("cart", $cookievalue, false, "/");
		}
		$cookie_cart = explode("~", $_COOKIE['cart']);
		//print_r($cookie_cart);
		$cart = array();
		$_SESSION['cart'] = array();
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
							$_SESSION['cart'][$prebuild." ".$i] = $price;
						}
					}
					fclose($stream);
				}
				//explode prebuild line into parts
				$parts = explode(",",$prebuild);
				//starts cart of with prebuild entry to indicate the start of a prebuild.
				$cart["Prebuild #".$i] = "";
				//adds to the cart the parts with blank price entries
				for($x=0; $x<count($parts); $x++){
					$cart[$parts[$x]." <input type=hidden value=$i>"] = "";
				}
				//adds the final price at the end of components list
				$cart["Total price of prebuild ". $i."<form method='POST' action=''><input type=hidden name=item value='". $title." ".$key."~'><input type=submit name=remove value='Remove Item'></form>"] = trim($price);
			}else if($title === "PCwizard"){
				//takes out the title from the key
				$key = substr_replace($cookie_cart[$i], "", 0, 9);
				$ramSpeed = substr($key, strpos($key, "|"), strlen($key)-strpos($key, "|"));
				$key = str_replace($ramSpeed, "", $key);
				//print_r(json_decode($key));
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
						//echo $start." ".$productCode."<br>";
						//goes through the file
						while(($line=fgets($stream))!==false){
							//checks to see if it has the title in the line
							if(strpos($line, $start) !== false){
								//echo "hello";
								//checks to see if the line has a productCode
								if(preg_match('/^.*'.$productCode.'.*$/i', $line)){
									//removes all of the line before the product code
									$line = trim(substr($line, strpos($line, $productCode) + strlen($productCode), strlen($line)-strpos($line, $productCode)+ strlen($productCode)));
									//extracts the name from the line a \t after the product code
									$name = trim(substr($line, 0, strpos($line, "\t")));
									//removes the name from the line
									$line = trim(substr($line, strpos($line, $name) + strlen($name), strlen($line)-strpos($line, $name) + strlen($name)));
									//extracts the price from the line
									//checks to see if the price is the last element of the line
									$possiblePrice = trim(substr($line, 0, strpos($line, "\t")));
									$price = ($possiblePrice==="") ? trim($line) : $possiblePrice;
									//adds this as an element to the cart
									if($start === "Ram"){
										$ramSpeed = substr($ramSpeed, 1, strlen($ramSpeed));
										$name = "RAM ". $name. " ".$ramSpeed;
									}else if($start=== "STORAGE M2NvmeSsd" || $start === "STORAGE sataSsd"){
										$name = ($start=== "STORAGE M2NvmeSsd") ? "M.2 NVMe SSD ".$name : "Sata SSD ". $name;
									}else if($start==="POWER SUPPLY EVGA"||$start==="POWER SUPPLY Corsair"||$start==="POWER SUPPLY CoolerMaster"||$start==="POWER SUPPLY ThermalTake"){
										$brand = str_replace("POWER SUPPLY", "", $start);
										$name = $brand. " ". $name;
									}
									$cart[$name. "<form method='POST' action=''><input type=hidden name=item value='\"".$start."\\\\t".trim($productCode)."\"' id='".$i.$productCode."'><input type=submit name=remove value='Remove Item'></form>"] = $price;
									$_SESSION['cart'][$name] = $price;
								}
							}
						}
						fclose($stream);
					}
				}                            
			}
		}
		//print_r($cart);
		if(isset($_POST['remove'])){
			$cookievalue = $_COOKIE['cart'];
			$itemvalue = '/,?'.$_POST['item'].',?/';
			$cookievalue = preg_replace($itemvalue, "", $cookievalue, 1);
			setcookie('cart', $cookievalue, false, "/");
			//echo $itemvalue;
			header("Location: cart.php");
		}
		?>
		<table border = "1">
			<?php
			//creates table elements for the parts and prebuilds
			$_SESSION['subtotal'] = 0;
			foreach($cart as $name=>$price){
				if($price!==""){
					if(strpos($name, "Total price")!==false){
						echo "<tr><td>".$name."</td><td>".$price."$</td></tr>";
					}else{
						echo "<tr><td class=individualparts>".$name."</td><td class=individualparts>".$price."$</td></tr>";
					}
					$_SESSION['subtotal'] += $price;
				}else{
					echo "<tr><td class=prebuild>".$name."</td><td class=prebuild>".$price."</td></tr>";
				}
			}
			echo "<tr><td>Total Price : </td><td>".$_SESSION['subtotal']."$</td></tr>";
			?>
		</table>
		</div>
		<form id="cartform" method="post" action="payment.php">
			<input type="hidden" id="subtotal" name="subtotal" value="<?php echo $_SESSION['subtotal']; ?>">
			<input type="button" id="purchase" name="purchase" class="button" value="Purchase Now">
		</form>
    </body>
</html>