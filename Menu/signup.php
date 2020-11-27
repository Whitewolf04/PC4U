<!DOCTYPE html>

<html lang="en">
    <head>
        <title> PC4U - Signup </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="sign.css" />
        <script type="text/javascript" src="signup.js"></script>
    </head>
    <body>
        <?php
            session_start();

            if(isset($_SESSION['signedin']))
            {
                header("Location: ../DIY_BuildPage/DIY_Mainpage.php");
                exit;
            }

            if(!isset($_SESSION['signupstep']) || isset($_SESSION['signupstep']) && ($_SESSION['signupstep'] === 1 || $_SESSION['signupstep'] === 3))
            {
                $_SESSION['signupstep'] = 1;
                echo '
                    <form id="signup" method="POST" action="validatesignup.php">
                        <div class="block">
                            <div class="col l">
                                <h1>Create Your Account</h1>
            
                                <label>Full Name</label>
                                <input class="valid" type="text" id="name" name="name" value="" autofocus />
                                <p class="condition" id="nameCondition">Enter a valid first and last name.</p>
            
                                <label>Email Address</label>
                                <input class="valid" type="text" id="email" name="email" value="" />
                                <p class="condition" id="emailCondition">Enter a valid email address.</p>
            
                                <label>Password</label>
                                <input class="valid" type="password" id="password" name="password" value="" />
                                <input type="checkbox" id="visibility" value="false" /><label for="visibility"></label>
                                <p class="condition" id="passwordCondition">Enter a valid password.</p>
            
                                <div id="passwordStrengthBox">
                                    <label>Strength</label>
                                    <div id="strengthBar"><div id="background"></div><div id="strength"></div></div>
                                    <p>Your password must:</p>
                                    <ul>
                                        <li><img id="letterStrength" src="Images/unsatisfied.png" />Include uppercase and lowercase characters</li>
                                        <li><img id="symbolStrength" src="Images/unsatisfied.png" />Include at least 1 number and 1 symbol</li>
                                        <li><img id="lengthStrength" src="Images/unsatisfied.png" />Be at least 8 characters long</li>
                                    </ul>
                                </div>
            
                                <div class="flex">
                                    <div><a href="../DIY_BuildPage/DIY_Mainpage.php">BACK</a> | <a href="../Menu/signin.php">SIGN IN</a></div>
                                    <button type="button" id="signupButton">NEXT</button>
                                </div>
                            </div>
                            
                            <div class="col r">
                                <img id="formlogo" src="../formlogo.png" width=200px; height=200px; />
                            </div>
                        </div>
                    </form>
                ';
            }

            if($_SESSION['signupstep'] === 2)
            {
                $_SESSION['signupstep'] = 3;

                $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $_SESSION['code'] = "";
                for($i = 0; $i < 8; $i++)
                {
                    $symbol = rand(0, strlen($alphabet)-1);
                    $_SESSION['code'] .= $alphabet[$symbol];
                }
                require_once "../PHPMailer/mailer.php";

                echo '
                    <form id="signup" method="POST" action="validatesignup.php">
                        <div class="block">
                            <div class="col l">
                                <h1>Verify Your Email</h1>
                                <p>Enter the verification code sent to your email address.</p>
            
                                <label>Verification Code</label>
                                <input class="valid" type="text" id="code" name="code" value="" autofocus />
                                <p class="condition" id="codeCondition">Invalid verification code.</p>
            
                                <div class="flex">
                                    <div><a href="../Menu/signup.php">BACK</a></div>
                                    <button type="button" id="signupButton">SIGN UP</button>
                                </div>
                            </div>
                            
                            <div class="col r">
                                <img id="formlogo" src="../formlogo.png" width=200px; height=200px; />
                            </div>
                        </div>
                    </form>
                ';
            }

            if($_SESSION['signupstep'] === 4)
            {
                echo '
                    <div class="block">
                        <img id="formlogo" src="../formlogo.png" width=300px; height=300px; />
                        <div id="success"><p>We have successfully created your account!</p><p>This shouldn\'t take long.</p></div>
                        <div><div class="loading"></div><div class="loading"></div><div class="loading"></div><div class="loading"></div><div class="loading"></div></div>
                    </div>
                ';
                $_SESSION['signedin'] = $_SESSION['email'];
                unset($_SESSION['signupstep']);
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['errors']);
                unset($_SESSION['code']);
            }
        ?>
    </body>
</html>