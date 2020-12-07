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
			if(isset($_SESSION['signedin'])){
				if(file_exists("../Database/orders.txt")){
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
							echo "<h2 style='text-align:center;'>CPU for you</h2>";
							$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
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
									echo "<p style='text-align:center;'>".$product[2]."</p>";
									echo "<p style='text-align:center'>".$product[5]."</p>";
									if($count>4){
										break;
									}
								}
							}
							echo "<img class='imgrec' src='../Newsletter/Images/cpuintel.jfif' alt='Image  of GPU' />";
						}
						 else if($foundmother != false){
							echo "<h2 style='text-align:center;'>Motherboard for you</h2>";
							$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
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
									echo "<p style='text-align:center;'>".$product[2]."</p>";
									if($count2>4){
										break;
									}
								}
							}
							echo "<img class='imgrec' src='../Newsletter/Images/motherboard.jfif' alt='Image  of CPU' />";
						}
						else if($foundgpu != false){
							echo "<h2 style='text-align:center;'>GPU for you</h2>";
							$productsFile = fopen("../Database/products.txt", "r") or die("Unable to open products.txt file!");
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
									echo "<p style='text-align:center;'>".$product[2]."</p>";
									echo "<p style='text-align:center'>".$product[5]."</p>";
									if($count3>4){
										break;
									}
								}
							}
							echo "<img class='imgrec' src='../Newsletter/Images/gpunvidia.jpg' alt='Image  of GPU' />";
						}
						 else if($foundcase != false){
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
									echo "<p style='text-align:center;'>".$product[2]."</p>";
									echo "<p style='text-align:center'>".$product[5]."</p>";
									if($count4>4){
										break;
									}
								}
							}
							echo "<img class='imgrec' src='../Newsletter/Images/case.jfif' alt='Image  of a case' />";
						}
						else if($foundcase != false){
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
									echo "<p style='text-align:center;'>".$power." ".$product[2]."</p>";
									if($count5>2){
										break;
									}
								}
							}
							echo "<img class='imgrec' src='../Newsletter/Images/power.jfif' alt='Image  of a power supply' />";
						}
						else if($foundcase != false){
							echo "<h2 style='text-align:center;'>Power for you</h2>";
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
									echo "<p style='text-align:center;'>".$power." ".$product[2]."</p>";
									if($count6>2){
										break;
									}
								}
							}
							echo "<img class='imgrec' src='../Newsletter/Images/storage.jfif' alt='Image  of a storage' />";
						}
					}
					fclose($ordersFile);
				}
			}
			else{
				echo "<h1>Please sign-in</h1>";
			}
			?>
	</body>
</html>