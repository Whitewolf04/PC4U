<!DOCTYPE html>

<html lang="en">
    <head>
        <title> PC4U - Signup </title>
		<meta charset="utf-8" />
		<link rel="icon" href="../pc_icon.png">
        <link rel="stylesheet" type="text/css" href="sign.css" />
        <script type="text/javascript" src="signup.js"></script>
    </head>
    <body>
        <?php
			session_start();
			
			if(!isset($_SESSION['redirect']))
			{
				$_SESSION['redirect'] = "../Newsletter/pc4u.php";
			}

            //If signedin, signup redirects back to main page.
            if(isset($_SESSION['signedin']))
            {
                header("Location: ".$_SESSION['redirect']);
                exit;
            }

            //If a signin form session is saved, clear it.
            if(!isset($_SESSION['form']) || $_SESSION['form'] !== "SIGNUP")
            {
                $_SESSION['form'] = "SIGNUP";
                unset($_SESSION['state']);
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['errors']);
                unset($_SESSION['code']);
                unset($_SESSION['subject']);
                unset($_SESSION['body']);
            }

            //Step 1: Fetch name, email, password.
            if(!isset($_SESSION['state']) || $_SESSION['state'] === 1 || $_SESSION['state'] === 3)
            {
                isset($_SESSION['state']) && $_SESSION['state'] === 3 ? $_SESSION['state'] = 4 : $_SESSION['state'] = 1;
                echo '
                    <form id="signup" method="POST" action="signuphandler.php">
                        <div class="block">
                            <div class="col l">
                                <h1>Create Your Account</h1>
            
                                <label>Full Name</label>
                                <input type="text" id="name" name="name" value="'.(isset($_SESSION['name']) ? $_SESSION['name'] : "").'" autofocus />
                                <p class='.(isset($_SESSION['errors']) && in_array("name",$_SESSION['errors'],true) ? "servererror" : "condition").' id="nameCondition">Enter a valid first and last name.</p>
            
                                <label>Email Address</label>
                                <input type="text" id="email" name="email" value="'.(isset($_SESSION['email']) ? $_SESSION['email'] : "").'" />
                                <p class='.(isset($_SESSION['errors']) && in_array("email",$_SESSION['errors'],true) ? "servererror" : "condition").' id="emailCondition">Enter a valid email address.</p>
                                '.(isset($_SESSION['errors']) && in_array("exists",$_SESSION['errors'],true) ? '<p class="servererror">An account is already signed up with that email.</p>' : '').'
            
                                <label>Password</label>
                                <input type="password" id="password" name="password" value="'.(isset($_SESSION['password']) ? $_SESSION['password'] : "").'" />
                                <input type="checkbox" id="visibility" /><label for="visibility"></label>
                                <p class='.(isset($_SESSION['errors']) && in_array("password",$_SESSION['errors'],true) ? "servererror" : "condition").' id="passwordCondition">Enter a valid password.</p>
            
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
                                    <div><a href='.$_SESSION['redirect'].'>BACK</a> | <a href="../Menu/signin.php">SIGN IN</a></div>
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

            //Step 2: Verify email address.
            else if($_SESSION['state'] === 2 || $_SESSION['state'] === 4)
            {
                if($_SESSION['state'] === 2)
                {
                    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $_SESSION['code'] = "";
                    for($i = 0; $i < 8; $i++)
                    {
                        $symbol = rand(0, strlen($alphabet)-1);
                        $_SESSION['code'] .= $alphabet[$symbol];
                    }
                    $_SESSION['subject'] = "PC4U Account Verification Code";
                    $_SESSION['body'] = "<p>Dear ".$_SESSION['name'].",</p><p>Your verification code is: ".$_SESSION['code']."</p><p>Beep Boop,<br/>PC4U MailBot</p>";
                    require_once "../PHPMailer/mailer.php";
                }

                $_SESSION['state'] = 3;

                echo '
                    <form id="signup" method="POST" action="signuphandler.php">
                        <div class="block">
                            <div class="col l">
                                <h1>Verify Your Email</h1>
                                <p>Enter the verification code sent to your email address.</p>
            
                                <label>Verification Code</label>
                                <input type="text" id="code" name="code" value="" autofocus />
                                '.(isset($_SESSION['errors']) && in_array("unverified",$_SESSION['errors'],true) ? '<p class="servererror">Invalid code. We\'re resending a different one.</p>' : '').'
            
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

            //Step 3: Success.
            else if($_SESSION['state'] === 5)
            {
                echo '
                    <div class="block">
                        <img id="formlogo" src="../formlogo.png" width=300px; height=300px; />
                        <div id="success"><p>We have successfully created your account!</p><p>This shouldn\'t take long.</p></div>
                        <div><div class="loading"></div><div class="loading"></div><div class="loading"></div><div class="loading"></div><div class="loading"></div></div>
                    </div>
                ';
                $_SESSION['signedin'] = $_SESSION['email'];
            }
        ?>
    </body>
</html>