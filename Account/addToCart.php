<?php
    if(!isset($_COOKIE['cart'])){
        setcookie("cart","~", false, "/");
    }else{
        $cookievalue = $_COOKIE['cart'];
        setcookie("cart", $cookievalue, false, "/");
    }
    if(isset($_POST['cart'])){
        if(isset($_POST['prebuilt'])){
            $cookievalue = $_COOKIE['cart']."Prebuilt ".$_POST['prebuilt']."~";
            setcookie("cart", $cookievalue, false, "/");
        }else{
            $cpu = $motherboard = $gpu = $ram = $storage = $cooler = $case = $powerSupply = "";
            if(!(empty($_POST['cpu'])||empty($_POST['mobo'])||empty($_POST['gpu'])||empty($_POST['ram'])||empty($_POST['storageAmount'])||empty($_POST['coolerSize'])||empty($_POST['caseSize'])||empty($_POST['powerWatt']))){
                $cpu = "CPU ".$_POST['cpuBrand']."\t".$_POST['cpu'];
                $motherboard = "MOTHERBOARD\t".$_POST['mobo'];
                $gpu = "GPU ".$_POST['gpuBrand']."\t".$_POST['gpu'];
                $ram = "RAM\t".$_POST['ramConfig'];
                $storage = "STORAGE ".$_POST['storageType']."\t".$_POST['storageAmount'];
                $cooler = "COOLER ".$_POST['coolerType']."\t".$_POST['coolerSize'];
                $case = "CASE ".$_POST['case']."\t".$_POST['caseSize'];
                $powerSupply = "POWER SUPPLY ".$_POST['powerBrand']."\t".$_POST['powerWatt'];
                $pcWizard = array($cpu, $motherboard, $gpu, $ram, $storage, $cooler, $case, $powerSupply);
                $cookievalue = $_COOKIE['cart']."PCwizard ". json_encode($pcWizard)."~";
                //echo $cookievalue;
                setcookie("cart", $cookievalue, false, "/");
                //echo $_COOKIE['cart'];
            }else{
                echo "One of the fields was missing! Try again.<br>";
            }
        }
    }
?>
<button type="submit" name="cart" class="cart" value="cart">Add to Cart</button>