<?php
function dynamic_select($the_array, $element_name, $label, $init_value)
{
    $menu = '';
    if ($label != '') {
        $menu .= '<label for="' . $element_name . '">' . $label . '</label>';
    }
    $menu .= '<select name="' . $element_name . '" id="' . $element_name . '">';

    if (empty($_REQUEST[$element_name])) {
        $curr_val = $init_value;
    } else {
        $curr_val = $_REQUEST[$element_name];
    }
    foreach ($the_array as $key => $value) {
        $menu .= '<option value="' . $key . '"';
        if ($key == $curr_val) {
            $menu .= ' selected="selected"';
        }
        $menu .= '>' . $value . '</option>';
    }
    $menu .= '</select>';
    return $menu;
}

function generateDatabase($item, $value){
    $products = fopen("../Database/products.txt", "r");
    $contents = fread($products, filesize("../Database/products.txt"));
    $lines = explode("\n", $contents);
    $line = "";
    $outputArr = array();
    $cpuAMD = explode("\t", $lines[1]);
    $cpuIntel = explode("\t", $lines[0]);

    for($i = 0; $i < count($lines); $i++){
        $line = explode("\t", $lines[$i]);
        if(strcmp($item, $line[0]) == 0){
            break;
        } else{
            continue;
        }
    }

    if(!empty($line)){
        if(strcmp($value, "text") == 0){
            for($i = 0; $i < count($line); $i++){
                $countIndex = $i + 1;
                if($countIndex % 3 == 0){
                    array_push($outputArr, $line[$i]);
                }
            }
            return $outputArr;
        }

        if(strcmp($value, "value") == 0){
            for($i = 0; $i < count($line); $i++){
                $countIndex = $i + 2;
                if($countIndex % 3 == 0){
                    array_push($outputArr, $line[$i]);
                }
            }
        }
    } else{
        return false;
    }

}
?>
<html>
<script type="text/javascript">
    var CPU_Data = {
        'cpuType': {
            intel: {
                text: <?php echo json_encode(generateDatabase("CPU Intel", "text")) ?>,
                value: <?php echo json_encode(generateDatabase("CPU Intel", "value")) ?>,
            },

            amd: {
                text: <?php echo json_encode(generateDatabase("CPU amd", "text")) ?>,
                value: <?php echo json_encode(generateDatabase("CPU amd", "value")) ?>,
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

    //Dynamic select box for CPU Type and Motherboard Chipset
    document.forms['mainCompForm'].elements['cpuBrand'].onchange = function(e) {
        var cpuTypeMenu = this.form.elements['cpuType'];
        var cpuMenu = this.form.elements['cpu'];
        var moboChipsetMenu = this.form.elements['moboChipset'];
        var moboMenu = this.form.elements['mobo'];
        var cpuType = CPU_Type_Data['cpuType'][this.value];
        var moboChipset = Mobo_Chipset_Data['moboChipset'][this.value];



        removeAllOptions(cpuTypeMenu, true);
        removeAllOptions(cpuMenu, true);
        removeAllOptions(moboChipsetMenu, true);
        removeAllOptions(moboMenu, true);


        appendDataToSelect(cpuTypeMenu, cpuType);
        appendDataToSelect(moboChipsetMenu, moboChipset);

    };

    //Dynamic Select Box for CPU
    document.forms['mainCompForm'].elements['cpuType'].onchange = function(f) {
        var relName = 'cpu';
        var relList = this.form.elements[relName];
        var obj = CPU_Data[relName][this.value];

        removeAllOptions(relList, true);
        appendDataToSelect(relList, obj);
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

</html>