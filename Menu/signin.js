document.addEventListener("DOMContentLoaded", function()
{
    if(document.getElementById("email") != null)
    {
        var signin = document.getElementById("signinButton");
        var email = document.getElementById("email");

        signin.addEventListener("click", validateEmail);

        email.addEventListener("focus", focusElement);
        email.addEventListener("blur", blurElement);
    }
    else if(document.getElementById("password") != null)
    {
        var signin = document.getElementById("signinButton");
        var password = document.getElementById("password");
        var visibility = document.getElementById("visibility");

        signin.addEventListener("click", validatePassword);
        visibility.addEventListener("click", toggleVisibility);

        password.addEventListener("focus", focusElement);
        password.addEventListener("blur", blurElement);
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
}

function focusElement()
{
    if(this.classList.contains("valid"))
    {
        this.style.borderColor = "#0299E3";
    }
}

function blurElement()
{
    if(this.classList.contains("valid"))
    {
        this.style.borderColor = "#DADCE0";
    }
}

function validateEmail()
{
    var email = document.getElementById("email");

    if(!email.value.match(/^[a-zA-Z]*[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/))
    {
        document.getElementById("emailCondition").style.display = "block";
        document.getElementById("email").style.borderColor = "#D90016";
        document.getElementById("email").classList.remove("valid");
        return;
    }

    document.getElementById("emailCondition").style.display = "none";
    document.getElementById("email").style.borderColor = "#DADCE0";
    document.getElementById("email").classList.add("valid");
    document.getElementById("signin").submit();
}

function validatePassword()
{
    var password = document.getElementById("password");

    if(password.value === "")
    {
        document.getElementById("passwordCondition").style.display = "block";
        document.getElementById("password").style.borderColor = "#D90016";
        document.getElementById("password").classList.remove("valid");
        return;
    }

    document.getElementById("passwordCondition").style.display = "none";
    document.getElementById("password").style.borderColor = "#DADCE0";
    document.getElementById("password").classList.add("valid");
    document.getElementById("signin").submit();
}

window.onload = function()
{
    if(document.getElementById("success") != null)
    {
        setTimeout(function()
        {
            window.location.replace("../DIY_BuildPage/DIY_Mainpage.php");
        }, 2000);
    }
}