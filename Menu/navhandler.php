<?php
    session_start();

    if(!isset($_GET['signout']))
    {
        header("Location: ../Newsletter/pc4u.php");
        exit;
    }

    if(isset($_GET['signout']))
    {
        unset($_SESSION['signedin']);
        header("Location: ../Newsletter/pc4u.php");
        exit;
    }
?>