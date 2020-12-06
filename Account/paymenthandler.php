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
		if(!isset($_POST['addressl1']) || !isset($_POST['addressl2']) || !isset($_POST['phone']) || !isset($_POST['postalcode']) || !isset($_POST['city']) || !isset($_POST['province']))
		{
			$_SESSION['state'] = 3;
			header("Location: ../Account/payment.php");
			exit;
		}

		$_SESSION['addressl1'] = trim($_POST['addressl1']);
		$_SESSION['addressl2'] = trim($_POST['addressl2']);
		$_SESSION['phone'] = trim($_POST['phone']);
		$_SESSION['postalcode'] = trim($_POST['postalcode']);
		$_SESSION['city'] = trim($_POST['city']);
		$_SESSION['province'] = trim($_POST['province']);

		if(preg_match("/[0-9]+/", $_SESSION['addressl1']) && preg_match("/[a-zA-Z]+/", $_SESSION['addressl1']) && preg_match("/^[a-zA-Z0-9]{6}$/", $_SESSION['postalcode']) && preg_match("/^[a-zA-Z]+$/", $_SESSION['city']) && preg_match("/^[A-Z]+$/", $_SESSION['province']))
		{
			$_SESSION['state'] = 6;
		}

		header("Location: ../Account/payment.php");
		exit;
	}
?>