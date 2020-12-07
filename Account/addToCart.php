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

                $powerBrand = substr($_POST['powerBrand'], 0, strpos($_POST['powerBrand'], "Power"));
                $powerSupply = "POWER SUPPLY ".$powerBrand."\t".$_POST['powerWatt'];

                $pcWizard = array($cpu, $motherboard, $gpu, $ram, $storage, $cooler, $case, $powerSupply);
                $cookievalue = $_COOKIE['cart']."PCwizard ". json_encode($pcWizard).$_POST['ram']."~";
                echo $cookievalue;
                setcookie("cart", $cookievalue, false, "/");
                echo "Added to cart!";
                //echo $_COOKIE['cart'];
            }else{
                echo "One of the fields was missing! Try again.<br>";
            }
        }
    }
?>
<button type="submit" name="cart" class="cart" value="cart" onclick="notification()">Add to Cart</button>
<script type="text/javascript">
    function notification(){
        alert("Your item has been added to cart!");
    }
</script>