<?php
    session_start();

    //EXPLICITLY REQUIRED FOR ADDING MORE CONDITIONS LATER ON, DO NOT IF-ELSE THIS WITH THE ONE BELOW
    if(!isset($_GET['signout']))
    {
        header("Location: ../DIY_BuildPage/DIY_Mainpage.php");
        exit;
    }

    if(isset($_GET['signout']))
    {
        unset($_SESSION['signedin']);
        header("Location: ../DIY_BuildPage/DIY_Mainpage.php");
        exit;
    }
?>