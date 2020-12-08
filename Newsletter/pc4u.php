<!DOCTYPE html>
<html lang="en">
    <head>
		<title> PC4U </title>
		<link rel="stylesheet" type="text/css" href="../Newsletter/Newsletter.css" />
		<link rel="icon" href="../pc_icon.png">
        <meta charset="utf-8" />
	</head>
	<body>
		<?php require_once "../Menu/nav.php"; $_SESSION['redirect'] = "../Newsletter/pc4u.php"; 
		// Veryfiying if signed in 
		if(isset($_SESSION['signedin'])){
			$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
			$ordersFile = fopen("../Database/orders.txt", "r") or die("Unable to open orders.txt file!");
			$orderedbefore = true;
			while(!feof($ordersFile)){
				$oline=fgets($ordersFile);
				$oinfo = preg_split("/[\t]/", $oline);
				if($oinfo[0] == $_SESSION['signedin']){
					$orderedbefore = false;
				}
			}
			if($orderedbefore){
				$count = 1;
				 while(!feof($productsFile)){
					$line=fgets($productsFile);
					$product = preg_split("/[\t]/", $line);
					if(preg_match("/[\/\/]/",$line))
					{
						continue;
					}
					if(preg_match("/^(CPU)/i",$line))
					{   
						if($count==1){
							echo "<h2 style='text-align:center;'>CPU for you</h2>";
						}
						echo "<p class='recs'>".$product[2]."</p>";
						if($count>1){
							break;
						}
						$count++;
					}
				} // End of while 1 
				echo "<img class='imgrec2'  src='../Newsletter/Images/cpuintel.jfif' alt='Image  of GPU'>";
				fseek($productsFile , 0);
				$count=1;
				while(!feof($productsFile)){
					$line=fgets($productsFile);
					$product = preg_split("/[\t]/", $line);
					if(preg_match("/[\/\/]/",$line))
					{
						continue;
					}
					if(preg_match("/^(MOTHERBOARD)/i",$line))
					{   
						if($count==1){
							echo "<h2 style='text-align:center;'>Motherboard for you</h2>";
						}
						if($count>3){
							echo "<p class='recs'>".$product[2]."</p>";
						}
						if($count>5){
							break;
						}
						$count++;
					}
				} // End of while 2
				echo "<img class='imgrec2' src='../Newsletter/Images/motherboard.jfif' alt='Image  of CPU'>";
			} else { // The are orders 
				$ordersFile = fopen("../Database/orders.txt", "r") or die("Unable to open orders.txt file!");
				$fline=fgets($ordersFile);
				$info = preg_split("/[\t]/", $fline);
				if($info[0] == $_SESSION['signedin']){
					$foundcpu = preg_grep("/(CPU)/i", $info);
					$foundgpu = preg_grep("/(GPU)/i", $info);
					$foundmother = preg_grep("/(Motherboard)/i", $info);
					$foundcase = preg_grep("/(Case)/i", $info);
					$foundpower = preg_grep("/(Power)/i", $info);
					$foundstorge = preg_grep("/(Memory)/i", $info);
					if($foundgpu != false){
						$fountnone = false;
						echo "<h2 style='text-align:center;'>CPU for you</h2>";
						fseek($productsFile , 0);
						$count = 1;
						while(!feof($productsFile)){
							$line=fgets($productsFile);
							$product = preg_split("/[\t]/", $line);
							if(preg_match("/[\/\/]/",$line))
							{
								continue;
							}
							else if(preg_match("/^(CPU)/i",$line))
							{
								$count++;
								array_push($product, $line);
								echo "<p class='recs'>".$product[2]."</p>";
								echo "<p class='recs'>".$product[5]."</p>";
								if($count>4){
									break;
								}
							}
						}
						echo "<img class='imgrec'  src='../Newsletter/Images/cpuintel.jfif' alt='Image  of GPU'>";
					}
					if($foundmother != false){
						echo "<h2 style='text-align:center;'>Motherboard for you</h2>";
						fseek($productsFile , 0);
						$count2 = 1;
						while(!feof($productsFile)){
							$line=fgets($productsFile);
							$product = preg_split("/[\t]/", $line);
							if(preg_match("/[\/\/]/",$line))
							{
								continue;
							}
							else if(preg_match("/^(MOTHERBOARD)/i",$line))
							{ 
								$count2++;
								array_push($product, $line);
								echo "<p class='recs'>".$product[2]."</p>";
								if($count2>4){
									break;
								}
							}
						}
						echo "<img class='imgrec' src='../Newsletter/Images/motherboard.jfif' alt='Image  of CPU'>";
					}
					if($foundgpu != false){
						echo "<h2 style='text-align:center;'>GPU for you</h2>";
						fseek($productsFile , 0);
						$count3 = 1;
						while(!feof($productsFile)){
							$line=fgets($productsFile);
							$product = preg_split("/[\t]/", $line);
							if(preg_match("/[\/\/]/",$line))
							{
								continue;
							}
							else if(preg_match("/^(GPU)/i",$line))
							{
								$count3++;
								array_push($product, $line);
								echo "<p class='recs'>".$product[2]."</p>";
								echo "<p class='recs'>".$product[5]."</p>";
								if($count3>4){
									break;
								}
							}
						}
						echo "<img class='imgrec' src='../Newsletter/Images/gpunvidia.jpg' alt='Image  of GPU'>";
					}
					if($foundcase != false){
						echo "<h2 style='text-align:center;'>Case for you</h2>";
						$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
						$count4 = 1;
						while(!feof($productsFile)){
							$line=fgets($productsFile);
							$product = preg_split("/[\t]/", $line);
							if(preg_match("/[\/\/]/",$line))
							{
								continue;
							}
							else if(preg_match("/^(CASE)/i",$line))
							{
								$count4++;
								array_push($product, $line);
								echo "<p class='recs'>".$product[2]."</p>";
								echo "<p class='recs'>".$product[5]."</p>";
								if($count4>4){
									break;
								}
							}
						}
						echo "<img class='imgrec' src='../Newsletter/Images/case.jfif' alt='Image  of a case'>";
					}
					if($foundcase != false){
						echo "<h2 style='text-align:center;'>Power for you</h2>";
						$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
						$count5 = 1;
						while(!feof($productsFile)){
							$line=fgets($productsFile);
							$product = preg_split("/[\t]/", $line);
							if(preg_match("/[\/\/]/",$line))
							{
								continue;
							}
							else if(preg_match("/^(POWER SUPPLY)/i",$line))
							{
								$count5++;
								array_push($product, $line);
								$power = ucwords(strtolower($product[0]));
								echo "<p class='recs'>".$power." ".$product[2]."</p>";
								if($count5>2){
									break;
								}
							}
						}
						echo "<img class='imgrec' src='../Newsletter/Images/power.jfif' alt='Image  of a power supply'>";
					}
					if($foundcase != false){	
						$founnone = false;
						echo "<h2 style='text-align:center;'>Storage for you</h2>";
						$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
						$count6 = 1;
						while(!feof($productsFile)){
							$line=fgets($productsFile);
							$product = preg_split("/[\t]/", $line);
							if(preg_match("/[\/\/]/",$line))
							{
								continue;
							}
							else if(preg_match("/^(STORAGE)/i",$line))
							{
								$count6++;
								array_push($product, $line);
								$power = ucwords(strtolower($product[0]));
								echo "<p class='recs'>".$power." ".$product[2]."</p>";
								if($count6>2){
									break;
								}
							}
						}
						echo "<img class='imgrec' src='../Newsletter/Images/storage.jfif' alt='Image  of a storage'>";
						fclose($productsFile);
					}
			}// end of signed in user	
		}
	}else { // Not signed in
			$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
			$count = 1;
			while(!feof($productsFile)){
				$line=fgets($productsFile);
				$product = preg_split("/[\t]/", $line);
				if(preg_match("/[\/\/]/",$line))
				{
					continue;
				}
				if(preg_match("/^(CPU)/i",$line))
				{	
					if($count==1){
						echo "<h2 style='text-align:center;'>CPU for you</h2>";
					}
						echo "<p class='recs'>".$product[2]."</p>";
					if($count>1){
						break;
					}
					$count++;
				}
			} // End of while 1
			fclose($productsFile);
			echo "<img class='imgrec2'  src='../Newsletter/Images/cpuintel.jfif' alt='Image  of GPU'>";
			$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
			$count=1;
			while(!feof($productsFile)){
				$line=fgets($productsFile);
				$product = preg_split("/[\t]/", $line);
				if(preg_match("/[\/\/]/",$line))
				{
					continue;
				}
				if(preg_match("/^(MOTHERBOARD)/i",$line))
				{	
					if($count==1){
						echo "<h2 style='text-align:center;'>Motherboard for you</h2>";
					}
					if($count>3){
						echo "<p class='recs'>".$product[2]."</p>";
					}
					if($count>5){
						break;
					}
					$count++;
				}
			} // End of while 2
			echo "<img class='imgrec2' src='../Newsletter/Images/motherboard.jfif' alt='Image  of CPU'>";
			fclose($productsFile);
		}
	?>
	</body>
</html>
