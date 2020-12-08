<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="Wizard.css" />
    <link rel="icon" href="../pc_icon.png">
    <style>
        div#button {
            text-align: center;
            padding-top: 20px;
            padding-bottom: 30px;
        }
    </style>
</head>

<body>
    <?php require_once "../Menu/nav.php";
    ob_start();
    $_SESSION['redirect'] = "../DIY_BuildPage/PCBuildingWizard.php";

    //Function to sort the database
    function sortDatabase($line)
    {
        $outputArr = array();

        for ($i = 0; $i < count($line); $i++) {
            $tempArr = array();
            if ($i % 3 == 0 && $i != 0) {
                array_push($tempArr, $line[$i - 2], $line[$i - 1], $line[$i]);
            }
            if (!empty($tempArr)) {
                array_push($outputArr, $tempArr);
            }
        }

        for ($i = 0; $i < (count($outputArr) - 1); $i++) {
            for ($j = $i + 1; $j < count($outputArr); $j++) {
                if ($outputArr[$i][2] < $outputArr[$j][2]) {
                    $tempArr = $outputArr[$i];
                    $outputArr[$i] = $outputArr[$j];
                    $outputArr[$j] = $tempArr;
                }
            }
        }

        return $outputArr;
    }

    //Function to check the compatibility of the computer parts
    function checkCompatibility($value){
        $myfile = fopen("../Database/compatibility.txt", "r");
        $contents = fread($myfile, filesize("../Database/compatibility.txt"));
        $lines = explode("\n", $contents);

        if(strcmp($value, "intel10thcpu") == 0){
            $intel10thcpu = explode("\t", $lines[0]);
            return $intel10thcpu;
        }
        if(strcmp($value, "intel9thcpu") == 0){
            $intel9thcpu = explode("\t", $lines[1]);
            return $intel9thcpu;
        }
        if(strcmp($value, "amd5000scpu") == 0){
            $amd5000scpu = explode("\t", $lines[2]);
            return $amd5000scpu;
        }
        if(strcmp($value, "amd3000scpu") == 0){
           $amd3000scpu = explode("\t", $lines[3]);
           return $amd3000scpu;
        }
        if(strcmp($value, "intel10thmobo") == 0){
            $intel10thmobo = explode("\t", $lines[4]);
            return $intel10thmobo;
        }
        if(strcmp($value, "intel9thmobo") == 0){
            $intel9thmobo = explode("\t", $lines[5]);
            return $intel9thmobo;
        }
        if(strcmp($value, "amd5000smobo") == 0){
            $amd5000smobo = explode("\t", $lines[6]);
            return $amd5000smobo;
        }
        if(strcmp($value, "amd3000smobo") == 0){
            $amd3000smobo = explode("\t", $lines[7]);
            return $amd3000smobo;
        }
    }
    //function to generate the database for computer parts that will be used for the selection menu
    function generateDatabase($item, $value)
    {
        $products = fopen("../Database/products.txt", "r");
        $contents = fread($products, filesize("../Database/products.txt"));
        $lines = explode("\n", $contents);
        fclose($products);
        $line = "";
        $outputArr = array();

        for ($i = 0; $i < count($lines); $i++) {
            $line = explode("\t", $lines[$i]);
            if (strcmp($item, $line[0]) == 0) {
                break;
            } else {
                continue;
            }
        }

        if (!empty($line)) {
            $line = sortDatabase($line);
            if (strcmp($value, "text") == 0) {
                array_push($outputArr, "Select");
                for ($i = 0; $i < count($line); $i++) {
                    $pushItem = $line[$i][1] . " ($" . $line[$i][2] . ")";
                    array_push($outputArr, $pushItem);
                }
                return $outputArr;
            }

            if (strcmp($value, "value") == 0) {
                array_push($outputArr, "none");
                for ($i = 0; $i < count($line); $i++) {
                    array_push($outputArr, $line[$i][0]);
                }
                return $outputArr;
            }
        } else {
            return false;
        }
    }

    ?>


    <div>
        <h1 id="banner">DIY Part Picking</h1>
    </div>


    <div id="partPicking" class="box">

        <table border="0">
            <form id="mainCompForm" method="POST">
                <p id="debugMessage"></p>

                <tr>
                    <td class="label"><label for="cpuBrand">CPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                        <!--option to choose between intel or amd cpu-->
                    <td><select id="cpuBrand" name="cpuBrand" class="selectStyle">
                            <option value="none" selected disabled hidden>Select a CPU Brand</option>
                            <option value="intel">Intel</option>
                            <option value="amd">AMD</option>
                        </select></td>

                </tr>
                <tr>    
                    <!--Select menu for cpu-->
                    <td class="label"><label for="cpu">CPU&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="cpu" name="cpu" onchange="checkCompatibility()">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>

                <tr>
                        <!--select menu for motherboard chipset-->
                    <td class="label"><label for="moboChipset">Motherboard Chipset&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="moboChipset" name="moboChipset">
                            <!--Populated by JavaSript-->
                        </select>
                        <p id="message"></p>
                    </td>
                </tr>
                <tr>
                    <!--Selection menu for motherboard type-->
                    <td class="label"><label for="mobo">Motherboard&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="mobo" name="mobo">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>
                <tr>
                    <!--Selection menu for ram size-->
                    <td class="label"><label for="ramConfig">Memory Configuration&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
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
                    <!--Selection menu for ram speed-->
                    <td class="label"><label for="ram">Memory Configuration&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
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
                    <!--Selection menu for gpu brand-->
                    <td class="label"><label for="gpuBrand">GPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="gpuBrand" name="gpuBrand">
                            <option value="none" selected disabled hidden>Select a GPU Brand</option>
                            <option value="nvidia">Nvidia</option>
                            <option value="amd">AMD</option>
                        </select></td>
                </tr>
                <tr>
                    <!--Selection menu for gpu type-->
                    <td class="label"><label for="gpu">Graphics Card&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="gpu" name="gpu">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>
                <tr>
                    <!-- Selection menu for storage type-->
                    <td class="label"><label for="storageType">Storage Type &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="storageType" name="storageType">
                            <option value="none">Select Storage Type</option>
                            <option value="sataSsd">Sata SSD</option>
                            <option value="M2NvmeSsd">M.2 NVMe SSD</option>
                        </select></td>
                </tr>
                <tr>
                    <!--Selection menu for storage size-->
                    <td class="label"><label for="storageAmount"> Storage Amount&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
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
                    <!--Selection menu for cooler type-->
                    <td class="label"><label for="coolerType">CPU Cooler Type &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="coolerType" name="coolerType">
                            <option value="none" selected disabled hidden> Select CPU Cooler Type</option>
                            <option value="fan"> Fan </option>
                            <option value="liquid">Liquid</option>

                        </select></td>
                </tr>
                <tr>
                    <!--Selection menu for cooler size-->
                    <td class="label"><label for="coolerSize">CPU Cooler Size &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="coolerSize" name="coolerSize">
                            <!--Populated by JavaScript-->

                        </select></td>
                </tr>
                <tr>
                    <!--Selection menu for computer case type-->
                    <td class="label"><label for="case">Computer Case &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="case" name="case">
                            <option value="none" selected disabled hidden> Select a Computer Case</option>
                            <option value="mid"> Mid Tower </option>
                            <option value="full">Full Tower</option>

                        </select></td>
                </tr>
                <tr><!--Selection for computer case variety-->
                    <td class="label"><label for="caseSize">Computer Case Size &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="caseSize" name="caseSize">
                            <!--Populated by JavaScript-->

                        </select></td>
                </tr>
                <tr>
                    <!--Selection menu for power supply brand-->
                    <td class="label"><label for="powerBrand">Power Supply Brand &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="powerBrand" name="powerBrand">
                            <option value="none" selected disabled hidden> Select a Power Supply Brand</option>
                            <option value="evgaPower"> EVGA </option>
                            <option value="corsairPower"> Corsair </option>
                            <option value="coolermasterPower"> Cooler Master </option>
                            <option value="thermaltakePower"> Thermaltake </option>

                        </select></td>
                </tr>
                <tr>
                    <!--Selection menu for power supply wattage-->
                    <td class="label"><label for="powerWatt">Power Supply Wattage&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="powerWatt" name="powerWatt">

                        </select>
                    </td>
                </tr>
        </table>
        <div id="button">

                <?php
                //add to cart option
                include "../Account/addToCart.php";
                ob_flush();
                ?>
        </div>
        </form>
    </div>

    <script type="text/javascript">
        //calling database to be used and to populate the selection menu
        var CPU_Data = {
            'cpu': {
                intel: {
                    text: <?php echo json_encode(generateDatabase("CPU Intel", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CPU Intel", "value")) ?>,
                },

                amd: {
                    text: <?php echo json_encode(generateDatabase("CPU AMD", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CPU AMD", "value")) ?>,
                }
            }
        }

        var Mobo_Data = {
            'moboChipset': {
                intel: {
                    text: <?php echo json_encode(generateDatabase("Intel Motherboard Chipset", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("Intel Motherboard Chipset", "value")) ?>,
                },

                amd: {
                    text: <?php echo json_encode(generateDatabase("AMD Motherboard Chipset", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("AMD Motherboard Chipset", "value")) ?>,
                }
            },

            'mobo': {
                Z490: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD Z490", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD Z490", "value")) ?>,
                },

                H470: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD H470", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD H470", "value")) ?>,
                },

                B460: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD B460", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD B460", "value")) ?>,
                },

                H410: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD H410", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD H410", "value")) ?>,
                },

                Z390: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD Z390", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD Z390", "value")) ?>,
                },

                H310: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD H310", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD H310", "value")) ?>,
                },

                B365: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD B365", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD B365", "value")) ?>,
                },

                X570: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD X570", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD X570", "value")) ?>,
                },

                B550: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD B550", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD B550", "value")) ?>,
                },

                B450: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD B450", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD B450", "value")) ?>,
                },

                A520: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD A520", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD A520", "value")) ?>,
                },

                A320: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD A320", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD A320", "value")) ?>,
                }
            }
        }

        var GPU_Data = {
            'gpu': {
                nvidia: {
                    text: <?php echo json_encode(generateDatabase("GPU Nvidia", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("GPU Nvidia", "value")) ?>,
                },

                amd: {
                    text: <?php echo json_encode(generateDatabase("GPU AMD", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("GPU AMD", "value")) ?>,
                }
            }
        }

        var Cooler_Data = {

            'coolerSize': {
                fan: {
                    text: <?php echo json_encode(generateDatabase("Cooler size fan", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("Cooler size fan", "value")) ?>,
                },

                liquid: {
                    text: <?php echo json_encode(generateDatabase("Cooler size liquid", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("Cooler size liquid", "value")) ?>,
                },
            }
        };

        var Case_Data = {

            'caseSize': {
                mid: {
                    text: <?php echo json_encode(generateDatabase("CASE Medium", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CASE Medium", "value")) ?>,
                },

                full: {
                    text: <?php echo json_encode(generateDatabase("CASE Full", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CASE Full", "value")) ?>,
                },
            }
        };
        var Power_Data = {

            'powerWatt': {
                evgaPower: {
                    text: <?php echo json_encode(generateDatabase("POWER SUPPLY EVGA", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("POWER SUPPLY EVGA", "value")) ?>,
                },

                corsairPower: {
                    text: <?php echo json_encode(generateDatabase("POWER SUPPLY Corsair", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("POWER SUPPLY Corsair", "value")) ?>,
                },
                coolermasterPower: {
                    text: <?php echo json_encode(generateDatabase("POWER SUPPLY CoolerMaster", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("POWER SUPPLY CoolerMaster", "value")) ?>,
                },
                thermaltakePower: {
                    text: <?php echo json_encode(generateDatabase("POWER SUPPLY ThermalTakel", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("POWER SUPPLY ThermalTake", "value")) ?>,
                },

            },

        };

        //checking compatibility of parts
        function checkCompatibility(){
            var moboChipset = document.getElementById("moboChipset").value;
            var cpu = document.getElementById("cpu").value;
            var cpuBrand = document.getElementById("cpuBrand").value;

            if(cpu != "none" && moboChipset != "none" && cpuBrand == "intel"){
                var intel9thcpu = <?php echo json_encode(checkCompatibility("intel9thcpu"))?>;
                var intel10thcpu = <?php echo json_encode(checkCompatibility("intel10thcpu"))?>;
                var intel9thmobo = <?php echo json_encode(checkCompatibility("intel9thmobo"))?>;
                var intel10thmobo = <?php echo json_encode(checkCompatibility("intel10thmobo"))?>;

                
                if(intel9thcpu.indexOf(cpu) >= 0){
                    document.getElementById("message").innerHTML = intel9thcpu.find(cpu);
                    if(intel9thmobo.indexOf(moboChipset) == -1){
                        document.getElementById("message").innerHTML = "Your motherboard chipset is not compatible with your cpu, please choose another chipset!";
                    } else{
                        document.getElementById("message").innerHTML = "";
                    }
                } else if(intel10thcpu.indexOf(cpu) >= 0){
                    if(intel10thmobo.indexOf(moboChipset) == -1){
                        document.getElementById("message").innerHTML = "Your motherboard chipset is not compatible with your cpu, please choose another chipset!";
                    } else{
                        document.getElementById("message").innerHTML = "";
                    }
                }
            } else if(cpu != "none" && moboChipset != "none" && cpuBrand == "amd"){
                var amd3000scpu = <?php echo json_encode(checkCompatibility("amd3000scpu"))?>;
                var amd5000scpu = <?php echo json_encode(checkCompatibility("amd5000scpu"))?>;
                var amd3000smobo = <?php echo json_encode(checkCompatibility("amd3000smobo"))?>;
                var amd5000smobo = <?php echo json_encode(checkCompatibility("amd5000smobo"))?>;
                
                if(amd3000scpu.indexOf(cpu) >= 0){
                    if(amd3000smobo.indexOf(moboChipset) == -1){
                        document.getElementById("message").innerHTML = "Your motherboard chipset is not compatible with your cpu, please choose another chipset!";
                    } else{
                        document.getElementById("message").innerHTML = "";
                    }
                } else if(amd5000scpu.indexOf(cpu) >= 0){
                    if(amd5000smobo.indexOf(moboChipset) == -1){
                        document.getElementById("message").innerHTML = "Your motherboard chipset is not compatible with your cpu, please choose another chipset!";
                    } else {
                        document.getElementById("message").innerHTML = "";
                    }
                }
            }
        }

        //function for removing selection menus that cannot be called if the previous options are not checked
        function removeAllOptions(sel, removeGrp) {
            var len, groups, par;
            if (removeGrp) {
                groups = sel.getElementsByTagName('optgroup');
                len = groups.length;
                for (var i = len; i; i--) {
                    sel.removeChild(groups[i - 1]);
                }
            }

            len = sel.options.length;
            for (var i = len; i; i--) {
                par = sel.options[i - 1].parentNode;
                par.removeChild(sel.options[i - 1]);
            }
        }
        //if the previous data are check then continu with the rest of the data

        function appendDataToSelect(sel, obj) {
            var f = document.createDocumentFragment();
            var labels = [],
                group, opts;

            function addOptions(obj) {
                var f = document.createDocumentFragment();
                var o;

                for (var i = 0, len = obj.text.length; i < len; i++) {
                    o = document.createElement('option');
                    o.appendChild(document.createTextNode(obj.text[i]));

                    if (obj.value) {
                        o.value = obj.value[i];
                    }

                    f.appendChild(o);
                }
                return f;
            }

            if (obj.text) {
                opts = addOptions(obj);
                f.appendChild(opts);
            } else {
                for (var prop in obj) {
                    if (obj.hasOwnProperty(prop)) {
                        labels.push(prop);
                    }
                }

                for (var i = 0, len = labels.length; i < len; i++) {
                    group = document.createElement('optgroup');
                    group.label = labels[i];
                    f.appendChild(group);
                    opts = addOptions(obj[labels[i]]);
                    group.appendChild(opts);
                }
            }
            sel.appendChild(f);
        }

        document.forms['mainCompForm'].elements['cpuBrand'].onchange = function(e) {
            var cpuMenu = this.form.elements['cpu'];
            var cpu = CPU_Data['cpu'][this.value];
            var moboChipsetMenu = this.form.elements['moboChipset'];
            var moboMenu = this.form.elements['mobo'];
            var moboChipset = Mobo_Data['moboChipset'][this.value];
            removeAllOptions(cpuMenu, true);
            removeAllOptions(moboChipsetMenu, true);
            removeAllOptions(moboMenu, true);

            appendDataToSelect(cpuMenu, cpu);
            appendDataToSelect(moboChipsetMenu, moboChipset);

        };

        //Dynamic Select Box for Motherboard
        document.forms['mainCompForm'].elements['moboChipset'].onchange = function(g) {
            var moboMenu = this.form.elements['mobo'];
            var mobo = Mobo_Data['mobo'][this.value];

            removeAllOptions(moboMenu, true);
            appendDataToSelect(moboMenu, mobo);

            checkCompatibility();
        };

        document.forms['mainCompForm'].elements['gpuBrand'].onchange = function(s) {
            var gpuMenu = this.form.elements['gpu'];
            var gpu = GPU_Data['gpu'][this.value];

            removeAllOptions(gpuMenu, true);
            appendDataToSelect(gpuMenu, gpu);
        };

        document.forms['mainCompForm'].elements['coolerType'].onchange = function(s) {
            var coolerSizeMenu = this.form.elements['coolerSize'];
            var coolerSize = Cooler_Data['coolerSize'][this.value];

            removeAllOptions(coolerSizeMenu, true);
            appendDataToSelect(coolerSizeMenu, coolerSize);
        };
        document.forms['mainCompForm'].elements['case'].onchange = function(s) {
            var caseSizeMenu = this.form.elements['caseSize'];
            var caseSize = Case_Data['caseSize'][this.value];

            removeAllOptions(caseSizeMenu, true);
            appendDataToSelect(caseSizeMenu, caseSize);
        };
        document.forms['mainCompForm'].elements['powerBrand'].onchange = function(s) {
            var powerWattMenu = this.form.elements['powerWatt'];
            var powerWatt = Power_Data['powerWatt'][this.value];


            removeAllOptions(powerWattMenu, true);


            appendDataToSelect(powerWattMenu, powerWatt);
        };
    </script>
</body>

</html>
