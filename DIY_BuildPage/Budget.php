<?php session_start(); ?>
<!DOCTYPE html>
<html>

	<body>
		<?php require_once "../Menu/nav.php"
		if(isset($_POST['addToCart1'])){
            $_SESSION['prebuild'] = "budget1";
            header("Location: cart.php");
        }
        if(isset($_POST['addToCart2'])){
            $_SESSION['prebuild'] = "budget2";
            header("Location: cart.php");
        }
        if(isset($_POST['addToCart3'])){
            $_SESSION['prebuild'] = "budget3";
            header("Location: cart.php");
        }
        if(isset($_POST['addToCart4'])){
            $_SESSION['prebuild'] = "budget4";
            header("Location: cart.php");
        }
        if(isset($_POST['addToCart5'])){
            $_SESSION['prebuild'] = "budget5";
            header("Location: cart.php");
        }
		?>
		
		<h1 id="banner">Budget Builds</h1>
<head>
	<meta charset="UTF-8" />
	<title>PC4U</title>
	<link rel="stylesheet" type="text/css" href="Budget.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<<<<<<< Updated upstream
	<style>
		table#builds {
			margin: auto;
			width: 100%;
		}

		td.picture {
			text-align: right;
		}

		<div id="even">
			<table border="2" rules="none" id="spec">
				<caption>Range: $800-$1000</caption>
				<tr>
					<td>Component:</td>
					<td>Selection</td>
					<td>Price</td>
				</tr>
				<tr>
					<td>CPU</td>
					<td>AMD Ryzen 5 3600 3.6 GHz 6-Core Processor</td>
					<td>$268.50</td>
				</tr>
				<tr>
					<td>Motherboard</td>
					<td>SRock B550M-HDV Micro ATX AM4 Motherboard</td>
					<td>$99.50</td>
				</tr>
				<tr>
					<td>Memory</td>
					<td>Team T-FORCE VULCAN Z 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory</td>
					<td>$69.99</td>
				</tr>
				<tr>
					<td>Storage</td>
					<td>Kingston A400 240 GB 2.5" Solid State Drive</td>
					<td>$39.41</td>
				</tr>
				<tr>
					<td>Video Card</td>
					<td>Asus GeForce GTX 1660 6 GB TUF OC Video Card</td>
					<td>$304.99</td>
				</tr>
				<tr>
					<td>Case</td>
					<td>Cooler Master N200 MicroATX Mini Tower Case</td>
					<td>$50.17</td>
				</tr>
				<tr>
					<td>Power Supply</td>
					<td>Thermaltake Smart 500 W 80+ Certified ATX Power Supply</td>
					<td>$59.75</td>
				</tr>
				<tr>
					<td><a
							href="https://ca.pcpartpicker.com/user/whitewolf04/saved/?fbclid=IwAR0ukIcZw-NrplTQiLkslEac_IwVQMajjcc8l8a-tpjAqUp92NfRE5q4JvM#view=488BjX"
							style="font-size: 100%;">Buy
							Now</a></td>
					<td>Total: </td>
					<td>$892.31</td>
				</tr>
			</table>
            <form method="post" action=""><input type="submit" name="addToCart1" value="Add to Cart"></form>
			<p></p>
			<table border="2" id="perf">
				<caption>Performance in Games at 1080p</caption>
				<tr>
					<td>Games</td>
					<td>Settings</td>
					<td>Minimum FPS</td>
				</tr>
				<tr>
					<td>Assasin's Creed Odyssey</td>
					<td>Ultra Quality</td>
					<td>43.9</td>
				</tr>
				<tr>
					<td>Forza Horizon 4</td>
					<td>Ultra Quality</td>
					<td>87.0</td>
				</tr>
				<tr>
					<td>Shadow of the Tomb Raider</td>
					<td>Ultra Quality</td>
					<td>69.6</td>
				</tr>
				<tr>
					<td>Player Unknown's Battleground</td>
					<td>Ultra Quality</td>
					<td>70.5</td>
				</tr>
				<tr>
					<td>Battlefield V</td>
					<td>Ultra Quality</td>
					<td>92.0</td>
				</tr>
				<tr>
					<td>Apex Legends</td>
					<td>Ultra Quality</td>
					<td>80.89</td>
				</tr>
				<tr>
					<td>Overwatch</td>
					<td>Ultra Quality</td>
					<td>121.13</td>
				</tr>
				<tr>
					<td>Counter Strike: Global Offensive</td>
					<td>Ultra Quality</td>
					<td>221.0</td>
				</tr>
		td.fps {
			padding-top: 20px;
			padding-bottom: 20px;
			text-align: center;
		}

		div.progress {
			margin: auto;
		}
	</style>
