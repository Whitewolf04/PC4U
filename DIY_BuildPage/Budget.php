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

	function buildSearch($lines, $buildname)
	{
		$line = "";
		for ($i = 0; $i < count($lines); $i++) {
			$line = explode("\t", $lines[$i]);
			if (strcmp($line[0], $buildname) == 0) {
				return $line;
			}
		}
		$line = "";
		return $line;
	}

	function readSpecs($buildname)
	{
		$prebuilds = fopen("../Database/prebuilds.txt", "r");
		$contents = fread($prebuilds, filesize("../Database/prebuilds.txt"));
		$lines = explode("\n", $contents);
		$line = buildSearch($lines, $buildname);
		fclose($prebuilds);

		if (!empty($line)) {
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

			$printHDD = "<p>Storage HDD: " . $hdd . "</p>";
			$printCpuCooler = "<p>CPU Cooler: " . $cpuCooler . "</p>";
			$printSpec = "<p class=\"price\">Price: $" . $price . "</p><br>\n
						<p>Specification:</p>\n
						<p>CPU: " . $cpu . "</p>\n" . (empty($cpuCooler) ? "" : $printCpuCooler) . "\n
						<p>Motherboard: " . $mobo . "</p>\n
						<p>RAM: " . $ram . "</p>\n
						<p>GPU: " . $gpu . "</p>\n
						<p>Storage SSD: " . $ssd . "</p>\n" . (empty($hdd) ? "" : $printHDD) . "\n
						<p>Case: " . $case . "</p>\n
						<p>Power Supply: " . $psu . "</p><br>\n";

			echo $printSpec;
		}
	}

	function calculatePercentage($fps)
	{
		$ratio = (float) $fps * 100 / 200.0;
		if($fps >= 200){
			$ratio = 100;
		}
		return $ratio . "%";
	}
	?>

	<h1 id="banner">Budget Builds</h1>

	<!--Might do a form to ask what are the needs of the customer!-->
	<form action="cart.php" method="POST" id="budget5">
		<table class="builds" border="0" cellspacing="20px">
			<tr class="build">
				<td class="picture">
					<img src="Images/DIYPC_MA08.png" width="300px" height="300px" />
				</td>
				<td colspan="2" class="specs">
					<?php
					readSpecs("budget5");
					?>
					<button type="submit" form="budget5" class="cart" value="budget5">Add to cart</button>
				</td>
			</tr>
			<tr class="fps">
				<td class="fpsleft">
					<img src="Images/LeagueOfLegends.jpg" width="180" height="240" /><br><br>
					<p>High Settings</p>
					<!--Edit WIDTH:PX to change bar size, edit WIDTH:% to change progress, deleteMe-->
					<div class="progressbar" style="width:40%;">
						<div class="progress" style="width: <?php echo calculatePercentage(97); ?>;">97 fps</div>
					</div>
					<!--NEW progress bar, deleteMe-->
				</td>
				<td class="fps">
					<img src="Images/csgo.png" width="230" height="240" /><br><br>
					<p>High Settings</p>
					<!--Edit WIDTH:PX to change bar size, edit WIDTH:% to change progress, deleteMe-->
					<div class="progressbar" style="width:30%;">
						<div class="progress" style="width: <?php echo calculatePercentage(74.3); ?>;">74.3 fps</div>
					</div>
					<!--NEW progress bar, deleteMe-->
				</td>
				<td class="fpsright">
					<img src="Images/fortnite.jpg" width="180" height="240" /><br><br>
					<p>Low Settings</p>
					<!--Edit WIDTH:PX to change bar size, edit WIDTH:% to change progress, deleteMe-->
					<div class="progressbar" style="width:40%;">
						<div class="progress" style="width: <?php echo calculatePercentage(61.7); ?>;">61.7 fps</div>
					</div>
					<!--NEW progress bar, deleteMe-->
				</td>
			</tr>
		</table>
	</form>

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
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(384.8); ?>;">384.8 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:30%;">
					<div class="progress" style="width: <?php echo calculatePercentage(99); ?>;">99 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACOdyssey.png" width="180" height="240" /><br><br>
				<p>Medium Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(90); ?>;">90 fps</div>
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
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(376.8); ?>;">376.8 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:30%;">
					<div class="progress" style="width: <?php echo calculatePercentage(94.9); ?>;">94.9 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACOdyssey.png" width="180" height="240" /><br><br>
				<p>Medium Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(95); ?>;">95 fps</div>
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
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(262.7); ?>;">262.7 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
				<p>Medium Settings</p>
				<div class="progressbar" style="width:30%;">
					<div class="progress" style="width: <?php echo calculatePercentage(111.7); ?>;">111.7 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACOdyssey.png" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(82.3); ?>;">82.3 fps</div>
				</div>
			</td>
		</tr>
	</table>

	<p></p>
	<footer>Note: All prices are in Canadian Dollar, and peripherals are not included</footer>
</body>

</html>