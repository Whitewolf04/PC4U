<?php
	session_start();
	
	if(!isset($_SESSION['form']) || $_SESSION['form'] !== "PAYMENT" || !isset($_SESSION['state']))
	{
		header("Location: ../Account/cart.php");
		exit;
	}

	if($_SESSION['state'] === 1)
	{
		if(!isset($_POST['email']))
		{
			header("Location: ../Account/payment.php");
			exit;
		}

		$_SESSION['email'] = strtolower(trim($_POST['email']));
		if(preg_match("/^[a-zA-Z]*[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/", $_SESSION['email']))
		{
			$_SESSION['state'] = 2;
		}

		header("Location: ../Account/payment.php");
		exit;
	}

	else if($_SESSION['state'] === 2)
	{
		if(!isset($_POST['CCnum']) || !isset($_POST['CCname']) || !isset($_POST['CCmm']) || !isset($_POST['CCyy']) || !isset($_POST['CCvv']))
		{
			header("Location: ../Account/payment.php");
			exit;
		}

		$_SESSION['CCnum'] = trim($_POST['CCnum']);
		$_SESSION['CCname'] = trim($_POST['CCname']);
		$_SESSION['CCmm'] = trim($_POST['CCmm']);
		$_SESSION['CCyy'] = trim($_POST['CCyy']);
		$_SESSION['CCvv'] = trim($_POST['CCvv']);

		if(preg_match("/^[0-9]{16}$/", $_SESSION['CCnum']) && preg_match("/^[a-zA-z]+ [a-zA-Z]+$/", $_SESSION['CCname']) && preg_match("/^[0-9]{2}$/", $_SESSION['CCmm']) && $_SESSION['CCmm'] >= 1 && $_SESSION['CCmm'] <= 12 && preg_match("/^[0-9]{2}$/", $_SESSION['CCyy']) && preg_match("/^[0-9]{3}$/", $_SESSION['CCvv']))
		{
			$_SESSION['state'] = 3;
		}

		header("Location: ../Account/payment.php");
		exit;
	}

	else if($_SESSION['state'] === 4)
	{
		if(!isset($_POST['billingaddressl1']) || !isset($_POST['billingphone']) || !isset($_POST['billingpostalcode']) || !isset($_POST['billingcity']) || !isset($_POST['billingprovince']))
		{
			$_SESSION['state'] = 3;
			header("Location: ../Account/payment.php");
			exit;
		}

		$_SESSION['billingaddressl1'] = trim($_POST['billingaddressl1']);
		$_SESSION['billingaddressl2'] = trim($_POST['billingaddressl2']);
		$_SESSION['billingphone'] = trim($_POST['billingphone']);
		$_SESSION['billingpostalcode'] = trim($_POST['billingpostalcode']);
		$_SESSION['billingcity'] = trim($_POST['billingcity']);
		$_SESSION['billingprovince'] = trim($_POST['billingprovince']);

		if(preg_match("/[0-9]+/", $_SESSION['billingaddressl1']) && preg_match("/[a-zA-Z]+/", $_SESSION['billingaddressl1']) && preg_match("/^[0-9]{10}$/", $_SESSION['billingphone']) && preg_match("/^[a-zA-Z0-9]{6}$/", $_SESSION['billingpostalcode']) && preg_match("/^[a-zA-Z]+$/", $_SESSION['billingcity']) && preg_match("/^[A-Z]+$/", $_SESSION['billingprovince']))
		{
			if(isset($_POST['sameaddress']))
			{
				$_SESSION['sameaddress'] = $_POST['sameaddress'];
				$_SESSION['shippingaddressl1'] = $_SESSION['billingaddressl1'];
				$_SESSION['shippingaddressl2'] = $_SESSION['billingaddressl2'];
				$_SESSION['shippingphone'] = $_SESSION['billingphone'];
				$_SESSION['shippingpostalcode'] = $_SESSION['billingpostalcode'];
				$_SESSION['shippingcity'] = $_SESSION['billingcity'];
				$_SESSION['shippingprovince'] = $_SESSION['billingprovince'];
				$_SESSION['state'] = 9;
			} else {
				unset($_SESSION['sameaddress']);
				$_SESSION['state'] = 6;
			}
		}

		header("Location: ../Account/payment.php");
		exit;
	}

	else if($_SESSION['state'] === 5)
	{
		if(!isset($_POST['shippingaddressl1']) || !isset($_POST['shippingphone']) || !isset($_POST['shippingpostalcode']) || !isset($_POST['shippingcity']) || !isset($_POST['shippingprovince']))
		{
			$_SESSION['state'] = 6;
			header("Location: ../Account/payment.php");
			exit;
		}

		$_SESSION['shippingaddressl1'] = trim($_POST['shippingaddressl1']);
		$_SESSION['shippingaddressl2'] = trim($_POST['shippingaddressl2']);
		$_SESSION['shippingphone'] = trim($_POST['shippingphone']);
		$_SESSION['shippingpostalcode'] = trim($_POST['shippingpostalcode']);
		$_SESSION['shippingcity'] = trim($_POST['shippingcity']);
		$_SESSION['shippingprovince'] = trim($_POST['shippingprovince']);

		if(preg_match("/[0-9]+/", $_SESSION['shippingaddressl1']) && preg_match("/[a-zA-Z]+/", $_SESSION['shippingaddressl1']) && preg_match("/^[0-9]{10}$/", $_SESSION['shippingphone']) && preg_match("/^[a-zA-Z0-9]{6}$/", $_SESSION['shippingpostalcode']) && preg_match("/^[a-zA-Z]+$/", $_SESSION['shippingcity']) && preg_match("/^[A-Z]+$/", $_SESSION['shippingprovince']))
		{
			$_SESSION['state'] = 9;
		}

		header("Location: ../Account/payment.php");
		exit;
	}

	else if($_SESSION['state'] === 7 || $_SESSION['state'] === 8)
	{
		if(file_exists("../Database/orders.txt"))
        {
			$timestamp = time();
			$order = (isset($_SESSION['signedin']) ? $_SESSION['signedin'] : $_SESSION['email'])."\t".$timestamp."\t".$_SESSION['total']."\t".$_SESSION['shippingaddressl1'].",".$_SESSION['shippingaddressl2'].",".$_SESSION['shippingphone'].",".$_SESSION['shippingpostalcode'].",".$_SESSION['shippingcity'].",".$_SESSION['shippingprovince']."\t".$_SESSION['parts'];
			file_put_contents("../Database/orders.txt", $order.file_get_contents("../Database/orders.txt"));
			if(isset($_SESSION['signedin']))
			{
				$_SESSION['email'] = $_SESSION['signedin'];
			}
			$_SESSION['subject'] = "PC4U Order#".$timestamp." Confirmation";
            $_SESSION['body'] = "<p>Dear customer,</p><p>Your order has been confirmed. If you did not make this order, please contact customer support immediately.</p><p>Beep Boop,<br/>PC4U MailBot</p>";
            require_once "../PHPMailer/mailer.php";
			unset($_SESSION['cart']);
			setcookie('cart', "~", false, "/");
            header("Location: cart.php");
            exit;
        }
	}
?>