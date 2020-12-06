<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../pc_icon.png">
    <title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="../Newsletter/Newsletter.css" />
    <script type="text/javascript" src="../Newsletter/Newsletter.js"></script>
</head>
<body onload="openSubs()">
    <?php require_once ("../Menu/nav.php");
            if(file_exists("../Database/news.txt"))
            {
                $newsFile = fopen("../Database/news.txt", "r") or die("Unable to open news.txt file!");
                $product1 = array();
                $product2 = array();
                $product3 = array();
                $count = 0;
                while(!feof($newsFile)){
                    $line=fgets($newsFile);
                    if(preg_match("/\*/",$line))
                    {
                        continue;
                    }
                    else if(preg_match("/={3}(New)={3}/",$line))
                    {
                        $count++;
                        continue;
                    } else {
                        if($count === 1){
                            array_push($product1, $line);
                        }
                        if($count === 2){
                            array_push($product2, $line);
                        }
                        if($count === 3){
                            array_push($product3, $line);
                        }
                    }
                }
                fclose($newsFile);
            }
        ?>
    <!--List of newly released products-->
    <table class="item-table">
        <tr>
            <td>
                <h2><?php if(isset($product1)) { echo $product1[0]; } ?></h2>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc"> <?php if(isset($product1)) { echo $product1[1]; }?></p>
                <a class="details" target="_blank" href="<?php if(isset($product1)) { echo $product1[2]; }?>">See product details</a>
            </td>
            <td rowspan="3">
                <a target="_blank"
                    href="<?php if(isset($product1)) { echo $product1[3]; }?>">
                    <img id="img1" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($product1)) { echo $product1[3]; }?>"
                        alt="Image  of <?php if(isset($product1)) { echo $product1[0]; } ?>" />
                </a>
            </td>
        </tr>
    </table>
    <table class="item-table">
        <tr>
            <td>
                <h2><?php if(isset($product2)) { echo $product1[0]; } ?></h2>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc"><?php if(isset($product2)) { echo $product2[1]; } ?></p>
                <a class="details" target="_blank" href="<?php if(isset($product2)) { echo $product2[2]; } ?>">See product details</a>

            </td>
            <td rowspan="3">
                <a target="_blank"
                    href="<?php if(isset($product2)) { echo $product2[3]; } ?>">
                    <img id="img2" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($product2)) { echo $product2[3]; } ?>"
                        alt="Image of <?php if(isset($product2)) { echo $product2[0]; } ?>" />
                </a>
            </td>
        </tr>
    </table>
    <table class="item-table">
        <tr>
            <td>
                <h2><?php if(isset($product3)) { echo $product3[0]; } ?></h2>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc"><?php if(isset($product3)) { echo $product3[1]; } ?>
                </p>
                <a class="details" target="_blank" href="<?php if(isset($product3)) { echo $product3[2]; } ?>">See product details</a>
            </td>
            <td rowspan="3">
                <a target="_blank"
                    href="<?php if(isset($product3)) { echo $product3[3]; } ?>">
                    <img id="img3" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($product3)) { echo $product3[3]; } ?>"
                        alt="Image of <?php if(isset($product3)) { echo $product3[3]; } ?>" />
                </a>
            </td>
        </tr>
    </table>
    <br><br><br>
    <div id="main-div-subs">
        <div id="pop-subscribe">
            <button type="button" id="button-close" onclick="closeSubs()">&#9932;</button>
            <h3>Be the first to know about newly released products</h3>
            <form class="form-container" action="" method="POST">
                <input id="subsmail" name="emailsubs" placeholder="Enter your email address"><br><br>
                <button type="submit" id="button-subs" name="subscribe">Subscribe</button><br>
            </form>
        </div>
        </div>
    <?php 
        if(isset($_POST['subscribe']) && !empty($_POST['emailsubs'])){
            if(!isset($_SESSION)){
                session_start();
            }
            $subsmail = $_POST['emailsubs'];
            $subsfile = fopen("../Database/subscribers.txt", "a") or die("Unable to open file!");
            fwrite($subsfile, $subsmail."\n");
            fclose($subsfile);
            $_SESSION['email'] = $subsmail;
            $_SESSION['subject'] = "Thank you for subscribing to PC4U";
            $newsFile = fopen("../Database/news.txt", "r") or die("Unable to open news.txt file!"); 
            $count = 0;
            $prodpromo = array();
            while(!feof($newsFile)){
                $line=fgets($newsFile);
                if(preg_match("/\*/",$line))
                {
                    continue;
                }
                else if(preg_match("/={3}(Promo)={3}/",$line))
                {
                   $count++;
                }
                else if($count===1){
                   array_push($prodpromo, $line);
                }
            }
            fclose($newsFile);
            $_SESSION['body'] = "<h2>Check out this promo item!</h2><br><br>".$prodpromo[0]."<br><br>".$prodpromo[1]." 
            <a target='_blank' href=".$prodpromo[2]."><br><br>See product details</a>";
            include("../PHPMailer/mailer.php");
        }
    ?>
</body>
</html>