var CPU_Type_Data = {
    'cpuType': { //name of associated select box

        intel: {
            text: ['Select a CPU Type', 'Intel Core i9', 'Intel Core i7', 'Intel Core i5', 'Intel Core i3', 'Intel Pentium Gold'],
            value: ['none', 'i9', 'i7', 'i5', 'i3', 'pentium'],
        },

        amd: {
            text: ['Select a CPU Type', 'AMD Ryzen 9', 'AMD Ryzen 7', 'AMD Ryzen 5', 'AMD Ryzen 3', 'AMD Athlon'],
            value: ['none', 'r9', 'r7', 'r5', 'r3', 'athlon'],
        }
    }
};

var CPU_Data = {
    'cpu': {

        i9: {
            text: ['Select a CPU', 'Intel Core i9 10900K', 'Intel Core i9 10900KF', 'Intel Core i9 10850K', 'Intel Core i9 10900', 'Intel Core i9 10900F', 'Intel Core i9 9900K',
                'Intel Core i9 9900KF', 'Intel Core i9 9900'],
            value: ['none', '10900K', '10900KF', '10850K', '10900', '10900F', '9900K', '9900KF', '9900'],
        },

        i7: {
            text: ['Select a CPU', 'Intel Core i7 10700K', 'Intel Core i7 10700KF', 'Intel Core i7 10700', 'Intel Core i7 9700K', 'Intel Core i7 9700KF', 'Intel Core i7 9700',
                'Intel Core i7 9700F'],
            value: ['none', '10700K', '10700KF', '10700', '9700K', '9700KF', '9700', '9700F'],
        },

        i5: {
            text: ['Select a CPU', 'Intel Core i5 10600K', 'Intel Core i5 10600KF', 'Intel Core i5 10600', 'Intel Core i5 10400', 'Intel Core i5 10400F', 'Intel Core i5 9600K',
                'Intel Core i5 9600KF', 'Intel Core i5 9400', 'Intel Core i5 9400F'],
            value: ['none', '10600K', '10600KF', '10600', '10400', '10400F', '9600K', '9600KF', '9400', '9400F'],
        },

        i3: {
            text: ['Select a CPU', 'Intel Core i3 10300', 'Intel Core i3 10100', 'Intel Core i3 10100F', 'Intel Core i3 9100', 'Intel Core i3 9100F'],
            value: ['none', '10300', '10100', '10100F', '9100', '9100F'],
        },

        pentium: {
            text: ['Select a CPU', 'Intel Pentium Gold G5500', 'Intel Pentium Gold G6400', 'Intel Pentium Gold G5400'],
            value: ['none', 'G5500', 'G6400', 'G5400'],
        },

        r9: {
            text: ['Select a CPU', 'AMD Ryzen 9 5950X', 'AMD Ryzen 9 5900X', 'AMD Ryzen 9 3950X', 'AMD Ryzen 9 3900XT', 'AMD Ryzen 9 3900X'],
            value: ['none', '5950X', '5900X', '3950X', '3900XT', '3900X'],
        },

        r7: {
            text: ['Select a CPU', 'AMD Ryzen 7 5800X', 'AMD Ryzen 7 3800XT', 'AMD Ryzen 7 3800X', 'AMD Ryzen 7 3700X', 'AMD Ryzen 7 2700X'],
            value: ['none', '5800X', '3800XT', '3800X', '3700X', '2700X'],
        },

        r5: {
            text: ['Select a CPU', 'AMD Ryzen 5 5600X', 'AMD Ryzen 5 3600XT', 'AMD Ryzen 5 3600X', 'AMD Ryzen 5 3600', 'AMD Ryzen 5 3400G', 'AMD Ryzen 5 2600X'],
            value: ['none', '5600X', '3600XT', '3600X', '3600', '3400G', '2600X'],
        },

        r3: {
            text: ['Select a CPU', 'AMD Ryzen 3 3300X', 'AMD Ryzen 3 3100', 'AMD Ryzen 3 3200G'],
            value: ['none', '3300X', '3100', '3200G'],
        },

        athlon: {
            text: ['Select a CPU', 'AMD Athlon 220GE', 'AMD Athlon 200GE'],
            value: ['none', '220GE', '200GE'],
        },
    }
};

