<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>PC4U</title>
	<link rel="stylesheet" type="text/css" href="Buildpage.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
			text-align: center;
		}

		div.progress {
			margin: auto;
		}
	</style>
</head>

<body>
	<?php require_once "../Menu/nav.php" ?>

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
				<p>High Settings</p><br>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="200" style="width: 48.5%;">97 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/csgo.png" width="230" height="240" />
				<p>High Settings</p><br>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="74.3" aria-valuemin="0" aria-valuemax="200" style="width: 37.2%;">74.3 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/fortnite.jpg" width="180" height="240" />
				<p>Low Settings</p><br>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="61.7" aria-valuemin="0" aria-valuemax="200" style="width: 31%;">61.7 fps</div>
				</div>
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
				<p>Ultra Settings</p><br>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="200" aria-valuemin="0" aria-valuemax="200" style="width: 100%;">384.8 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" />
				<p>High Settings</p><br>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="200" style="width: 49.5%;">99 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/ACOdyssey.png" width="180" height="240" />
				<p>Medium Settings</p><br>
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="200" style="width: 45%;">90 fps</div>
				</div>
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