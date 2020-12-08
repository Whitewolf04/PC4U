<?php $_SESSION['redirect'] = "../Newsletter/Newsletter.php";
    if(!isset($_SESSION['loadcount'])){
        $_SESSION['loadcount']=1;
    }
?>
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
                $product4 = array();
                $promo1 = array();
                $promo2 = array();
                $count = 0;
                $countPromo = 0;
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
                    }
                    else if(preg_match("/={3}(Promo)={3}/",$line))
                    {
                        $countPromo++;
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
                        if($count === 4){
                            array_push($product4, $line);
                        }
                        if($countPromo === 1){
                            array_push($promo1, $line);
                        }
                        if($countPromo === 2){
                            array_push($promo2, $line);
                        }
                        else{
                            continue;
                        }
                    }
                }
                fclose($newsFile);
            }
        ?>
    <!--List of newly released products and Promos-->
    <!-- Visible -->
    <div class="recredirect" >
            <form class="form-container" action="../Newsletter/pc4u.php" method="POST">
                <button type="submit" id="subrec" name="torecom">Recommended for you</button><br>
            </form>
    </div>
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
                    <img class="img" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($product1)) { echo $product1[3]; }?>"
                        alt="Image  of <?php if(isset($product1)) { echo $product1[0]; } ?>" />
                </a>
            </td>
        </tr>
    </table>
    <table class="item-table">
        <tr>
            <td colspan="2" style="border-style: none; "><img  class="promo" src="../Newsletter/Images/promo.gif" alt="Promo gif"></td>
        </tr>
        <tr>
            <td>
                <h2><?php if(isset($promo1)) { echo $promo1[0]; } ?></h2>
                <p class="item-desc"> <?php if(isset($promo1)) { echo $promo1[1]; }?></p>
            </td>
            <td rowspan="4">
                <a target="_blank"
                    href="<?php if(isset($promo1)) { echo $promo1[4]; }?>">
                    <img class="img2" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($promo1)) { echo $promo1[4]; }?>"
                        alt="Image  of <?php if(isset($promo1)) { echo $promo1[0]; } ?>" />
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc"> <?php if(isset($promo1)) { echo $promo1[2]; }?></p>
                <a class="details" target="_blank" href="<?php if(isset($promo1)) { echo $promo1[3]; }?>">See product details</a>
            </td>
        </tr>
    </table>
    <table class="item-table">
        <tr>
            <td>
                <h2><?php if(isset($product2)) { echo $product2[0]; } ?></h2>
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
                    <img class="img" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($product2)) { echo $product2[3]; } ?>"
                        alt="Image of <?php if(isset($product2)) { echo $product2[0]; } ?>" />
                </a>
            </td>
        </tr>
    </table>
    <!-- Loaded on click -->
    <table style="display: none" class="item-table" id="more-items1">
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
                    <img class="img" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($product3)) { echo $product3[3]; } ?>"
                        alt="Image of <?php if(isset($product3)) { echo $product3[3]; } ?>" />
                </a>
            </td>
        </tr>
    </table>
    <table class="item-table" style="display: none" id="more-items2">
        <tr>
            <td colspan="2" style="width:35%; border-style: none; "><img  class="promo" src="../Newsletter/Images/promo.gif" alt="Promo gif"></td>
        </tr>
        <tr>
            <td>
                <h2><?php if(isset($promo2)) { echo $promo2[0]; } ?></h2>
                <p class="item-desc"> <?php if(isset($promo2)) { echo $promo2[1]; }?></p>
            </td>
            <td rowspan="4">
                <a target="_blank"
                    href="<?php if(isset($promo2)) { echo $promo2[3]; }?>">
                    <img class="img2" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($promo2)) { echo $promo2[4]; }?>"
                        alt="Image  of <?php if(isset($promo2)) { echo $promo2[0]; } ?>" />
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc"> <?php if(isset($promo2)) { echo $promo2[2]; }?></p>
                <a class="details" target="_blank" href="<?php if(isset($promo2)) { echo $promo2[3]; }?>">See product details</a>
            </td>
        </tr>
    </table>
    <table style="display: none" class="item-table" id="more-items3">
        <tr>
            <td>
                <h2><?php if(isset($product4)) { echo $product4[0]; } ?></h2>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc"><?php if(isset($product4)) { echo $product4[1]; } ?>
                </p>
                <a class="details" target="_blank" href="<?php if(isset($product4)) { echo $product4[2]; } ?>">See product details</a>
            </td>
            <td rowspan="3">
                <a target="_blank"
                    href="<?php if(isset($product4)) { echo $product4[3]; } ?>">
                    <img class="img" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="<?php if(isset($product4)) { echo $product4[3]; } ?>"
                        alt="Image of <?php if(isset($product4)) { echo $product4[3]; } ?>" />
                </a>
            </td>
        </tr>
    </table>
    <h2 style="cursor: pointer; text-align: center;" onclick="addNews()" id="load">Load more</h2>
    <br><br><br>
	<?php 
		if(isset($_POST['subscribed']))
		{
			$_SESSION['subscribed'] = $_POST['subscribed'];
		}
		if(!isset($_SESSION['subscribed']))
		{
			echo '
			<div id="main-div-subs">
				<div id="pop-subscribe">
					<button type="button" id="button-close" onclick="closeSubs()">&#9932;</button>
					<h3>Be the first to know about newly released products</h3>
					<form class="form-container" action="" method="POST">
						<input id="subsmail" name="emailsubs" placeholder="Enter your email address"><br><br>
						<input type="hidden" id="subs" name="subscribed" value="1">
						<button type="submit" id="button-subs" name="subscribe">Subscribe</button><br>
					</form>
				</div>
			</div>
			';
		}
        if(isset($_POST['subscribe']) && !empty($_POST['emailsubs']) && $_POST['subscribed']=="1"){
            if(!isset($_SESSION)){
                session_start();
            }
            $_POST['subscribed']=="2";
            $_SESSION['loadcount']=2;
            $subsmail = $_POST['emailsubs'];
            $subsfile = fopen("../Database/subscribers.txt", "a") or die("Unable to open file!");
            fwrite($subsfile, $subsmail."\n");
            fclose($subsfile);
            $_SESSION['email'] = $subsmail;
            $_SESSION['subject'] = "Thank you for subscribing to PC4U";
            $newsFile = fopen("../Database/news.txt", "r") or die("Unable to open news.txt file!"); 
            $count = 0;
            $prodnew= array();
            while(!feof($newsFile)){
                $line=fgets($newsFile);
                if(preg_match("/\*/",$line))
                {
                    continue;
                }
                else if(preg_match("/={3}(New)={3}/",$line))
                {
                   $count++;
                }
                else if($count===2){
                   array_push($prodnew, $line);
                }
            }
            fclose($newsFile);
            $_SESSION['body'] = "<h2>Check out this promo item!</h2><br><br>".$prodnew[0]."<br><br>".$prodnew[1]." 
            <a target='_blank' href=".$prodnew[2]."><br><br>See product details</a>";
            include("../PHPMailer/mailer.php");
        }
    ?>
</body>
</html>