document.addEventListener("DOMContentLoaded", function()
{
    var shoppingCart = document.getElementById("shoppingCart");

    shoppingCart.addEventListener("mouseover", glowShoppingCart);
    shoppingCart.addEventListener("mouseout", dullShoppingCart);
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