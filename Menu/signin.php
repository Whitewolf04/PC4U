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
                unset($_SESSION['subject']);
                unset($_SESSION['body']);
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
                            <input class="valid" type="text" id="email" name="email" value="'.(isset($_SESSION['email']) ? $_SESSION['email'] : "").'" autofocus />
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
            else if($_SESSION['state'] === 2 || $_SESSION['state'] === 5 || $_SESSION['state'] === 7)
            {
                $_SESSION['state'] = 3;
                echo '
                    <form id="signin" method="POST" action="signinhandler.php">
                        <div class="block">
                            <img id="formlogo" src="../formlogo.png" width=100px; height=100px; />
                            <h1 class="welcome">Welcome</h1>
                            <p>'.$_SESSION['email'].'</p>
        
                            <label>Password</label>
                            <input class="valid" type="password" id="password" name="password" value="'.(isset($_SESSION['password']) ? $_SESSION['password'] : "").'" autofocus />
                            <input type="checkbox" id="visibility" /><label for="visibility"></label>
                            <p class='.(isset($_SESSION['errors']) && in_array("password",$_SESSION['errors'],true) ? "servererror" : "condition").' id="passwordCondition">Invalid password.</p>

                            <div class="flex">
                                <div><a href="../Menu/signin.php">BACK</a> | <a href="../Menu/signinhandler.php?forgotpassword=true">FORGOT</a></div>
                                <button type="button" id="signinButton">SIGN IN</button>
                            </div>
                        </div>
                    </form>
                ';
            }

            else if($_SESSION['state'] === 4)
            {
                $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $_SESSION['code'] = "";
                for($i = 0; $i < 8; $i++)
                {
                    $symbol = rand(0, strlen($alphabet)-1);
                    $_SESSION['code'] .= $alphabet[$symbol];
                }
                $_SESSION['subject'] = "PC4U Account Verification Code";
                $_SESSION['body'] = "<p>Beep Boop,</p><p>Your verification code is: ".$_SESSION['code']."</p><p>Beep Boop,<br/>PC4U MailBot</p>";
                require_once "../PHPMailer/mailer.php";

                $_SESSION['state'] = 5;
                echo '
                    <form id="signin" method="POST" action="signinhandler.php">
                        <div class="block">
                            <img id="formlogo" src="../formlogo.png" width=100px; height=100px; />
                            <h1>Forgot Password</h1>
        
                            <p>Enter the verification code sent to your email address.</p>

                            <label>Verification Code</label>
                            <input class="valid" type="text" id="code" name="code" value="" autofocus />
                            '.(isset($_SESSION['errors']) && in_array("unverified",$_SESSION['errors'],true) ? '<p class="servererror">Invalid code. We\'re resending a different one.</p>' : '').'

                            <div class="flex">
                                <div><a href="../Menu/signin.php">BACK</a></div>
                                <button type="button" id="signinButton">NEXT</button>
                            </div>
                        </div>
                    </form>
                ';
            }

            else if($_SESSION['state'] === 6)
            {
                $_SESSION['state'] = 7;
                echo '
                    <form id="signin" method="POST" action="signinhandler.php">
                        <div class="block">
                            <img id="formlogo" src="../formlogo.png" width=100px; height=100px; />
                            <h1>Create New Password</h1>
        
                            <label>Password</label>
                            <input class="valid" type="password" id="password" name="password" value="" autofocus />
                            <input type="checkbox" id="visibility" /><label for="visibility"></label>
                            <label>Confirm Password</label>
                            <input class="valid" type="password" id="confirm" name="confirm" value="" />
                            <p class='.(isset($_SESSION['errors']) && in_array("password",$_SESSION['errors'],true) ? "servererror" : "condition").' id="confirmCondition">Invalid password or confirm doesn\'t match.</p>

                            <div class="flex">
                                <div><a href="../Menu/signin.php">BACK</a></div>
                                <button type="button" id="signinButton">CONFIRM</button>
                            </div>
                        </div>
                    </form>
                ';
            }

            //Step 3: Success.
            else if($_SESSION['state'] === 8)
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