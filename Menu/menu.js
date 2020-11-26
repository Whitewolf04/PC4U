document.addEventListener("DOMContentLoaded", function()
{
    var shoppingCart = document.getElementById("shoppingCart");
    var accountButton = document.getElementById("accountButton");
    var loginButton = document.getElementById("loginButton");
    var registerButton = document.getElementById("registerButton");

    shoppingCart.addEventListener("mouseover", glowShoppingCart);
    shoppingCart.addEventListener("mouseout", dullShoppingCart);

    accountButton.addEventListener("mouseover", displayAccountOptions);
    loginButton.addEventListener("mouseover", displayAccountOptions);
    registerButton.addEventListener("mouseover", displayAccountOptions);
    accountButton.addEventListener("mouseout", hideAccountOptions);
    loginButton.addEventListener("mouseout", hideAccountOptions);
    registerButton.addEventListener("mouseout", hideAccountOptions);
});

function displayAccountOptions()
{
    document.getElementById("accountOptions").style.display = "block";
}

function hideAccountOptions()
{
    document.getElementById("accountOptions").style.display = "none";
}

function glowShoppingCart()
{
    document.getElementById("shoppingCartTop").style.opacity = "0";
}

function dullShoppingCart()
{
    document.getElementById("shoppingCartTop").style.opacity = "1";
}