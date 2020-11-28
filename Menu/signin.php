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
            if(!isset($_SESSION['form']) || $_SESSION['form'] === "SIGNUP")
            {
                $_SESSION['form'] = "SIGNIN";
                unset($_SESSION['state']);
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['errors']);
                unset($_SESSION['code']);
            }

            //Step 1: Fetch email.
            if(!isset($_SESSION['state']) || $_SESSION['state'] === 1 || $_SESSION['state'] === 3)
            {
                $_SESSION['state'] = 1;
                echo '
                    <form id="signin" method="POST" action="signinhandler.php">
                        <div class="block">
                            <img id="formlogo" src="../formlogo.png" width=100px; height=100px; />
                            <h1>Sign In</h1>
        
                            <label>Email</label>
                            <input class="valid" type="text" id="email" name="email" value="'.(isset($_SESSION['email']) ? $_SESSION['email'] : "").'" />
                            <p class='.(isset($_SESSION['errors']) && in_array("email",$_SESSION['errors'],true) ? "servererror" : "condition").' id="emailCondition">Enter a valid email address.</p>
                            '.(isset($_SESSION['errors']) && in_array("notexists",$_SESSION['errors'],true) ? '<p class="servererror">No account exists with that email.</p>' : '').'

                            <div class="flex">
                                <div><a href="../DIY_BuildPage/DIY_Mainpage.php">BACK</a> | <a href="../Menu/signup.php">SIGN UP</a></div>
                                <button type="button" id="signinButton">NEXT</button>
                            </div>
                        </div>
                    </form>
                ';
            }

            //Step 2: Fetch password.
            else if($_SESSION['state'] === 2)
            {
                $_SESSION['state'] = 3;

                echo '
                    <form id="signin" method="POST" action="signinhandler.php">
                        <div class="block">
                            <img id="formlogo" src="../formlogo.png" width=100px; height=100px; />
                            <h1 class="welcome">Welcome</h1>
                            <p>'.$_SESSION['email'].'</p>
        
                            <label>Password</label>
                            <input class="valid" type="password" id="password" name="password" value="'.(isset($_SESSION['password']) ? $_SESSION['password'] : "").'" />
                            <input type="checkbox" id="visibility" /><label for="visibility"></label>
                            <p class='.(isset($_SESSION['errors']) && in_array("password",$_SESSION['errors'],true) ? "servererror" : "condition").' id="passwordCondition">Invalid password.</p>

                            <div class="flex">
                                <div><a href="../Menu/signin.php">BACK</a> | <a href="../Menu/forgotpassword.php">FORGOT</a></div>
                                <button type="button" id="signinButton">SIGN IN</button>
                            </div>
                        </div>
                    </form>
                ';
            }

            //Step 3: Success.
            else if($_SESSION['state'] === 6)
            {
                echo '
                    <div class="block">
                        <img id="formlogo" src="../formlogo.png" width=300px; height=300px; />
                        <div id="success"><p>Signing you in.</p><p>This shouldn\'t take long.</p></div>
                        <div><div class="loading"></div><div class="loading"></div><div class="loading"></div><div class="loading"></div><div class="loading"></div></div>
                    </div>
                ';
                $_SESSION['signedin'] = $_SESSION['email'];
            }
        ?>
    </body>
</html>