var Mobo_Chipset_Data = {
    'moboChipset': {
        intel: {
            text: ['Select a motherboard chipset', 'Z490', 'H470', 'H410', 'B460', 'Z390', 'H310', 'B365'],
            value: ['none', 'Z490', 'H470', 'H410', 'B460', 'Z390', 'H310', 'B365'],
        },

        amd: {
            text: ['Select a motherboard chipset', 'X570', 'B550', 'B450', 'A520', 'A320'],
            value: ['none', 'X570', 'B550', 'B450', 'A520', 'A320'],
        },
    }
};

var Mobo_Data = {
    'mobo': {
        Z490: {
            text: ['Select a motherboard', 'Asrock Z490M Pro4', 'MSI MAG Z490 TOMAHAWK', 'Asus ROG MAXIMUS XII EXTREME'],
            value: ['none', 'asrockZ490', 'msiTomahawkZ490', 'asusMaximus'],
        },
        
        H470: {
            text: ['Select a motherboard', 'Asrock H470M Pro4', 'Gigabyte H470M DS3H', 'Asus ROG Strix H470-I Gaming'],
            value: ['none', 'asrockH470', 'gigabyteH470', 'asusH470']
        },

        H410: {
            text: ['Select a motherboard', 'MSI H410M Pro', 'Asrock H410M-HDV/M.2'],
            value: ['none', 'msiH410', 'asrockH410'],
        },

        B460: {
            text: ['Select a motherboard', 'Asrock B460M Pro4', 'MSI MAG B460M Tomahawk', 'Gigabyte B460 AORUS PRO AC'],
            value: ['none', 'asrockB460', 'msiB460', 'gigabyteB460'],
        },

        Z390: {
            text: ['Select a motherboard', 'MSI Z390-A PRO', 'Asus Prime Z390-A', 'Gigabyte Z390 AORUS ULTRA'],
            value: ['none', 'msiZ390', 'asusZ390', 'gigabyteZ390'],
        },

        H310: {
            text: ['Select a motherboard', 'Asus Prime H310M-E R2.0', 'Gigabyte H310M S2P', 'Asrock H310CM-HDV'],
            value: ['none', 'asusH310', 'gigabyteH310', 'asrockH310'],
        },

        B365: {
            text: ['Select a motherboard', 'Gigabyte B365M DS3H', 'Asrock B365M Pro4', 'MSI MAG B365M Mortar'],
            value: ['none', 'gigabyteB365', 'asrockB365', 'msiB365'],
        },

        X570: {
            text: ['Select a motherboard', 'Asus Prime X570-P', 'MSI MAG X570 Tomahawk WIFI', 'Asus ROG Crosshair VIII Hero'],
            value: ['none', 'asusX570P', 'msiX570Tomahawk', 'asusCrosshair'],
        },

        B550: {
            text: ['Select a motherboard', 'Asrock B550M Pro4', 'MSI MPG B550 Gaming PLUS', 'Gigabyte B550 AORUS Master'],
            value: ['none', 'asrockB550', 'msiB550', 'gigabyteB550'],
        },

        B450: {
            text: ['Select a motherboard', 'Asrock B450M Pro4', 'MSI B450 Tomahawk MAX', 'Asus ROG Strix B450-I Gaming'],
            value: ['none', 'asrockB450', 'msiB450Tomahawk', 'asusB450'],
        },

        A520: {
            text: ['Select a motherboard', 'Asrock A520M-HVS', 'MSI MAG A520M VECTOR Wifi'],
            value: ['none', 'asrockA520', 'msiA520'],
        },

        A320: {
            text: ['Select a motherboard', 'Gigabyte GA-A320M-S2H', 'Asus Prime A320I-K'],
            value: ['none', 'gigabyteA320', 'asusA320'],
        },
    }
};

