<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="NewBuildpage.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        td {
            width: 33.333333%;
        }
    </style>
</head>

<body>
    <?php require_once "../Menu/nav.php" ?>

    <h1 id="banner">High-End Builds</h1>

    <!--Might do a form to ask what are the needs of the customer!-->
    <table class="builds" border="0" cellspacing="20px">
        <tr class="build">
            <td class="picture">
                <img src="Images/corsairicue.png" width="300px" height="300px" />
            </td>
            <td colspan="2" class="specs">
                <p class="price">Price: $2856</p><br>
                <p>Specification:</p>
                <p>CPU: AMD Ryzen 7 5800X 3.8 Ghz (Up to 4.7 GHz) 8-Core Processor</p>
                <p>CPU Cooler:  NZXT Kraken X63 98.17 CFM Liquid CPU Cooler</p>
                <p>Motherboard: MSI Mag X570 Tomahawk Wifi ATX AM4 Motherboard</p>
                <p>RAM: G.Skill Trident Z RGB 16 GB (2 x 8 GB) DDR4-3600 CL18 Memory</p>
                <p>GPU: Asus GeForce RTX 3080 10 GB STRIX GAMING OC Video Card</p>
                <p>Storage SSD: Crucial P1 500 GB M.2-2280 NVME Solid State Drive</p>
                <p>Storage HDD: Seagate Barracuda Compute 2 TB 3.5" 7200RPM Internal Hard Drive</p>
                <p>Case: Corsair iCUE 220T RGB Airflow ATX Mid Tower Case</p>
                <p>Power Supply: Cooler Master MWE Gold 750 W 80+ Gold Certified Fully Modular ATX Power Supply</p>
                <br>
                <button class="cart">Add to cart</button>
            </td>
        </tr>
        <tr class="fps">
            <td class="fpsleft">
                <img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
                <p>High Settings</p>
                <div class="progress" style="width: 40%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="193.5" aria-valuemin="0" aria-valuemax="200" style="width: 96.75%;">193.5 fps</div>
                </div>
            </td>
            <td class="fps">
                <img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
                <p>High Settings</p>
                <div class="progress" style="width: 30%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="107.0" aria-valuemin="0" aria-valuemax="200" style="width: 53.5%;">107.0 fps</div>
                </div>
            </td>
            <td class="fpsright">
                <img src="Images/ACValhalla.jpg" width="180" height="240" /><br><br>
                <p>High Settings</p>
                <div class="progress" style="width: 40%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="136.0" aria-valuemin="0" aria-valuemax="200" style="width: 68%;">136.0 fps</div>
                </div>
            </td>
        </tr>
    </table>

    <table class="builds" border="0" cellspacing="20px">
        <tr class="build">
            <td class="picture">
                <img src="Images/lianli.png" width="300px" height="300px" />
            </td>
            <td colspan="2" class="specs">
                <p class="price">Price: $3120</p><br>
                <p>Specification:</p>
                <p>CPU: Intel Core i9-10900K 3.7 (Up to 5.3 GHz) 10-Core Processor</p>
                <p>CPU Cooler: Corsair H100i RGB PLATINUM 75 CFM Liquid CPU Cooler</p>
                <p>Motherboard: Asus ROG STRIX Z490-E GAMING ATX LGA1200 Motherboard</p>
                <p>RAM: G.Skill Trident Z RGB 16 GB (2 x 8 GB) DDR4-3600 CL18 Memory</p>
                <p>GPU: Asus GeForce RTX 3080 10 GB STRIX GAMING OC Video Card</p>
                <p>Storage SSD: Samsung 970 Evo 500 GB M.2-2280 NVME Solid State Drive</p>
                <p>Storage HDD: Seagate Barracuda Compute 2 TB 3.5" 7200RPM Internal Hard Drive</p>
                <p>Case: Lian Li Lancool II Mesh ATX Mid Tower Case</p>
                <p>Power Supply: Corsair RM (2019) 750 W 80+ Gold Certified Fully Modular ATX Power Supply</p>
                <br>
                <button class="cart">Add to cart</button>
            </td>
        </tr>
        <tr class="fps">
            <td class="fpsleft">
                <img src="Images/shadowOfTombRaider.jpg" width="180" height="240" /><br><br>
                <p>High Settings</p>
                <div class="progress" style="width: 40%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="201.0" aria-valuemin="0" aria-valuemax="200" style="width: 100%;">201.0 fps</div>
                </div>
            </td>
            <td class="fps">
                <img src="Images/rdr2.jpg" width="180" height="240" /><br><br>
                <p>High Settings</p>
                <div class="progress" style="width: 30%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="110.0" aria-valuemin="0" aria-valuemax="200" style="width: 55%;">110.0 fps</div>
                </div>
            </td>
            <td class="fpsright">
                <img src="Images/ACValhalla.jpg" width="180" height="240" /><br><br>
                <p>High Settings</p>
                <div class="progress" style="width: 40%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="130.0" aria-valuemin="0" aria-valuemax="200" style="width: 65%;">130.0 fps</div>
                </div>
            </td>
        </tr>
    </table>


    <p></p>
    <footer>Note: All prices are in Canadian Dollar, and peripherals are not included</footer>
</body>

</html>
