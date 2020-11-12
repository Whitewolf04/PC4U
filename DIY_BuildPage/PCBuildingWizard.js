var CPU_Type_Data = {
    'cpuType': { //name of associated select box

        intel: {
            text: ['Intel Core i9', 'Intel Core i7', 'Intel Core i5', 'Intel Core i3', 'Intel Pentium Gold'],
            value: ['i9', 'i7', 'i5', 'i3', 'pentium'],
        },

        amd: {
            text: ['AMD Ryzen 9', 'AMD Ryzen 7', 'AMD Ryzen 5', 'AMD Ryzen 3', 'AMD Athlon'],
            value: ['r9', 'r7', 'r5', 'r3', 'athlon'],
        }
    }
};

var CPU_Data = {
    'cpu': {

        i9: {
            text: ['Intel Core i9 10900K', 'Intel Core i9 10900KF', 'Intel Core i9 10850K', 'Intel Core i9 10900', 'Intel Core i9 10900F', 'Intel Core i9 9900K',
                'Intel Core i9 9900KF', 'Intel Core i9 9900'],
            value: ['10900K', '10900KF', '10850K', '10900', '10900F', '9900K', '9900KF', '9900'],
        },

        i7: {
            text: ['Intel Core i7 10700K', 'Intel Core i7 10700KF', 'Intel Core i7 10700', 'Intel Core i7 9700K', 'Intel Core i7 9700KF', 'Intel Core i7 9700',
                'Intel Core i7 9700F'],
            value: ['10700K', '10700KF', '10700', '9700K', '9700KF', '9700', '9700F'],
        },

        i5: {
            text: ['Intel Core i5 10600K', 'Intel Core i5 10600KF', 'Intel Core i5 10600', 'Intel Core i5 10400', 'Intel Core i5 10400F', 'Intel Core i5 9600K',
                'Intel Core i5 9600KF', 'Intel Core i5 9400', 'Intel Core i5 9400F'],
            value: ['10600K', '10600KF', '10600', '10400', '10400F', '9600K', '9600KF', '9400', '9400F'],
        },

        i3: {
            text: ['Intel Core i3 10300', 'Intel Core i3 10100', 'Intel Core i3 10100F', 'Intel Core i3 9100', 'Intel Core i3 9100F'],
            value: ['10300', '10100', '10100F', '9100', '9100F'],
        },

        pentium: {
            text: ['Intel Pentium Gold G5500', 'Intel Pentium Gold G6400', 'Intel Pentium Gold G5400'],
            value: ['G5500', 'G6400', 'G5400'],
        },

        r9: {
            text: ['AMD Ryzen 9 5950X', 'AMD Ryzen 9 5900X', 'AMD Ryzen 9 3950X', 'AMD Ryzen 9 3900XT', 'AMD Ryzen 9 3900X'],
            value: ['5950X', '5900X', '3950X', '3900XT', '3900X'],
        },

        r7: {
            text: ['AMD Ryzen 7 5800X', 'AMD Ryzen 7 3800XT', 'AMD Ryzen 7 3800X', 'AMD Ryzen 7 3700X', 'AMD Ryzen 7 2700X'],
            value: ['5800X', '3800XT', '3800X', '3700X', '2700X'],
        },

        r5: {
            text: ['AMD Ryzen 5 5600X', 'AMD Ryzen 5 3600XT', 'AMD Ryzen 5 3600X', 'AMD Ryzen 5 3600', 'AMD Ryzen 5 3400G', 'AMD Ryzen 5 2600X'],
            value: ['5600X', '3600XT', '3600X', '3600', '3400G', '2600X'],
        },

        r3: {
            text: ['AMD Ryzen 3 3300X', 'AMD Ryzen 3 3100', 'AMD Ryzen 3 3200G'],
            value: ['3300X', '3100', '3200G'],
        },

        athlon: {
            text: ['AMD Athlon 220GE', 'AMD Athlon 200GE'],
            value: ['220GE', '200GE'],
        },
    }
};

var Mobo_Chipset_Data = {
    'moboChipset': {
        intel: {
            text: ['Z490', 'H470', 'H410', 'B460', 'Z390', 'H310', 'B365'],
            value: ['Z490', 'H470', 'H410', 'B460', 'Z390', 'H310', 'B365'],
        },

        amd: {
            text: ['X570', 'B550', 'B450', 'A520', 'A320'],
            value: ['X570', 'B550', 'B450', 'A520', 'A320'],
        },
    }
};

var Mobo_Data = {
    'mobo': {
        Z490: {
            text: ['Asrock Z490M Pro4', 'MSI MAG Z490 TOMAHAWK', 'Asus ROG MAXIMUS XII EXTREME'],
            value: ['asrockZ490', 'msiTomahawkZ490', 'asusMaximus'],
        },
        
        H470: {
            text: ['Asrock H470M Pro4', 'Gigabyte H470M DS3H', 'Asus ROG Strix H470-I Gaming'],
            value: ['asrockH470', 'gigabyteH470', 'asusH470']
        },

        H410: {
            text: ['MSI H410M Pro', 'Asrock H410M-HDV/M.2'],
            value: ['msiH410', 'asrockH410'],
        },

        B460: {
            text: ['Asrock B460M Pro4', 'MSI MAG B460M Tomahawk', 'Gigabyte B460 AORUS PRO AC'],
            value: ['asrockB460', 'msiB460', 'gigabyteB460'],
        },

        Z390: {
            text: ['MSI Z390-A PRO', 'Asus Prime Z390-A', 'Gigabyte Z390 AORUS ULTRA'],
            value: ['msiZ390', 'asusZ390', 'gigabyteZ390'],
        },

        H310: {
            text: ['Asus Prime H310M-E R2.0', 'Gigabyte H310M S2P', 'Asrock H310CM-HDV'],
            value: ['asusH310', 'gigabyteH310', 'asrockH310'],
        },

        B365: {
            text: ['Gigabyte B365M DS3H', 'Asrock B365M Pro4', 'MSI MAG B365M Mortar'],
            value: ['gigabyteB365', 'asrockB365', 'msiB365'],
        },

        X570: {
            text: ['Asus Prime X570-P', 'MSI MAG X570 Tomahawk WIFI', 'Asus ROG Crosshair VIII Hero'],
            value: ['asusX570P', 'msiX570Tomahawk', 'asusCrosshair'],
        },

        B550: {
            text: ['Asrock B550M Pro4', 'MSI MPG B550 Gaming PLUS', 'Gigabyte B550 AORUS Master'],
            value: ['asrockB550', 'msiB550', 'gigabyteB550'],
        },

        B450: {
            text: ['Asrock B450M Pro4', 'MSI B450 Tomahawk MAX', 'Asus ROG Strix B450-I Gaming'],
            value: ['asrockB450', 'msiB450Tomahawk', 'asusB450'],
        },

        A520: {
            text: ['Asrock A520M-HVS', 'MSI MAG A520M VECTOR Wifi'],
            value: ['asrockA520', 'msiA520'],
        },

        A320: {
            text: ['Gigabyte GA-A320M-S2H', 'Asus Prime A320I-K'],
            value: ['gigabyteA320', 'asusA320'],
        },
    }
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
