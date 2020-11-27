<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="Buildpage.css" />
    <script src="https://kit.fontawesome.com/676270b385.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php session_start(); require_once "../Menu/menu.php" ?>

    <h1 id="banner">DIY Part Picking</h1>

    <div id="partPicking" class="box">
        <fieldset id="mainComp">
            <legend>Main Component</legend>
            <form id="mainCompForm">
                <label for="cpuBrand">CPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label>

                <select id="cpuBrand" name="cpuBrand" class="selectStyle">
                    <option value="none" selected disabled hidden>Select a CPU Brand</option>
                    <option value="intel">Intel</option>
                    <option value="amd">AMD</option>
                </select>
                <br/>
                <br/>

                <label for="cpuType">CPU Type&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="cpuType" name="cpuType">
                    <!--Populated by JavaScript-->
                </select>
                <br/>
                <br/>

                <label for="cpu">CPU&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="cpu" name="cpu">
                    <!--Populated by JavaScript-->
                </select>
                <br/>
                <br/>
                <br/>

                <label for="moboChipset">Motherboard Chipset&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="moboChipset" name="moboChipset">
                    <!--Populated by JavaSript-->
                </select>
                <br/>
                <br/>

                <label for="mobo">Motherboard&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="mobo" name="mobo">
                    <!--Populated by JavaScript-->
                </select>
                <br/>
                <br/>
                <br/>

                <label for="gpuBrand">GPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="gpuBrand" name="gpuBrand">
                    <option value="none" selected disabled hidden>Select a GPU Brand</option>
                    <option value="nvidia">Nvidia</option>
                    <option value="amd">AMD</option>
                </select>
                <br/>
                <br/>

                <label for="gpuType">GPU Type&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="gpuType" name="gpuType">
                    <!--Populated by JavaScript-->
                </select>
                <br/>
                <br/>

                <label for="gpu">Graphics Card&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="gpu" name="gpu">
                    <!--Populated by JavaScript-->
                </select>
                <br/>
                <br/>
                <br/>

                <label for="ramConfig">Memory Configuration&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="ramConfig" name="ramConfig">
                    <option value="none" selected disabled hidden>Select a RAM configuration</option>
                    <option value="2x8">2 x 8GB (Recommended)</option>
                    <option value="2x16">2 x 16GB</option>
                    <option value="1x16">1 x 16GB</option>
                    <option value="2x4">2 x 4GB</option>
                    <option value="1x8">1 x 8GB</option>
                </select>
                <br/>
                <br/>

                <label for="ram">Memory Configuration&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="ram" name="ram">
                    <option value="none" selected disabled hidden>Select a RAM Speed</option>
                    <option value="4000mhz">4000mhz</option>
                    <option value="3600mhz">3600mhz</option>
                    <option value="3200mhz">3200mhz</option>
                    <option value="3000mhz">3000mhz</option>
                    <option value="2666mhz">2666mhz</option>
                </select>
                <br/>
                <br/>
                <br/>

                <label for="storageType">Storage Type &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="storageType" name="storageType">
                    <option value="none">Select Storage Type</option>
                    <option value="sataSsd">Sata SSD</option>
                    <option value="M2NvmeSsd">M.2 NVMe SSD</option>
                </select>
                <br/> 
                <br/>

                <label for="storageAmount"> Storage Amount&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="storageAmount" name="storageAmount">
                    <option value="none" selected disabled hidden> Select Amount of Storage </option>
                    <option value="256gb">256 GB</option>
                    <option value="500gb">500 GB (Recommended)</option>
                    <option value="1tb">1 TB</option>
                    <option value="2tb">2 TB</option>
                    <option value="4tb">4 TB</option>
                </select>
                 <br/>
                <br/>
                <br/>

                <label for="coolerType">CPU Cooler Type &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="coolerType" name="coolerType">
                    <option value="none" selected disabled hidden> Select CPU Cooler Type</option>
                    <option value="fan"> Fan </option>
                    <option value="liquid">Liquid</option>
                    
                </select>
                <br/>
                <br/>
                <label for="coolerSize">CPU Cooler Size &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="coolerSize" name="coolerSize">
                    <!--Populated by JavaScript-->
                    
                </select>
                <br/>
                <br/>
                <br/>

                <label for="case">Computer Case &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="case" name="case">
                    <option value="none" selected disabled hidden> Select a Computer Case</option>
                    <option value="mid"> Mid Tower </option>
                    <option value="full">Full Tower</option>
                    
                </select>
                <br/>
                <br/>
                <label for="caseSize">Computer Case Size &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="caseSize" name="caseSize">
                    <!--Populated by JavaScript-->
                    
                </select>
                <br/>
                <br/>
                <br/>
                <label for="powerBrand">Power Supply Brand &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="powerBrand" name="powerBrand">
                    <option value="none" selected disabled hidden> Select a Power Supply Brand</option>
                    <option value="evgaPower"> EVGA </option>
                    <option value="corsairPower"> Corsair </option>
                    <option value="coolermasterPower"> Cooler Master </option>
                    <option value="thermaltakePower"> Thermaltake </option>
                    
                </select>
                <br/>
                <br/>
                <label for="powerWatt">Power Supply Wattage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="powerWatt" name="powerWatt">
                    <!--Populated by JavaScript-->
                    
                </select>
                <br/>
                <br/>
                <br/>
                </div>
            </form>
        </fieldset>
    </div>

    <script type="text/javascript" src="PCBuildingWizard.js"></script>
</body>

</html>
