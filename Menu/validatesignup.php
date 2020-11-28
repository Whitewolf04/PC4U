<?php
    session_start();

    if(isset($_SESSION['signedin']) || !isset($_POST['name']) && !isset($_SESSION['name']) || !isset($_POST['email']) && !isset($_SESSION['email']) || !isset($_POST['password']) && !isset($_SESSION['password']))
    {
        header("Location: ../DIY_BuildPage/DIY_Mainpage.php");
        exit;
    }

    if($_SESSION['state'] === 1 || $_SESSION['state'] === 4)
    {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = strtolower($_POST['email']);
        $_SESSION['password'] = $_POST['password'];

        $_SESSION['errors'] = array();

        if(!preg_match("/^[a-zA-Z]+ [a-zA-Z]+$/", $_SESSION['name']))
        {
            !in_array("name",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "name") : "";
        }
        else if(in_array("name",$_SESSION['errors'],true))
        {
            unset($_SESSION['errors'][array_search("name", $_SESSION['errors'], true)]);
        }

        if(!preg_match("/^[a-zA-Z]*[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/", $_SESSION['email']))
        {
            !in_array("email",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "email") : "";
        }
        else if(in_array("email",$_SESSION['errors'],true))
        {
            unset($_SESSION['errors'][array_search("email", $_SESSION['errors'], true)]);
        }

        if(strlen($_SESSION['password']) < 8 || !preg_match("/[a-z]/", $_SESSION['password']) || !preg_match("/[A-Z]/", $_SESSION['password']) || !preg_match("/[0-9]/", $_SESSION['password']) || !preg_match("/[\ -\/:-@\[-`\{-\~]/", $_SESSION['password']))
        {
            !in_array("password",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "password") : "";
        }
        else if(in_array("password",$_SESSION['errors'],true))
        {
            unset($_SESSION['errors'][array_search("password", $_SESSION['errors'], true)]);
        }

        if(file_exists("../Database/accounts.txt"))
        {
            $entries = file("../Database/accounts.txt");
            $emails = array();

            foreach($entries as $entry)
            {
                $pieces = explode("\t", $entry);
                $emails[] = $pieces[0];
            }

            if(in_array($_SESSION['email'], $emails))
            {
                !in_array("exists",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "exists") : "";
            }
            else if(in_array("exists",$_SESSION['errors'],true))
            {
                unset($_SESSION['errors'][array_search("exists", $_SESSION['errors'], true)]);
            }
        }

        if(!empty($_SESSION['errors']))
        {
            $_SESSION['state'] = 1;
            header("Location: signup.php");
            exit;
        }

        $_SESSION['state'] === 1 ? $_SESSION['state'] = 2 : "";
        header("Location: signup.php");
        exit;
    }

    if($_SESSION['state'] === 3)
    {
        if($_POST['code'] !== $_SESSION['code'])
        {
            !in_array("unverified",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "unverified") : "";
            $_SESSION['state'] = 2;
            header("Location: signup.php");
            exit;
        }
        else if(in_array("unverified",$_SESSION['errors'],true))
        {
            unset($_SESSION['errors'][array_search("unverified", $_SESSION['errors'], true)]);
        }

        $entry = $_SESSION['email']."\t".password_hash($_SESSION['password'], PASSWORD_DEFAULT)."\t".$_SESSION['name'];
        if(file_exists("../Database/accounts.txt"))
        {
            file_put_contents("../Database/accounts.txt", $entry, FILE_APPEND);

            $_SESSION['state'] = 5;
            header("Location: signup.php");
            exit;
        }
    }
?>