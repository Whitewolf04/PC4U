<!DOCTYPE html>

<html lang="en">
    <head>
        <title> PC4U - Sign In </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="sign.css" />
        <script type="text/javascript" src="signin.js"></script>
    </head>
    <body>
        <?php
            session_start();

            //If signedin, signin redirects back to main page.
            if(isset($_SESSION['signedin']))
            {
                header("Location: ../DIY_BuildPage/DIY_Mainpage.php");
                exit;
            }

            //If a signup form session is saved, clear it.
            if(isset($_SESSION['form']) && $_SESSION['form'] === "SIGNUP")
            {
                $_SESSION['form'] = "SIGNIN";
                unset($_SESSION['state']);
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['errors']);
                unset($_SESSION['code']);
            }
        ?>
    </body>
</html>