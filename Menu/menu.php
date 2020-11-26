<!--
    Can be added to other php pages using <?php require_once "menu.php" ?>, see account.php for example.
    To do: Convert all html pages to php.
-->

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../Menu/menu.css" />
        <script type="text/javascript" src="../Menu/menu.js"></script>
    </head>
    <body>
        <div id="menu">
            <ul id="buttonGroup">
                <li><img src="../logo.png" width="50" height="50" id="logo"/></li>
                <li><a class="menuButton" href="../DIY_BuildPage/DIY_Mainpage.html">Main Page</a></li>
                <li><a class="menuButton" href="../Newsletter/Newsletter.html">Newsletter</a></li>
                <li><a class="menuButton" href="../DIY_BuildPage/DIY_GUIDE_PAGE.html">Tutorial</a></li>
            </ul>

            <ul id="accountGroup">
                <li id="accountMenu">
                    <a id="accountButton" class="menuButton" href="#">Account</a>
                    <div id="accountOptions">
                        <a id="loginButton" class="menuButton" href="../Menu/login.php">Login</a>
                        <a id="registerButton" class="menuButton" href="../Menu/register.php">Register</a>
                    </div>
                </li>
                <li><a id="shoppingCart" href="#">
                    <img src="../Menu/Images/shopping_cart_hover.png" width="30px" height="30px" />
                    <img id="shoppingCartTop" src="../Menu/Images/shopping_cart_nohover.png" width="30px" height="30px" />
                </a></li>
            </ul>
        </div>
    </body>
</html>