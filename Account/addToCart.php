<?php
    if(isset($_POST['cart'])){
        if(isset($_POST['prebuilt'])){
            $_SESSION['prebuilt'] = $_POST['prebuilt'];
            //snippet of code taken from https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
            echo "<script> location.replace(\"../Account/cart.php\"); </script>";
        }else{
            $cpu = $motherboard = $gpu = $ram = $storage = $cooler = $case = $powerSupply = "";
            if(!(empty($_POST['cpu'])||empty($_POST['mobo'])||empty($_POST['gpu'])||empty($_POST['ram'])||empty($_POST['storageAmount'])||empty($_POST['coolerSize'])||empty($_POST['caseSize'])||empty($_POST['powerWatt']))){
                $cpu = $_POST['cpu'];
                $motherboard = $_POST['mobo'];
                $gpu = $_POST['gpu'];
                $ram = $_POST['ram'];
                $storage = $_POST['storageType']." ".$_POST['storageAmount'];
                $cooler = $_POST['coolerType']." ".$_POST['coolerSize'];
                $case = $_POST['caseSize'];
                $powerSupply = $_POST['powerBrand']." ".$_POST['powerWatt'];
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