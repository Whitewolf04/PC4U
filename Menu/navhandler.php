<?php
    session_start();

	if(!isset($_SESSION['redirect']))
	{
		$_SESSION['redirect'] = "../Newsletter/pc4u.php";
	}
	
	if(!isset($_GET['signout']))
    {
        header("Location: ".$_SESSION['redirect']);
        exit;
    }

    if(isset($_GET['signout']))
    {
        unset($_SESSION['signedin']);
        header("Location: ".$_SESSION['redirect']);
        exit;
    }
?>