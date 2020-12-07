<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>PC4U</title>
        <link rel="stylesheet" type="text/css" href="DIY_Mainpage.css" />
        <link rel="icon" href="../pc_icon.png">
    </head>

    <body>
        <?php require_once "../Menu/nav.php"; $_SESSION['redirect'] = "../DIY_BuildPage/DIY_Mainpage.php"; ?>

		<h1 id="banner">Preconfigured Builds</h1>

        <table id="pricerange">
			<tr>
				<td id="budget">
					<a href="Budget.php"><p>Budget</p>
					<p>(< $1000)</p></a>
				</td>
				<td id="mid">
					<a href="Midrange.php"><p>Mid-Range</p>
					<p>($1000 - $2000)</p></a>
				</td>
				<td id="high">
					<a href="Highend.php"><p>High-End</p>
					<p>(> $2000)</p></a>
				</td>
			</tr>
		</table>
</html>