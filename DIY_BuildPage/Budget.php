<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>PC4U</title>
	<link rel="stylesheet" type="text/css" href="Buildpage.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		td {
			width: 33.3333333%;
		}
	</style>
</head>

<body>
	<?php 
		require_once "../Menu/nav.php";

		function buildSearch($lines, $buildname){
			$line = "";
			for($i = 0; $i < count($lines); $i++){
				$line = explode("\t", $lines[$i]);
				if(strcmp($line[0], $buildname) == 0){
					return $line;
				}
			}
			$line = "";
			return $line;
		}

		function readSpecs($buildname){
			$prebuilds = fopen("../Database/prebuilds.txt", "r");
			$contents = fread($prebuilds, filesize("../Database/prebuilds.txt"));
			$lines = explode("\n", $contents);
			$line = buildSearch($lines, $buildname);
			fclose($prebuilds);

			if(!empty($line)){
				$specs = explode(", ", $line[1]);
				$price = $line[2];
				$cpu = $specs[0];
				$cpuCooler = $specs[1];
				$mobo = $specs[2];
				$ram = $specs[3];
				$gpu = $specs[4];
				$ssd = $specs[5];
				$hdd = $specs[6];
				$case = $specs[7];
				$psu = $specs[8];
				
				$printHDD = "<p>Storage HDD: ".$hdd."</p>";
				$printCpuCooler = "<p>CPU Cooler: ".$cpuCooler."</p>";
				$printSpec = "<p class=\"price\">Price: $".$price."</p><br>\n
						<p>Specification:</p>\n
						<p>CPU: ".$cpu."</p>\n".(empty($cpuCooler)?"":$printCpuCooler)."\n
						<p>Motherboard: ".$mobo."</p>\n
						<p>RAM: ".$ram."</p>\n
						<p>GPU: ".$gpu."</p>\n
						<p>Storage SSD: ".$ssd."</p>\n".(empty($hdd)?"":$printHDD)."\n
						<p>Case: ".$case."</p>\n
						<p>Power Supply: ".$psu."</p><br>\n";

				echo $printSpec;
			}
		}
	?>

	<h1 id="banner">Budget Builds</h1>

	<!--Might do a form to ask what are the needs of the customer!-->
	<form action="cart.php" method="POST" id="budget5"><table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/DIYPC_MA08.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<?php
					readSpecs("budget5");
				?>
				<button type="submit" form="budget5" class="cart" value="budget5" >Add to cart</button>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/LeagueOfLegends.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<!--Edit WIDTH:PX to change bar size, edit WIDTH:% to change progress, deleteMe-->
				<div class="progressbar" style="width:300px;"><div class="progress" style="width:20.5%;">97 fps</div></div> <!--NEW progress bar, deleteMe-->
				<div class="progress" style="width: 40%;">
					<div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="200" style="width: 48.5%;">97 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/csgo.png" width="230" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progress" style="width: 30%;">
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
	</table></form>

	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<?php
					readSpecs("budget3");
				?>
				<button class="cart" value="750">Add to cart</button>
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
				<div class="progress" style="width: 30%;">
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
				<?php
					readSpecs("budget2");
				?>
				<button class="cart" value="730">Add to cart</button>
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
				<div class="progress" style="width: 30%;">
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
				<?php
					readSpecs("budget1");
				?>
				<button class="cart" value="950">Add to cart</button>
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
				<div class="progress" style="width: 30%;">
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

</html>