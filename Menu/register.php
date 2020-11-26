<!DOCTYPE html>

<html lang = "en">
    <head>
        <title> PC4U - Register </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="loginregister.css" />
        <link rel="stylesheet" type="text/css" href="menu.css" />
        <script type="text/javascript" src="menu.js"></script>
    </head>
    <body>
        <h1 id="banner">PC4U</h1>

        <form id="registerForm" class="loginRegisterForms">
            <h1>Register</h1>

            <div id="formRow">
                <label for="registerEmail">Email Address:</label>
                <input type="text" id="registerEmail" name="registerEmail" placeholder="Email Address" />
            </div>

            <div id="formRow">
                <label for="registerUsername">Username:</label>
                <input type="text" id="registerUsername" name="registerUsername" placeholder="Username" />
            </div>

            <div id="formRow">
                <label for="registerPassword">Password:</label>
                <input type="password" id="registerPassword" name="registerPassword" placeholder="Password" />
            </div>

            <div id="formRow">
                <button id="registerButton" onclick="registerInfo()">Register</button>
            </div>
        </form>
    </body>
</html>