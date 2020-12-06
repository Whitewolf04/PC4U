<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="NewWizard.css" />
</head>

<body>
    <?php require_once "../Menu/nav.php";
    ob_start();
    ?>

    <div>
        <h1 id="banner">DIY Part Picking</h1>
    </div>


    <div id="partPicking" class="box">
        <fieldset id="mainComp">
            <legend>Main Component</legend>

            <table border="0">
            <form id="mainCompForm" method="POST">
              <label for="cpuBrand">CPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label>

                <tr>
                <td class="td"><label for="cpuBrand">CPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label></td>

                <td><select id="cpuBrand" name="cpuBrand" class="selectStyle">
                    <option value="none" selected disabled hidden>Select a CPU Brand</option>
                    <option value="intel">Intel</option>
                    <option value="amd">AMD</option>
                </select></td>

                </tr>

                
                <tr>
                <td><label for="cpuType">CPU Type&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="cpuType" name="cpuType">
                    <!--Populated by JavaScript-->
                    </select></td>
                </tr>
                <tr>
                <td><label for="cpu">CPU&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="cpu" name="cpu">
                    <!--Populated by JavaScript-->
                </select></td>
                </tr>
                
                
                <td><label for="moboChipset">Motherboard Chipset&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="moboChipset" name="moboChipset">
                    <!--Populated by JavaSript-->
                </select></td>
                </tr>
                <tr>
                <td><label for="mobo">Motherboard&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="mobo" name="mobo">
                    <!--Populated by JavaScript-->
                </select></td>
                </tr>
                <tr>
                <td><label for="ramConfig">Memory Configuration&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="ramConfig" name="ramConfig">
                    <option value="none" selected disabled hidden>Select a RAM configuration</option>
                    <option value="2x8">2 x 8GB (Recommended)</option>
                    <option value="2x16">2 x 16GB</option>
                    <option value="1x16">1 x 16GB</option>
                    <option value="2x4">2 x 4GB</option>
                    <option value="1x8">1 x 8GB</option>
                </select></td>
                </tr>
                <tr>
                <td><label for="ram">Memory Configuration&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="ram" name="ram">
                    <option value="none" selected disabled hidden>Select a RAM Speed</option>
                    <option value="4000mhz">4000mhz</option>
                    <option value="3600mhz">3600mhz</option>
                    <option value="3200mhz">3200mhz</option>
                    <option value="3000mhz">3000mhz</option>
                    <option value="2666mhz">2666mhz</option>
                </select></td>
                 </tr>
                <tr>
                <td><label for="gpuBrand">GPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="gpuBrand" name="gpuBrand">
                    <option value="none" selected disabled hidden>Select a GPU Brand</option>
                    <option value="nvidia">Nvidia</option>
                    <option value="amd">AMD</option>
                </select></td>
                </tr>
                <tr>
                <td><label for="gpuType">GPU Type&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="gpuType" name="gpuType">
                    <!--Populated by JavaScript-->
                </select></td>
                </tr>
                <tr>
                <td><label for="gpu">Graphics Card&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="gpu" name="gpu">
                    <!--Populated by JavaScript-->
                </select></td>
                </tr>
                <tr>
                <td><label for="storageType">Storage Type &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="storageType" name="storageType">
                    <option value="none">Select Storage Type</option>
                    <option value="sataSsd">Sata SSD</option>
                    <option value="M2NvmeSsd">M.2 NVMe SSD</option>
                </select></td>
                </tr>
                <tr>
                <td><label for="storageAmount"> Storage Amount&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="storageAmount" name="storageAmount">
                    <option value="none" selected disabled hidden> Select Amount of Storage </option>
                    <option value="256gb">256 GB</option>
                    <option value="500gb">500 GB (Recommended)</option>
                    <option value="1tb">1 TB</option>
                    <option value="2tb">2 TB</option>
                    <option value="4tb">4 TB</option>
                </select></td>
                </tr>
                <tr>
                <td><label for="coolerType">CPU Cooler Type &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="coolerType" name="coolerType">
                    <option value="none" selected disabled hidden> Select CPU Cooler Type</option>
                    <option value="fan"> Fan </option>
                    <option value="liquid">Liquid</option>

                </select></td>
                </tr>
                <tr>
                <td><label for="coolerSize">CPU Cooler Size &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="coolerSize" name="coolerSize">
                    <!--Populated by JavaScript-->

                </select></td>
                </tr>
                <tr>
                <td><label for="case">Computer Case &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="case" name="case">
                    <option value="none" selected disabled hidden> Select a Computer Case</option>
                    <option value="mid"> Mid Tower </option>
                    <option value="full">Full Tower</option>

                </select></td>
                </tr>
                <tr>
                <td><label for="caseSize">Computer Case Size &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="caseSize" name="caseSize">
                    <!--Populated by JavaScript-->

                </select></td>
                </tr>
                <tr>
                <td><label for="powerBrand">Power Supply Brand &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="powerBrand" name="powerBrand">
                    <option value="none" selected disabled hidden> Select a Power Supply Brand</option>
                    <option value="evgaPower"> EVGA </option>
                    <option value="corsairPower"> Corsair </option>
                    <option value="coolermasterPower"> Cooler Master </option>
                    <option value="thermaltakePower"> Thermaltake </option>

                </select></td>
                </tr>
                <tr>
                <td><label for="powerWatt">Power Supply Wattage&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                <td><select id="powerWatt" name="powerWatt">
                   
                </select>
                <br />
                <br />
                <br />
                <?php
                include "../Account/addToCart.php";
                ob_flush();
                ?>
                </td>
                </tr>
    </div>
    </form>
    </table>
    </fieldset>
    </div>

    <script type="text/javascript" src="PCBuildingWizard.js"></script>
</body>

</html>
