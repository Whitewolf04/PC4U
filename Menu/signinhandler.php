<?php
    session_start();

    if(isset($_SESSION['signedin']) || !isset($_SESSION['form']) || $_SESSION['form'] !== "SIGNIN" || !isset($_POST['email']) && !isset($_SESSION['email']))
    {
        header("Location: ".$_SESSION['redirect']);
        exit;
    }

    if(isset($_GET['forgotpassword']) && isset($_SESSION['state']) && $_SESSION['state'] === 3)
    {
        $_SESSION['state'] = 4;

        if(in_array("password",$_SESSION['errors'],true))
        {
            unset($_SESSION['errors'][array_search("password", $_SESSION['errors'], true)]);
        }

        header("Location: signin.php");
        exit;
    }

    if($_SESSION['state'] === 1)
    {
        $_SESSION['email'] = strtolower(trim($_POST['email']));

        $_SESSION['errors'] = array();

        if(!preg_match("/^[a-zA-Z]*[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/", $_SESSION['email']))
        {
            !in_array("email",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "email") : "";
        }
        else if(in_array("email",$_SESSION['errors'],true))
        {
            unset($_SESSION['errors'][array_search("email", $_SESSION['errors'], true)]);
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

            if(!in_array($_SESSION['email'], $emails))
            {
                !in_array("notexists",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "notexists") : "";
            }
            else if(in_array("notexists",$_SESSION['errors'],true))
            {
                unset($_SESSION['errors'][array_search("notexists", $_SESSION['errors'], true)]);
            }
        }

        if(!empty($_SESSION['errors']))
        {
            header("Location: signin.php");
            exit;
        }

        $_SESSION['state'] = 2;
        header("Location: signin.php");
        exit;
    }

    if($_SESSION['state'] === 3)
    {
        $_SESSION['password'] = $_POST['password'];

        if(file_exists("../Database/accounts.txt"))
        {
            $entries = file("../Database/accounts.txt");
            $emails = array();

            foreach($entries as $entry)
            {
                $pieces = explode("\t", $entry);
                $emails[] = $pieces[0];
                $passwords[] = $pieces[1];
            }

            $userid = array_search($_SESSION['email'], $emails, true);

            if(!password_verify($_SESSION['password'], $passwords[$userid]))
            {
                !in_array("password",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "password") : "";
                $_SESSION['state'] = 2;
            }
            else if(in_array("password",$_SESSION['errors'],true))
            {
                unset($_SESSION['errors'][array_search("password", $_SESSION['errors'], true)]);
            }

            $_SESSION['state'] === 3 ? $_SESSION['state'] = 8 : "";
            header("Location: signin.php");
            exit;
        }
    }

    if($_SESSION['state'] === 5)
    {
        if($_POST['code'] !== $_SESSION['code'])
        {
            !in_array("unverified",$_SESSION['errors'],true) ? array_push($_SESSION['errors'], "unverified") : "";
            $_SESSION['state'] = 4;
            header("Location: signin.php");
            exit;
        }
        else if(in_array("unverified",$_SESSION['errors'],true))
        {
            unset($_SESSION['errors'][array_search("unverified", $_SESSION['errors'], true)]);
        }

        $_SESSION['state'] = 6;
        header("Location: signin.php");
        exit;
    }

    if($_SESSION['state'] === 7)
    {
        if(strlen($_POST['password']) < 8 || !preg_match("/[a-z]/", $_POST['password']) || !preg_match("/[A-Z]/", $_POST['password']) || !preg_match("/[0-9]/", $_POST['password']) || !preg_match("/[\ -\/:-@\[-`\{-\~]/", $_POST['password']) || $_POST['password'] !== $_POST['confirm'])
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

            $userid = array_search($_SESSION['email'], $emails, true);

            $userpieces = explode("\t", $entries[$userid]);
            $userpieces[1] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $entries[$userid] = implode("\t", $userpieces);

            file_put_contents("../Database/accounts.txt", "");
            foreach($entries as $entry)
            {
                file_put_contents("../Database/accounts.txt", $entry, FILE_APPEND);
            }

            $_SESSION['state'] = 8;
            header("Location: signin.php");
            exit;
        }
    }
?>