=======
>>>>>>> Stashed changes
</head>

		<div id="odd">
			<p></p>
			<table border="2" rules="none" id="spec">
				<caption>(Intel) Range: $600-$800</caption>
				<tr>
					<td>Component:</td>
					<td>Selection</td>
					<td>Price</td>
				</tr>
				<tr>
					<td>CPU</td>
					<td>Intel Core i3-9100F 3.6 GHz Quad-Core Processor</td>
					<td>$100.50</td>
				</tr>
				<tr>
					<td>Motherboard</td>
					<td>MSI B365M PRO-VDH Micro ATX LGA1151 Motherboard</td>
					<td>$87.99</td>
				</tr>
				<tr>
					<td>Memory</td>
					<td>G.Skill Aegis 16 GB (2 x 8 GB) DDR4-2666 CL19 Memory</td>
					<td>$79.98</td>
				</tr>
				<tr>
					<td>Storage</td>
					<td>Team GX1 240 GB 2.5" Solid State Drive</td>
					<td>$36.99</td>
				</tr>
				<tr>
					<td>Video Card</td>
					<td>Asus GeForce GTX 1660 6 GB TUF OC Video Card</td>
					<td>$304.99</td>
				</tr>
				<tr>
					<td>Case</td>
					<td>Cooler Master N200 MicroATX Mini Tower Case</td>
					<td>$50.17</td>
				</tr>
				<tr>
					<td>Power Supply</td>
					<td>Thermaltake Smart Series 430 W 80+ Certified ATX Power Supply</td>
					<td>$51.37</td>
				</tr>
				<tr>
					<td><a
							href="https://ca.pcpartpicker.com/user/whitewolf04/saved/?fbclid=IwAR0ukIcZw-NrplTQiLkslEac_IwVQMajjcc8l8a-tpjAqUp92NfRE5q4JvM#view=vD7jZL">Buy
							Now</a></td>
					<td>Total: </td>
					<td>$711.99</td>
				</tr>
			</table>
            <form method="post" action=""><input type="submit" name="addToCart2" value="Add to Cart"></form>
			<table border="2" id="perf">
				<caption>Performance in Games at 1080p</caption>
				<tr>
					<td>Games</td>
					<td>Settings</td>
					<td>Minimum FPS</td>
				</tr>
				<tr>
					<td>Assasin's Creed Odyssey</td>
					<td>Ultra Quality</td>
					<td>40.7</td>
				</tr>
				<tr>
					<td>Forza Horizon 4</td>
					<td>Ultra Quality</td>
					<td>80.6</td>
				</tr>
				<tr>
					<td>Shadow of the Tomb Raider</td>
					<td>Ultra Quality</td>
					<td>64.4</td>
				</tr>
				<tr>
					<td>Player Unknown's Battleground</td>
					<td>Ultra Quality</td>
					<td>65.3</td>
				</tr>
				<tr>
					<td>Battlefield V</td>
					<td>Ultra Quality</td>
					<td>85.2</td>
				</tr>
				<tr>
					<td>Apex Legends</td>
					<td>Ultra Quality</td>
					<td>74.82</td>
				</tr>
				<tr>
					<td>Overwatch</td>
					<td>Ultra Quality</td>
					<td>112.12</td>
				</tr>
				<tr>
					<td>Counter Strike: Global Offensive</td>
					<td>Ultra Quality</td>
					<td>204.23</td>
				</tr>
