document.addEventListener("DOMContentLoaded", function()
{
    if(document.getElementById("email") != null)
    {
        var signin = document.getElementById("signinButton");

        signin.addEventListener("click", validateEmail);
    }
    else if(document.getElementById("password") != null && document.getElementById("confirm") == null)
    {
        var signin = document.getElementById("signinButton");
        var visibility = document.getElementById("visibility");

        signin.addEventListener("click", validatePassword);
        visibility.addEventListener("click", toggleVisibility);
    }
    else if(document.getElementById("password") != null && document.getElementById("confirm") != null)
    {
        var signin = document.getElementById("signinButton");
        var visibility = document.getElementById("visibility");

        signin.addEventListener("click", validateConfirm);
        visibility.addEventListener("click", toggleVisibility);
    }
    else if(document.getElementById("code") != null)
    {
        var signin = document.getElementById("signinButton");
        signin.addEventListener("click", function()
        {
            document.getElementById("signin").submit();
        });
    }
});

function toggleVisibility()
{
    var password = document.getElementById("password");

    if(password.type === "text")
    {
        password.type = "password";
    } else {
        password.type = "text"
    }

    var confirm = document.getElementById("confirm");

    if(confirm != null && confirm.type === "text")
    {
        confirm.type = "password";
    }
    else if(confirm != null)
    {
        confirm.type = "text"
    }
}

function validateEmail()
{
    var email = document.getElementById("email");

    if(!email.value.match(/^[a-zA-Z]*[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/))
    {
        document.getElementById("emailCondition").style.display = "block";
        document.getElementById("email").style.borderColor = "#D90016";
        return;
    }

    document.getElementById("emailCondition").style.display = "none";
    document.getElementById("email").style.borderColor = null;
    document.getElementById("signin").submit();
}

function validatePassword()
{
    var password = document.getElementById("password");

    if(password.value === "")
    {
        document.getElementById("passwordCondition").style.display = "block";
        document.getElementById("password").style.borderColor = "#D90016";
        return;
    }

    document.getElementById("passwordCondition").style.display = "none";
    document.getElementById("password").style.borderColor = null;
    document.getElementById("signin").submit();
}

function validateConfirm()
{
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirm");

    if(password.value.length < 8 || !password.value.match(/[a-z]/) || !password.value.match(/[A-Z]/) || !password.value.match(/[0-9]/) || !password.value.match(/[\ -\/:-@\[-`\{-\~]/))
    {
        document.getElementById("confirmCondition").innerHTML = "Please enter a valid password and confirm it.";
        document.getElementById("confirmCondition").style.display = "block";
        document.getElementById("password").style.borderColor = "#D90016";
        document.getElementById("confirm").style.borderColor = "#D90016";
        return;
    }
    else if(password.value !== confirm.value)
    {
        document.getElementById("confirmCondition").innerHTML = "The password and confirmed password do not match.";
        document.getElementById("confirmCondition").style.display = "block";
        document.getElementById("password").style.borderColor = "#D90016";
        document.getElementById("confirm").style.borderColor = "#D90016";
        return;
    }

    document.getElementById("confirmCondition").innerHTML = "Invalid password or confirm doesn't match.";
    document.getElementById("confirmCondition").style.display = "none";
    document.getElementById("password").style.borderColor = null;
    document.getElementById("confirm").style.borderColor = null;
    document.getElementById("signin").submit();
}

window.onload = function()
{
    if(document.getElementById("success") != null)
    {
        setTimeout(function()
        {
            window.location.replace("../Menu/signinhandler.php");
        }, 2000);
    }
}