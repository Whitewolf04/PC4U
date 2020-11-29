<!DOCTYPE html>

<html lang="en">
    <head>
        <title> PC4U - Login </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="loginregister.css" />
        <link rel="stylesheet" type="text/css" href="menu.css" />
        <script type="text/javascript" src="menu.js"></script>
    </head>
    <body>
        <h1 id="banner">PC4U</h1>

        <form id="loginForm" class="loginRegisterForms">
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
                <button id="loginButton" onclick="verifyLoginInfo()">Login</button>
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