<body>
	<?php require_once "../Menu/nav.php" ?>

	<h1 id="banner">Budget Builds</h1>

		<div id="even">
		<p></p>
		<table border="2" rules="none" id="spec">
			<caption>(AMD) Range: $600-$800</caption>
			<tr>
				<td>Component:</td>
				<td>Selection</td>
				<td>Price</td>
			</tr>
			<tr>
				<td>CPU</td>
				<td>AMD Ryzen 3 3100 3.6 GHz Quad-Core Processor</td>
				<td>$139.75</td>
			</tr>
			<tr>
				<td>Motherboard</td>
				<td>ASRock A520M-HDV Micro ATX AM4 Motherboard</td>
				<td>$77.11</td>
			</tr>
			<tr>
				<td>Memory</td>
				<td>G.Skill Aegis 8 GB (1 x 8 GB) DDR4-3200 CL16 Memory</td>
				<td>$40.99</td>
			</tr>
			<tr>
				<td>Storage</td>
				<td>Team GX1 240 GB 2.5" Solid State Drive</td>
				<td>$36.99</td>
			</tr>
			<tr>
				<td>Video Card</td>
				<td>Asus GeForce GTX 1660 6 GB TUF OC Video Card</td>
				<td>$304.99</td>
			</tr>
			<tr>
				<td>Case</td>
				<td>Cooler Master N200 MicroATX Mini Tower Case</td>
				<td>$50.17</td>
			</tr>
			<tr>
				<td>Power Supply</td>
				<td>Cooler Master Elite V3 400 W 80+ Certified ATX Power Supply</td>
				<td>$49.50</td>
			</tr>
			<tr>
				<td><a
						href="https://ca.pcpartpicker.com/user/whitewolf04/saved/?fbclid=IwAR0ukIcZw-NrplTQiLkslEac_IwVQMajjcc8l8a-tpjAqUp92NfRE5q4JvM#view=tnyzf7">Buy
						Now</a></td>
				<td>Total: </td>
				<td>$699.50</td>
			</tr>
		</table>
        <form method="post" action=""><input type="submit" name="addToCart3" value="Add to Cart"></form>
		<table border="2"  id="perf">
			<caption>Performance in Games at 1080p</caption>
			<tr>
				<td>Games</td>
				<td>Settings</td>
				<td>Minimum FPS</td>
			</tr>
			<tr>
				<td>Assasin's Creed Odyssey</td>
				<td>Ultra Quality</td>
				<td>80.3</td>
			</tr>
			<tr>
				<td>Forza Horizon 4</td>
				<td>Ultra Quality</td>
				<td>145.0</td>
			</tr>
			<tr>
				<td>Shadow of the Tomb Raider</td>
				<td>Ultra Quality</td>
				<td>119.8</td>
			</tr>
			<tr>
				<td>Player Unknown's Battleground</td>
				<td>Ultra Quality</td>
				<td>121.2</td>
			</tr>
			<tr>
				<td>Battlefield V</td>
				<td>Ultra Quality</td>
				<td>151.6</td>
			</tr>
			<tr>
				<td>Apex Legends</td>
				<td>Ultra Quality</td>
				<td>132.0</td>
			</tr>
			<tr>
				<td>Overwatch</td>
				<td>Ultra Quality</td>
				<td>188.0</td>
			</tr>
			<tr>
				<td>Counter Strike: Global Offensive</td>
				<td>Ultra Quality</td>
				<td>308.0</td>
			</tr>
	<!--Might do a form to ask what are the needs of the customer!-->
	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/DIYPC_MA08.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<p class="price">Price: $400</p><br>
				<p>Specification:</p>
				<p>CPU: AMD Ryzen 3 3200G</p>
				<p>Motherboard: MSI A320M-A PRO MAX Micro ATX AM4 Motherboard</p>
				<p>RAM: G.Skill Aegis 8 GB DDR4-3000 CL 16 Memory</p>
				<p>Storage: Team GX1 240 GB 2.5" Solid State Drive</p>
				<p>Case: DIYPC MA08 Micro ATX Mini Tower</p>
				<p>Power Supply: Cooler Master Elite V3 400W 80+ Certified</p>
				<br>
				<button class="cart">Add to cart</button>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/LeagueOfLegends.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="200" style="width: 48.5%;">97 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/csgo.png" width="230" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progress" style="width: 50%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="74.3" aria-valuemin="0" aria-valuemax="200" style="width: 37.2%;">74.3 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/fortnite.jpg" width="180" height="240" /><br><br>
				<p>Low Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="61.7" aria-valuemin="0" aria-valuemax="200" style="width: 31%;">61.7 fps</div>
				</div>
			</td>
		</tr>

	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<p class="price">Price: $750</p><br>
				<p>Specification:</p>
				<p>CPU: AMD Ryzen 3 3100</p>
				<p>Motherboard: AsRock A520M-HDV Micro ATX AM4 Motherboard</p>
				<p>RAM: G.Skill Aegis 8 GB DDR4-3200 CL 16 Memory</p>
				<p>GPU: Asus GeForce GTX 1650 Super 4 GB Strix Gaming Advanced</p>
				<p>Storage: Team GX1 240 GB 2.5" Solid State Drive</p>
				<p>Case: Cooler Master N200 Micro ATX Mini Tower</p>
				<p>Power Supply: Cooler Master Elite V3 400W 80+ Certified</p>
				<br>
				<button class="cart">Add to cart</button>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/LeagueOfLegends.jpg" width="180" height="240" /><br><br>
				<p>Ultra Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="200" aria-valuemin="0" aria-valuemax="200" style="width: 100%;">384.8 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progress" style="width: 60%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="200" style="width: 49.5%;">99 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACOdyssey.png" width="180" height="240" /><br><br>
				<p>Medium Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="200" style="width: 45%;">90 fps</div>
				</div>
			</td>
		</tr>
	</table>

	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<p class="price">Price: $730</p><br>
				<p>Specification:</p>
				<p>CPU: Intel Core i3-9100F 3.6 GHz Quad-Core Processor</p>
				<p>Motherboard: MSI B365M PRO-VDH Micro ATX Motherboard</p>
				<p>RAM: G.Skill Aegis 16 GB (2 x 8 GB) DDR4-2666 CL 19 Memory</p>
				<p>GPU: Asus GeForce GTX 1650 Super 4 GB Strix Gaming Advanced</p>
				<p>Storage: Team GX1 240 GB 2.5" Solid State Drive</p>
				<p>Case: Cooler Master N200 Micro ATX Mini Tower</p>
				<p>Power Supply: Thermaltake Smart Series 430W 80+ Certified</p>
				<br>
				<button class="cart">Add to cart</button>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/LeagueOfLegends.jpg" width="180" height="240" /><br><br>
				<p>Ultra Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="200" aria-valuemin="0" aria-valuemax="200" style="width: 100%;">376.8 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progress" style="width: 60%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="94.9" aria-valuemin="0" aria-valuemax="200" style="width: 47.5%;">94.9 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACOdyssey.png" width="180" height="240" /><br><br>
				<p>Medium Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="200" style="width: 47.5%;">95 fps</div>
				</div>
			</td>
		</tr>
	</table>

	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<p class="price">Price: $950</p><br>
				<p>Specification:</p>
				<p>CPU: AMD Ryzen 5 3600 3.6 GHz 6-Core Processor</p>
				<p>Motherboard: AsRock B550-HDV Micro ATX AM4 Motherboard</p>
				<p>RAM: Team T-Force Vulcan Z 16 GB (2 x 8 GB) DDR4-3200 CL 16 Memory</p>
				<p>GPU: MSI GeForce GTX 1600 Super 6 GB Ventus XS OC</p>
				<p>Storage: Kingston A400 240 GB 2.5" Solid State Drive</p>
				<p>Case: Cooler Master N200 Micro ATX Mini Tower</p>
				<p>Power Supply: Thermaltake Smart 500W 80+ Certified</p>
				<br>
				<button class="cart">Add to cart</button>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/csgo.png" width="220" height="240" /><br><br>
				<p>Ultra Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="200" aria-valuemin="0" aria-valuemax="200" style="width: 100%;">262.7 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
				<p>Medium Settings</p>
				<div class="progress" style="width: 60%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="111.7" aria-valuemin="0" aria-valuemax="200" style="width: 55.9%;">111.7 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACOdyssey.png" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="82.3" aria-valuemin="0" aria-valuemax="200" style="width: 41.2%;">82.3 fps</div>
				</div>
			</td>
		</tr>
	</table>

	<p></p>
	<footer>Note: All prices are in Canadian Dollar, and peripherals are not included</footer>
