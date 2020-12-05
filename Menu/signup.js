document.addEventListener("DOMContentLoaded", function()
{
    if(document.getElementById("visibility") != null)
    {
        var visibility = document.getElementById("visibility");
        var signup = document.getElementById("signupButton");
        var password = document.getElementById("password");

        visibility.addEventListener("click", toggleVisibility);
        signup.addEventListener("click", attemptSignup);

        password.addEventListener("keyup", updatePasswordStrength);
    }
    else if(document.getElementById("signupButton") != null)
    {
        var signup = document.getElementById("signupButton");
        signup.addEventListener("click", function()
        {
            document.getElementById("signup").submit();
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
}

function attemptSignup()
{
    var validname = validateName();
    var validemail = validateEmail();
    var validpassword = validatePassword();

    if(validname && validemail && validpassword)
    {
        document.getElementById("signup").submit();
    }
}

function validateName()
{
    var name = document.getElementById("name");

    if(!name.value.match(/^[a-zA-Z]+ [a-zA-Z]+$/))
    {
        document.getElementById("nameCondition").style.display = "block";
        document.getElementById("name").style.borderColor = "#D90016";
        return false;
    }

    document.getElementById("nameCondition").style.display = "none";
    document.getElementById("name").style.borderColor = null;
    return true;
}

function validateEmail()
{
    var email = document.getElementById("email");

    if(!email.value.match(/^[a-zA-Z]*[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/))
    {
        document.getElementById("emailCondition").style.display = "block";
        document.getElementById("email").style.borderColor = "#D90016";
        return false;
    }

    document.getElementById("emailCondition").style.display = "none";
    document.getElementById("email").style.borderColor = null;
    return true;
}

function validatePassword()
{
    var password = document.getElementById("password");

    if(password.value.length < 8 || !password.value.match(/[a-z]/) || !password.value.match(/[A-Z]/) || !password.value.match(/[0-9]/) || !password.value.match(/[\ -\/:-@\[-`\{-\~]/))
    {
        document.getElementById("passwordCondition").style.display = "block";
        document.getElementById("password").style.borderColor = "#D90016";
        return false;
    }

    document.getElementById("passwordCondition").style.display = "none";
    document.getElementById("password").style.borderColor = null;
    return true;
}

function updatePasswordStrength()
{
    document.getElementById("passwordStrengthBox").style.display = "block";
    var password = document.getElementById("password");
    var strength = document.getElementById("strength");

    var passwordStrength = 0;

    password.value.length >= 8 ? passwordStrength++ : "";
    password.value.match(/[a-z]/) ? passwordStrength++ : "";
    password.value.match(/[A-Z]/) ? passwordStrength++ : "";
    password.value.match(/[0-9]/) ? passwordStrength++ : "";
    password.value.match(/[\ -\/:-@\[-`\{-\~]/) ? passwordStrength++ : "";

    switch(passwordStrength)
    {
        case 1:
            strength.style.width = "20%";
            strength.style.borderColor = "#D90016";
            break;
        case 2:
            strength.style.width = "40%";
            strength.style.borderColor = "#D90016";
            break;
        case 3:
            strength.style.width = "60%";
            strength.style.borderColor = "#F5A623";
            break;
        case 4:
            strength.style.width = "80%";
            strength.style.borderColor = "#F5A623";
            break;
        case 5:
            strength.style.width = "100%";
            strength.style.borderColor = "#1F991F";
            break;
        default:
            strength.style.width = "0%";
            strength.style.borderColor = "#2F2F2F";
    }

    var letterStrength = document.getElementById("letterStrength");
    var symbolStrength = document.getElementById("symbolStrength");
    var lengthStrength = document.getElementById("lengthStrength");

    password.value.match(/[a-z]/) && password.value.match(/[A-Z]/) ? letterStrength.src = "Images/satisfied.png" : letterStrength.src = "Images/unsatisfied.png";
    password.value.match(/[0-9]/) && password.value.match(/[\ -\/:-@\[-`\{-\~]/) ? symbolStrength.src = "Images/satisfied.png" : symbolStrength.src = "Images/unsatisfied.png";
    password.value.length >= 8 ? lengthStrength.src = "Images/satisfied.png" : lengthStrength.src = "Images/unsatisfied.png";
}

window.onload = function()
{
    if(document.getElementById("success") != null)
    {
        setTimeout(function()
        {
            window.location.replace("../DIY_BuildPage/DIY_Mainpage.php");
        }, 5000);
    }
}