var GPU_Data = {
    'gpu': {
        nvidia3000s: {
            text: ['Select a GPU', 'Nvidia RTX 3090', 'Nvidia RTX 3080', 'Nvidia RTX 3070'],
            value: ['none', '3090', '3080', '3070'],
        },

        nvidia2000s: {
            text: ['Select a GPU', 'Nvidia RTX 2080Ti', 'Nvidia RTX 2080 Super', 'Nvidia RTX 2080', 'Nvidia RTX 2070 Super', 'Nvidia RTX 2070', 'Nvidia RTX 2060 Super',
             'Nvidia RTX 2060'],
            value: ['none', '2080Ti', '2080S', '2080', '2070S', '2070', '2060S', '2060'],
        },

        nvidia1600s: {
            text: ['Select a GPU', 'Nvidia GTX 1660Ti', 'Nvidia GTX 1660 Super', 'Nvidia GTX 1660', 'Nvidia GTX 1650 Super', 'Nvidia GTX 1650'],
            value: ['none', '1660Ti', '1660S', '1660', '1650S', '1650'],
        },

        amdRx5000s: {
            text: ['Select a GPU', 'AMD RX 5700XT', 'AMD RX 5700', 'AMD RX 5600XT', 'AMD RX 5500XT'],
            value: ['none', '5700XT', '5700', '5600XT', '5500XT'],
        },
    }, 

    'gpuType': {
        nvidia: {
            text: ['Select a GPU Type', 'Nvidia RTX 3000 Series', 'Nvidia RTX 2000 Series', 'Nvidia GTX 1600 Series'],
            value: ['none', 'nvidia3000s', 'nvidia2000s', 'nvidia1600s'],
        },

        amd: {
            text: ['Select a GPU Type', 'AMD RX 5000 Series'],
            value: ['none', 'amdRx5000s'],
        },
    }
};

var Cooler_Data = {

    'coolerSize': {
        fan: {
            text: ['Select a cpu fan cooler size', '80mm fan size', '92mm fan size', '120mm fan size', '140mm fan size'],
            value: ['none', '80mm', '92mm', '120mm','140mm'],
        },

        liquid: {
            text: ['Select a liquid cpu cooler radiator size (fans included)', '240mm radiator size','280mm radiator size',],
            value: ['none', '240mm','280mm'],
        },
    }
};

var Case_Data = {

    'caseSize': {
        mid: {
            text: ['Select a computer case', 'Lian Li Lancool II Mesh', 'Corsair 4000D Airflow', 'MetallicGear Neo Air', 'Cooler Master H500','NZXT H510 Elite','Corsair Obsidian Series 500D RGB SE','Fractal Design Define 7','Phanteks Eclipse P500A'],
            value: ['none', 'lianlilancooliimesh', 'corsair4000dairflow', 'metallicgearneoair','coolermasterh500','nzxth510elite','corsairobsidianseries500drgbse','fractaldesigndefine7','phantekseclipsep500a'],
        },

        full: {
            text: ['Select a computer case', 'Corsair 1000D','Cooler Master Cosmos C700P','be quiet! Dark Base Pro 900','Thermaltake View 71','Phanteks Enthoo Pro'],
            value: ['none', 'corsair1000d','coolermastercosmosc700p','bequietdarkbasepro900','thermaltakeview71','phanteksenthoopro'],
        },
    }
};
var Power_Data = {

    'powerWatt': {
        evgaPower: {
            text: ['Select a power supply efficiency', '500 W', '750 W', '1000 W'],
            value: ['none', '500w', '750w', '1000w'],
        },

        corsairPower: {
            text: ['Select a power supply efficiency', '500 W', '750 W', '1000 W'],
            value: ['none', '500w', '750w', '1000w'],
        },
        coolermasterPower: {
            text: ['Select a power supply efficiency', '500 W', '750 W', '1000 W'],
            value: ['none', '500w', '750w', '1000w'],
        },
        thermaltakePower: {
            text: ['Select a power supply efficiency', '500 W', '750 W', '1000 W'],
            value: ['none', '500w', '750w', '1000w'],
        },

    },

};
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
    var labels = [], group, opts;

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
document.forms['mainCompForm'].elements['cpuBrand'].onchange = function (e) {
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
document.forms['mainCompForm'].elements['cpuType'].onchange = function (f) {
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
