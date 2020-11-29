<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <title> PC4U - Login </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="loginregister.css" />
        <link rel="stylesheet" type="text/css" href="menu.css" />
        <script type="text/javascript" src="menu.js"></script>
    </head>
    <body>
    <?php 
    $username = $password = "";
    $file;
    if(isset($_POST['login'])){
        if(empty($_POST['loginUsername']) || empty($_POST['loginPassword'])){
            echo "One of the fields is missing.";
        }
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];
        if(checkUser($username, $password)){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: account.php");
        }else{
            echo "The username or password is incorrect";
        }
    }

    function checkUser($username, $password){
        if(file_exists("accounts.txt")){
            $stream = fopen("accounts.txt", "r");
            while(($line=fgets($stream))!==false){
                $username_check = substr($line, 0, strpos($line, ' '));
                $password_check = substr($line, strpos($line, ' '), strpos($line,",")-strpos($line, ' '));
                $password_check = trim($password_check);
                //var_dump($password_check, $password);
                //echo $password_check."<br>";
                if($username_check==$username && $password_check==$password){
                    return true;
                }
            }
        }
        return false;
    }
    ?>
        <h1 id="banner">PC4U</h1>

        <form id="loginForm" class="loginRegisterForms" method="post" action="">
            <h1>Login</h1>

            <div id="formRow">
                <label for="loginUsername">Username:</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="Username" />
            </div>

            <div id="formRow">
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" />
            </div>

            <div id="formRow">
                <input type="submit" name="login" value="Login">
            </div>

            <div id="formBlock">
                <div id="formCol">
                    <a href="forgotusername.html" class="menuButton">Forgot Username</a>
                </div>
                <div id="formCol">
                    <a href="forgotpassword.html" class="menuButton">Forgot Password</a>
                </div>
            </div>
        </form>
    </body>
</html>