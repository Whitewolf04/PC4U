<?php
    /**
     * creates cookie cart
     */
    if(!isset($_COOKIE['cart'])){
        setcookie("cart","~", false, "/");
    }else{
        $cookievalue = $_COOKIE['cart'];
        setcookie("cart", $cookievalue, false, "/");
    }
    /**
     * adds products to cookie cart
     */
    if(isset($_POST['cart'])){
        if(isset($_POST['prebuilt'])){
            $cookievalue = $_COOKIE['cart']."Prebuilt ".$_POST['prebuilt']."~";
            setcookie("cart", $cookievalue, false, "/");
            //echo "Added to cart!";
        }else{
            $cpu = $motherboard = $gpu = $ram = $storage = $cooler = $case = $powerSupply = "";
            if(!(empty($_POST['cpu'])||empty($_POST['mobo'])||empty($_POST['gpu'])||empty($_POST['ram'])||empty($_POST['storageAmount'])||empty($_POST['coolerSize'])||empty($_POST['caseSize'])||empty($_POST['powerWatt']))){
                $cpubrand = ($_POST['cpuBrand']==="amd") ? "AMD" : "Intel";
                $cpu = "CPU ".$cpubrand."\t".$_POST['cpu'];
                $motherboard = "MOTHERBOARD\t".$_POST['mobo'];

                $gpubrand = ($_POST['gpuBrand']==="amd") ? "AMD" : "Nvidia";
                $gpu = "GPU ".$gpubrand."\t".$_POST['gpu'];

                $ram = "Ram\t".$_POST['ramConfig'];
                $storage = "STORAGE ".$_POST['storageType']."\t".$_POST['storageAmount'];

                $cooler = "Cooler size ".$_POST['coolerType']."\t".$_POST['coolerSize'];

                $caseSize = ($_POST['case']==="full") ? "Full" : "Medium";
                $case = "CASE ".$caseSize."\t".$_POST['caseSize'];

                $powerBrand = "";
                switch($_POST['powerBrand']){
                    case "evgaPower":
                        $powerBrand = "EVGA";
                    break;
                    case "corsairPower":
                        $powerBrand = "Corsair";
                    break;
                    case "coolermasterPower":
                        $powerBrand = "CoolerMaster";
                    break;
                    case "thermaltakePower":
                        $powerBrand = "ThermalTake";
                    break;
                }
                $powerSupply = "POWER SUPPLY ".$powerBrand."\t".$_POST['powerWatt'];

                $pcWizard = array($cpu, $motherboard, $gpu, $ram, $storage, $cooler, $case, $powerSupply);
                $cookievalue = $_COOKIE['cart']."PCwizard ". json_encode($pcWizard)."|".$_POST['ram']."~";
                //echo $cookievalue;
                setcookie("cart", $cookievalue, false, "/");
                echo '<script>alert("Added to your cart!")</script>';
                //echo "Added to cart!";
                //echo $_COOKIE['cart'];
            }else{
                echo "One of the fields was missing! Try again.<br>";
            }
        }
    }
?>
<button type="submit" name="cart" class="cart" value="cart" onclick="notification()">Add to Cart</button>
<script>
function notification(){
    if(window.location.href.indexOf("Budget.php") > -1 || window.location.href.indexOf("Highend.php") > -1 || window.location.href.indexOf("Midrange.php") > -1){
        alert("Added to your cart!");
    }
}
</script>