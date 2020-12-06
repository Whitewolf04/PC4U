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
?>