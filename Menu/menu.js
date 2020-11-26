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
    document.getElementById("shoppingCart").src = "../Menu/Images/shopping_cart_hover.png";
}

function dullShoppingCart()
{
    document.getElementById("shoppingCart").src = "../Menu/Images/shopping_cart_nohover.png";
}