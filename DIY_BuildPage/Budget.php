<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>PC4U</title>
	<!--<link rel="stylesheet" type="text/css" href="Buildpage.css" />-->
	<style>
		table#builds {
			margin: auto;
			width: 100%;
		}

		td.picture {
			text-align: right;
		}

		td.fps {
			padding-top: 20px;
			padding-bottom: 20px;
		}
	</style>
</head>

<body>
	<?php require_once "../Menu/nav.php" ?>
	<?php
	$products = fopen("../Database/products.txt", "r");
	$contents = fread($products, filesize("../Database/products.txt"));
	$lines = explode("\n", $contents);
	$amdCPU = explode("\t", $lines[0]);
	$key = array_search("3900X", $amdCPU);
	echo "<h1>Testing: " . $amdCPU[$key + 1] . ", price: " . $amdCPU[$key + 2] . "</h1>";

	?>

	<h1 id="banner">Budget Builds</h1>

	<!--Might do a form to ask what are the needs of the customer!-->
	<table id="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/DIYPC_MA08.jpg" width="300px" height="300px" />
				<p id="price">$400</p>
			</td>
			<td colspan="2">
				<p>Specification:</p>
				<p>CPU: AMD Ryzen 3 3200G</p>
				<p>Motherboard: MSI A320M-A PRO MAX Micro ATX AM4 Motherboard</p>
				<p>RAM: G.Skill Aegis 8 GB DDR4-3000 CL 16 Memory</p>
				<p>Storage: Team GX1 240 GB 2.5" Solid State Drive</p>
				<p>Case: DIYPC MA08 Micro ATX Mini Tower</p>
				<p>Power Supply: Cooler Master Elite V3 400W 80+ Certified</p>
			</td>
		</tr>
		<tr class="fps">
			<td class="fps">
				<img src="Images/LeagueOfLegends.jpg" width="180" height="240" />
				<span>High Settings: 97 fps</span>
			</td>
			<td class="fps">
				<img src="Images/csgo.png" width="230" height="240" />
				<p>High Settings: 74.3 fps</p>
			</td>
			<td class="fps">
				<img src="Images/fortnite.jpg" width="180" height="240" />
				<p>Low Settings: 61.7 fps</p>
			</td>
		</tr>
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.jpg" width="300px" height="300px" />
				<p>$750</p>
			</td>
			<td colspan="2">
				<p>Specification:</p>
				<p>CPU: AMD Ryzen 3 3100</p>
				<p>Motherboard: AsRock A520M-HDV Micro ATX AM4 Motherboard</p>
				<p>RAM: G.Skill Aegis 8 GB DDR4-3200 CL 16 Memory</p>
				<p>GPU: Asus GeForce GTX 1650 Super 4 GB Strix Gaming Advanced</p>
				<p>Storage: Team GX1 240 GB 2.5" Solid State Drive</p>
				<p>Case: Cooler Master N200 Micro ATX Mini Tower</p>
				<p>Power Supply: Cooler Master Elite V3 400W 80+ Certified</p>
			</td>
		</tr>
		<tr class="fps">
			<td class="fps">
				<img src="Images/LeagueOfLegends.jpg" width="180" height="240" />
				<p>Ultra Settings: 384.8 fps</p>
			</td>
			<td class="fps">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" />
				<p>High Settings: 99 fps</p>
			</td>
			<td class="fps">
				<img src="Images/ACOdyssey.png" width="180" height="240" />
				<p>Medium Settings: 90 fps</p>
			</td>
		</tr>
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.jpg" width="300px" height="300px" />
				<p>$730</p>
			</td>
			<td colspan="2">
				<p>Specification:</p>
				<p>CPU: Intel Core i3-9100F 3.6 GHz Quad-Core Processor</p>
				<p>Motherboard: MSI B365M PRO-VDH Micro ATX Motherboard</p>
				<p>RAM: G.Skill Aegis 16 GB (2 x 8 GB) DDR4-2666 CL 19 Memory</p>
				<p>GPU: Asus GeForce GTX 1650 Super 4 GB Strix Gaming Advanced</p>
				<p>Storage: Team GX1 240 GB 2.5" Solid State Drive</p>
				<p>Case: Cooler Master N200 Micro ATX Mini Tower</p>
				<p>Power Supply: Thermaltake Smart Series 430W 80+ Certified</p>
			</td>
		</tr>
		<tr class="fps">
			<td class="fps">
				<img src="Images/LeagueOfLegends.jpg" width="180" height="240" />
				<p>Ultra Settings: 376.8 fps</p>
			</td>
			<td class="fps">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" />
				<p>High Settings: 94.9 fps</p>
			</td>
			<td class="fps">
				<img src="Images/ACOdyssey.png" width="180" height="240" />
				<p>Medium Settings: 95 fps</p>
			</td>
		</tr>
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.jpg" width="300px" height="300px" />
				<p>$950</p>
			</td>
			<td colspan="2">
				<p>Specification:</p>
				<p>CPU: AMD Ryzen 5 3600 3.6 GHz 6-Core Processor</p>
				<p>Motherboard: AsRock B550-HDV Micro ATX AM4 Motherboard</p>
				<p>RAM: Team T-Force Vulcan Z 16 GB (2 x 8 GB) DDR4-3200 CL 16 Memory</p>
				<p>GPU: MSI GeForce GTX 1600 Super 6 GB Ventus XS OC</p>
				<p>Storage: Kingston A400 240 GB 2.5" Solid State Drive</p>
				<p>Case: Cooler Master N200 Micro ATX Mini Tower</p>
				<p>Power Supply: Thermaltake Smart 500W 80+ Certified</p>
			</td>
		</tr>
		<tr class="fps">
			<td class="fps">
				<img src="Images/csgo.png" width="220" height="240" />
				<p>Ultra Settings: 262.7 fps</p>
			</td>
			<td class="fps">
				<img src="Images/rdr2.jpg" width="180" height="240" />
				<p>Medium Settings: 111.7 fps</p>
			</td>
			<td class="fps">
				<img src="Images/ACOdyssey.png" width="180" height="240" />
				<p>High Settings: 82.3 fps</p>
			</td>
		</tr>
	</table>

	<p></p>
	<footer>Note: All prices are in Canadian Dollar, and peripherals are not included</footer>
</body>

</html>