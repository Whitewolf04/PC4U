<?php
    if(isset($_POST['cart'])){
        if(isset($_POST['prebuilt'])){
            $_SESSION['prebuilt'] = $_POST['prebuilt'];
            //snippet of code taken from https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
            echo "<script> location.replace(\"../Account/cart.php\"); </script>";
        }else{
            $cpu = $motherboard = $gpu = $ram = $storage = $cooler = $case = $powerSupply = "";
            if(!(empty($_POST['cpu'])||empty($_POST['mobo'])||empty($_POST['gpu'])||empty($_POST['ram'])||empty($_POST['storageAmount'])||empty($_POST['coolerSize'])||empty($_POST['caseSize'])||empty($_POST['powerWatt']))){
                $cpu = "CPU ".$_POST['cpuBrand']."\t".$_POST['cpu'];
                $motherboard = "MOTHERBOARD\t".$_POST['mobo'];
                $gpu = "GPU ".$_POST['gpuBrand']."\t".$_POST['gpu'];
                $ram = "RAM ".$_POST['ramConfig']."\t".$_POST['ram'];
                $storage = "STORAGE ".$_POST['storageType']."\t".$_POST['storageAmount'];
                $cooler = "COOLER ".$_POST['coolerType']."\t".$_POST['coolerSize'];
                $case = "CASE ".$_POST['case']."\t".$_POST['caseSize'];
                $powerSupply = "POWER SUPPLY ".$_POST['powerBrand']."\t".$_POST['powerWatt'];
                $_SESSION['pcWizard'] = array($cpu, $motherboard, $gpu, $ram, $storage, $cooler, $case, $powerSupply);
                //snippet of code taken from https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
                echo "<script> location.replace(\"../Account/cart.php\"); </script>";         
            }else{
                echo "One of the fields was missing! Try again.<br>";
            }
        }
    }
?>
<button type="submit" name="cart" class="cart" value="cart">Add to Cart</button>