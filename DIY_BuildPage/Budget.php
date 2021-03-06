<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>PC4U</title>
	<link rel="stylesheet" type="text/css" href="Buildpage.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="icon" href="../pc_icon.png">
	<style>
		td {
			width: 33.3333333%;
		}
	</style>
</head>

<body>
	<?php
	require_once "../Menu/nav.php";
	ob_start();
	$_SESSION['redirect'] = "../DIY_BuildPage/Budget.php";

	//function for searching for the required data from database
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
	// function for reading from database and putting them into array style
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
	//function for calculating the amount of fps for games
	function calculatePercentage($fps)
	{
		$ratio = (float) $fps * 100 / 200.0;
		if ($fps >= 200) {
			$ratio = 100;
		}
		return $ratio . "%";
	}
	?>

	<h1 id="banner">Budget Builds</h1>

	
	<table class="builds" border="0" cellspacing="20px">
		<tr class="build" id="bud1">
			<!-- id for reference from another page -->
			<td class="picture">
				<img src="Images/DIYPC_MA08.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<form action="" method="POST">
					<input type="hidden" name="prebuilt" value="budget5">
					<?php
					//reading from budget database
					readSpecs("budget5");
					include "../Account/addToCart.php";
					?>
				</form>
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

	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/CMN200.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
				<form action="" method="POST">
					<input type="hidden" name="prebuilt" value="budget3">
					<?php
					//reading from budget database
					readSpecs("budget3");
					include "../Account/addToCart.php";

					?>
				</form>
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
				<form action="" method="POST">
					<input type="hidden" name="prebuilt" value="budget2">
					<?php
					//reading from budget database
					readSpecs("budget2");
					include "../Account/addToCart.php";
					?>
				</form>
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
				<form action="" method="POST">
					<input type="hidden" name="prebuilt" value="budget1">
					<?php
					//reading from budget database
					readSpecs("budget1");
					include "../Account/addToCart.php";
					ob_end_flush();
					?>
				</form>
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
