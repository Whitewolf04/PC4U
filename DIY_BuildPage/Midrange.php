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
			width: 33.33333%;
		}
	</style>
</head>

<body>
	<?php
	require_once "../Menu/nav.php";
	ob_start();

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
		if ($fps >= 200) {
			$ratio = 100;
		}
		return $ratio . "%";
	}
	?>

	<h1 id="banner">Mid-Range Builds</h1>

	<!--Might do a form to ask what are the needs of the customer!-->
	<form action="cart.php" method="POST" id="midrange1">
	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/CMMB311L.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
					<?php
					readSpecs("midrange1");
          include "../Account/addToCart.php";
					?>
					<button type="submit" form="midrange1" class="cart" value="midrange1">Add to cart</button>
				</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(151.2); ?>;">151.2 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:30%;">
					<div class="progress" style="width: <?php echo calculatePercentage(85.3); ?>;">85.3 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACValhalla.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(83.2); ?>;">83.2 fps</div>
				</div>
			</td>
		</tr>
	</table>
</form>


	<table class="builds" border="0" cellspacing="20px">
		<tr class="build" id="mid1"> <!-- id for reference from another page -->
			<td class="picture">
				<img src="Images/CMMB311L.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
			<form action="" method="POST">
			<input type="hidden" name="prebuilt" value="midrange2">
				<?php
					readSpecs("midrange2");
					include "../Account/addToCart.php";

				?>
				</form>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(169.1); ?>;">169.1 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:30%;">
					<div class="progress" style="width: <?php echo calculatePercentage(97.8); ?>;">97.8 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACValhalla.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(95.6); ?>;">95.6 fps</div>
				</div>
			</td>
		</tr>
	</table>

	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/corsair275r.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
			<form action="" method="POST">
			<input type="hidden" name="prebuilt" value="midrange3">
				<?php
					readSpecs("midrange3");
					include "../Account/addToCart.php";

				?>
				</form>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>Ultra Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(124.5); ?>;">124.5 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:30%;">
					<div class="progress" style="width: <?php echo calculatePercentage(117.2); ?>;">117.2 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACValhalla.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width:40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(114.6); ?>;">114.6 fps</div>
				</div>
			</td>
		</tr>
	</table>

	<table class="builds" border="0" cellspacing="20px">
		<tr class="build">
			<td class="picture">
				<img src="Images/corsair275r.png" width="300px" height="300px" />
			</td>
			<td colspan="2" class="specs">
			<form action="" method="POST">
			<input type="hidden" name="prebuilt" value="midrange4">
				<?php
					readSpecs("midrange4");
					include "../Account/addToCart.php";

				?>
				</form>
			</td>
		</tr>
		<tr class="fps">
			<td class="fpsleft">
				<img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
				<p>Ultra Settings</p>
				<div class="progressbar" style="width: 40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(148); ?>;">148 fps</div>
				</div>
			</td>
			<td class="fps">
				<img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width: 30%;">
					<div class="progress" style="width: <?php echo calculatePercentage(131.5); ?>;">131.5 fps</div>
				</div>
			</td>
			<td class="fpsright">
				<img src="Images/ACValhalla.jpg" width="180" height="240" /><br><br>
				<p>High Settings</p>
				<div class="progressbar" style="width: 40%;">
					<div class="progress" style="width: <?php echo calculatePercentage(129.5); ?>;">129.5 fps</div>
				</div>
			</td>
		</tr>
	</table>

	<p></p>
	<footer>Note: All prices are in Canadian Dollar, and peripherals are not included</footer>
</body>

</html>