</body>

		<div id="odd">
		<p></p>
		<table border="2" rules="none" id="spec">
			<caption>(Intel) Range: Under $500</caption>
			<tr>
				<td>Component:</td>
				<td>Selection</td>
				<td>Price</td>
			</tr>
			<tr>
				<td>CPU</td>
				<td>Intel Pentium Gold G5400 3.7 GHz Dual-Core Processor</td>
				<td>$78.48</td>
			</tr>
			<tr>
				<td>Motherboard</td>
				<td>Asus PRIME H310M-E R2.0 Micro ATX LGA1151 Motherboard</td>
				<td>$79.75</td>
			</tr>
			<tr>
				<td>Memory</td>
				<td>Corsair Vengeance LPX 8 GB (2 x 4 GB) DDR4-2133 CL15 Memory</td>
				<td>$33.21</td>
			</tr>
			<tr>
				<td>Storage</td>
				<td>Team GX1 240 GB 2.5" Solid State Drive</td>
				<td>$36.99</td>
			</tr>
			<tr>
				<td>Video Card</td>
				<td>Asus GeForce GT 1030 2 GB Phoenix Fan OC Video Card</td>
				<td>$113.30</td>
			</tr>
			<tr>
				<td>Case</td>
				<td>DIYPC MA08 MicroATX Mini Tower Case</td>
				<td>$34.99</td>
			</tr>
			<tr>
				<td>Power Supply</td>
				<td>Cooler Master Elite V3 400 W 80+ Certified ATX Power Supply</td>
				<td>$49.50</td>
			</tr>
			<tr>
				<td><a
						href="https://ca.pcpartpicker.com/user/whitewolf04/saved/?fbclid=IwAR0ukIcZw-NrplTQiLkslEac_IwVQMajjcc8l8a-tpjAqUp92NfRE5q4JvM#view=YMThkL">Buy
						Now</a></td>
				<td>Total: </td>
				<td>$426.22</td>
			</tr>
		</table>
        <form method="post" action=""><input type="submit" name="addToCart4" value="Add to Cart"></form>
		<table border="2" id="perf">
			<caption>Performance in Games at 1080p</caption>
			<tr>
				<td>Games</td>
				<td>Settings</td>
				<td>Minimum FPS</td>
			</tr>
			<tr>
				<td>Assasin's Creed Odyssey</td>
				<td>Ultra Quality</td>
				<td>6.5</td>
			</tr>
			<tr>
				<td>Forza Horizon 4</td>
				<td>Ultra Quality</td>
				<td>11.7</td>
			</tr>
			<tr>
				<td>Shadow of the Tomb Raider</td>
				<td>Ultra Quality</td>
				<td>12.1</td>
			</tr>
			<tr>
				<td>Player Unknown's Battleground</td>
				<td>Ultra Quality</td>
				<td>9.4</td>
			</tr>
			<tr>
				<td>Battlefield V</td>
				<td>Ultra Quality</td>
				<td>10.1</td>
			</tr>
			<tr>
				<td>Apex Legends</td>
				<td>Ultra Quality</td>
				<td>24.8</td>
			</tr>
			<tr>
				<td>Overwatch</td>
				<td>Ultra Quality</td>
				<td>9.0</td>
			</tr>
			<tr>
				<td>Counter Strike: Global Offensive</td>
				<td>Ultra Quality</td>
				<td>13.0</td>
			</tr>

		</table>
		</div>

		<div id="even">
		<p></p>
		<table border="2" rules="none" id="spec">
			<caption>(AMD) Range: Under $500</caption>
			<tr>
				<td>Component:</td>
				<td>Selection</td>
				<td>Price</td>
			</tr>
			<tr>
				<td>CPU</td>
				<td>AMD Ryzen 3 3200G 3.6 GHz Quad-Core Processor</td>
				<td>$134.99</td>
			</tr>
			<tr>
				<td>Motherboard</td>
				<td>MSI A320M-A PRO MAX Micro ATX AM4 Motherboard</td>
				<td>$75.90</td>
			</tr>
			<tr>
				<td>Memory</td>
				<td>G.Skill Aegis 8 GB (1 x 8 GB) DDR4-3000 CL16 Memory</td>
				<td>$34.99</td>
			</tr>
			<tr>
				<td>Storage</td>
				<td>Team GX1 240 GB 2.5" Solid State Drive</td>
				<td>$36.99</td>
			</tr>
			<tr>
				<td>Video Card</td>
				<td>Asus GeForce GT 1030 2 GB Phoenix Fan OC Video Card</td>
				<td>$113.30</td>
			</tr>
			<tr>
				<td>Case</td>
				<td>DIYPC MA08 MicroATX Mini Tower Case</td>
				<td>$34.99</td>
			</tr>
			<tr>
				<td>Power Supply</td>
				<td>Cooler Master Elite V3 400 W 80+ Certified ATX Power Supply</td>
				<td>$49.50</td>
			</tr>
			<tr>
				<td><a
						href="https://ca.pcpartpicker.com/user/whitewolf04/saved/?fbclid=IwAR0ukIcZw-NrplTQiLkslEac_IwVQMajjcc8l8a-tpjAqUp92NfRE5q4JvM#view=B3mcbv">Buy
						Now</a></td>
				<td>Total: </td>
				<td>$367.36</td>
			</tr>
		</table>
        <form method="post" action=""><input type="submit" name="addToCart5" value="Add to Cart"></form>
		<table border="2" id="perf">
			<caption>Performance in Games at 1080p</caption>
			<tr>
				<td>Games</td>
				<td>Settings</td>
				<td>Minimum FPS</td>
			</tr>
			<tr>
				<td>Assasin's Creed Odyssey</td>
				<td>Ultra Quality</td>
				<td>5.6</td>
			</tr>
			<tr>
				<td>Forza Horizon 4</td>
				<td>Ultra Quality</td>
				<td>8.5</td>
			</tr>
			<tr>
				<td>Shadow of the Tomb Raider</td>
				<td>Ultra Quality</td>
				<td>10.3</td>
			</tr>
			<tr>
				<td>Player Unknown's Battleground</td>
				<td>Ultra Quality</td>
				<td>8.0</td>
			</tr>
			<tr>
				<td>Battlefield V</td>
				<td>Ultra Quality</td>
				<td>10.9</td>
			</tr>
			<tr>
				<td>Apex Legends</td>
				<td>Ultra Quality</td>
				<td>7.0</td>
			</tr>
			<tr>
				<td>Overwatch</td>
				<td>Ultra Quality</td>
				<td>10.0</td>
			</tr>
			<tr>
				<td>Counter Strike: Global Offensive</td>
				<td>Ultra Quality</td>
				<td>24.0</td>
			</tr>

		</table>
		</div>
		<p></p>
		<footer>Note: All prices are in Canadian Dollar, and peripherals are not included</footer>
	</body>
</html>
</html>
