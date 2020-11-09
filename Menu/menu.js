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
    document.getElementById("shoppingCart").src = "Images/shopping_cart_hover.png";
}

function dullShoppingCart()
{
    document.getElementById("shoppingCart").src = "Images/shopping_cart_nohover.png";
}