<?php
    session_start();

    unset($_SESSION['form']);
    unset($_SESSION['state']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['errors']);
    unset($_SESSION['code']);
    unset($_SESSION['subject']);
    unset($_SESSION['body']);
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../Menu/nav.css" />
        <script type="text/javascript" src="../Menu/nav.js"></script>
    </head>
    <body>
        <div id="nav">
            <ul id="buttonGroup">
                <li><img src="../logo.png" width="50" height="50" id="logo"/></li>
                <li><a class="menuButton" href="../DIY_BuildPage/DIY_Mainpage.php">Main Page</a></li>
                <li><a class="menuButton" href="../Newsletter/Newsletter.php">Newsletter</a></li>
                <li><a class="menuButton" href="../DIY_BuildPage/DIY_GUIDE_PAGE.php">Tutorial</a></li>
            </ul>

            <?php
                if(!isset($_SESSION['signedin']))
                {
                    echo '
                        <ul>
                            <li><a class="menuButton" href="../Menu/signin.php">Account</a></li>
                        </ul>
                    ';
                } else {
                    echo '
                        <ul>
                            <li class="dropdownMenu">
                                <a class="menuButton" href="#">Account</a>
                                <div class="dropdownOptions">
                                    <a class="menuButton" href="">Profile?</a>
                                    <a class="menuButton" href="">Orders?</a>
                                    <a class="menuButton" href="../Menu/navhandler.php?signout=true">Sign Out</a>
                                </div>
                            </li>
                            <li><a id="shoppingCart" href="#">
                                <img src="../Account/Images/shopping_cart_hover.png" width="30px" height="30px" />
                                <img id="shoppingCartTop" src="../Account/Images/shopping_cart_nohover.png" width="30px" height="30px" />
                            </a></li>
                        </ul>
                    ';
                }
            ?>
        </div>
    </body>
</html>