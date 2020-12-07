<!DOCTYPE html>

<?php

function generateDatabase($item, $value)
{
    $products = fopen("../Database/products.txt", "r");
    $contents = fread($products, filesize("../Database/products.txt"));
    $lines = explode("\n", $contents);
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
        if (strcmp($value, "text") == 0) {
            array_push($outputArr, "Select");
            for ($i = 0; $i < count($line); $i++) {
                $countIndex = $i + 1;
                if ($countIndex % 3 == 0) {
                    array_push($outputArr, $line[$i]);
                }
            }
            return $outputArr;
        }

        if (strcmp($value, "value") == 0) {
            array_push($outputArr, "none");
            for ($i = 0; $i < count($line); $i++) {
                $countIndex = $i + 2;
                if ($countIndex % 3 == 0) {
                    array_push($outputArr, $line[$i]);
                }
            }
            return $outputArr;
        }
    } else {
        return false;
    }
}
?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="Wizard.css" />
</head>

<body>
    <?php require_once "../Menu/nav.php";
    ob_start();
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

                    <td><select id="cpuBrand" name="cpuBrand" class="selectStyle">
                            <option value="none" selected disabled hidden>Select a CPU Brand</option>
                            <option value="intel">Intel</option>
                            <option value="amd">AMD</option>
                        </select></td>

                </tr>
                <tr>
                    <td class="label"><label for="cpuType">CPU Type&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="cpuType" name="cpuType">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="cpu">CPU&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="cpu" name="cpu">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>

                <tr>
                    <td class="label"><label for="moboChipset">Motherboard Chipset&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="moboChipset" name="moboChipset">
                            <!--Populated by JavaSript-->
                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="mobo">Motherboard&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="mobo" name="mobo">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>
                <tr>
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
                    <td class="label"><label for="gpuBrand">GPU Brand&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="gpuBrand" name="gpuBrand">
                            <option value="none" selected disabled hidden>Select a GPU Brand</option>
                            <option value="nvidia">Nvidia</option>
                            <option value="amd">AMD</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="gpuType">GPU Type&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="gpuType" name="gpuType">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="gpu">Graphics Card&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="gpu" name="gpu">
                            <!--Populated by JavaScript-->
                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="storageType">Storage Type &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="storageType" name="storageType">
                            <option value="none">Select Storage Type</option>
                            <option value="sataSsd">Sata SSD</option>
                            <option value="M2NvmeSsd">M.2 NVMe SSD</option>
                        </select></td>
                </tr>
                <tr>
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
                    <td class="label"><label for="coolerType">CPU Cooler Type &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="coolerType" name="coolerType">
                            <option value="none" selected disabled hidden> Select CPU Cooler Type</option>
                            <option value="fan"> Fan </option>
                            <option value="liquid">Liquid</option>

                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="coolerSize">CPU Cooler Size &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="coolerSize" name="coolerSize">
                            <!--Populated by JavaScript-->

                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="case">Computer Case &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="case" name="case">
                            <option value="none" selected disabled hidden> Select a Computer Case</option>
                            <option value="mid"> Mid Tower </option>
                            <option value="full">Full Tower</option>

                        </select></td>
                </tr>
                <tr>
                    <td class="label"><label for="caseSize">Computer Case Size &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="caseSize" name="caseSize">
                            <!--Populated by JavaScript-->

                        </select></td>
                </tr>
                <tr>
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
                    <td class="label"><label for="powerWatt">Power Supply Wattage&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                    <td><select id="powerWatt" name="powerWatt">

                        </select>
                    </td>
                </tr>
            </form>
        </table>
    </div>

    <div id="button">
        <?php
        include "../Account/addToCart.php";
        ob_flush();
        ?>
    </div>

    <script type="text/javascript">
        var CPU_Data = {
            'cpu': {
                intel10th: {
                    text: <?php echo json_encode(generateDatabase("CPU Intel 10th", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CPU Intel 10th", "value")) ?>,
                },

                intel9th: {
                    text: <?php echo json_encode(generateDatabase("CPU Intel 9th", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CPU Intel 9th", "value")) ?>,
                },

                amd5000s: {
                    text: <?php echo json_encode(generateDatabase("CPU AMD 5000s", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CPU AMD 5000s", "value")) ?>,
                },

                amd3000s: {
                    text: <?php echo json_encode(generateDatabase("CPU AMD 3000s", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("CPU AMD 3000s", "value")) ?>,
                }
            },

            'cpuType': {
                intel: {
                    text: <?php echo json_encode(generateDatabase("Intel CPU Generation", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("Intel CPU Generation", "value")) ?>,
                },

                amd: {
                    text: <?php echo json_encode(generateDatabase("AMD CPU Generation", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("AMD CPU Generation", "value")) ?>,
                }
            }
        }

        var Mobo_Data = {
            'moboChipset': {
                intel9th: {
                    text: <?php echo json_encode(generateDatabase("Intel 9th Gen Motherboard Chipset", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("Intel 9th Gen Motherboard Chipset", "value")) ?>,
                },

                intel10th: {
                    text: <?php echo json_encode(generateDatabase("Intel 10th Gen Motherboard Chipset", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("Intel 10th Gen Motherboard Chipset", "value")) ?>,
                },

                amd3000s: {
                    text: <?php echo json_encode(generateDatabase("AMD 3000s Motherboard Chipset", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("AMD 3000s Motherboard Chipset", "value")) ?>,
                },

                amd5000s: {
                    text: <?php echo json_encode(generateDatabase("AMD 5000s Motherboard Chipset", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("AMD 5000s Motherboard Chipset", "value")) ?>,
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

                X470: {
                    text: <?php echo json_encode(generateDatabase("MOTHERBOARD X470", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("MOTHERBOARD X470", "value")) ?>,
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
            'gpuType': {
                nvidia: {
                    text: <?php echo json_encode(generateDatabase("Nvidia GPU Series", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("Nvidia GPU Series", "value")) ?>,
                },

                amd: {
                    text: <?php echo json_encode(generateDatabase("AMD GPU Series", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("AMD GPU Series", "value")) ?>,
                }
            },

            'gpu': {
                nvidia3000s: {
                    text: <?php echo json_encode(generateDatabase("GPU Nvidia 3000s", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("GPU Nvidia 3000s", "value")) ?>,
                },

                nvidia2000s: {
                    text: <?php echo json_encode(generateDatabase("GPU Nvidia 2000s", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("GPU Nvidia 2000s", "value")) ?>,
                },

                nvidia1600s: {
                    text: <?php echo json_encode(generateDatabase("GPU Nvidia 1600s", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("GPU Nvidia 1600s", "value")) ?>,
                },

                amdRx5000s: {
                    text: <?php echo json_encode(generateDatabase("GPU AMD 5000s", "text")) ?>,
                    value: <?php echo json_encode(generateDatabase("GPU AMD 5000s", "value")) ?>,
                }
            }
        }

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
            var cpuTypeMenu = this.form.elements['cpuType'];
            var cpuMenu = this.form.elements['cpu'];
            var cpuType = CPU_Data['cpuType'][this.value];

            removeAllOptions(cpuTypeMenu, true);
            removeAllOptions(cpuMenu, true);
            appendDataToSelect(cpuTypeMenu, cpuType);

        };

        //Dynamic Select Box for CPU
        document.forms['mainCompForm'].elements['cpuType'].onchange = function(f) {
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
        };

        //Dynamic Select Box for GPU Type
        document.forms['mainCompForm'].elements['gpuBrand'].onchange = function(s) {
            var gpuTypeMenu = this.form.elements['gpuType'];
            var gpuMenu = this.form.elements['gpu'];
            var gpuType = GPU_Data['gpuType'][this.value];

            removeAllOptions(gpuTypeMenu, true);
            removeAllOptions(gpuMenu, true);
            appendDataToSelect(gpuTypeMenu, gpuType);
        };

        document.forms['mainCompForm'].elements['gpuType'].onchange = function(s) {
            var gpuMenu = this.form.elements['gpu'];
            var gpu = GPU_Data['gpu'][this.value];

            removeAllOptions(gpuMenu, true);
            appendDataToSelect(gpuMenu, gpu);
        };
    </script>
</body>

</html>