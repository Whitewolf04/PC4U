document.addEventListener("DOMContentLoaded", function()
{
    var shoppingCart = document.getElementById("shoppingCart");
    var logo = document.getElementById("logo");

    shoppingCart.addEventListener("mouseover", glowShoppingCart);
    shoppingCart.addEventListener("mouseout", dullShoppingCart);

    if(document.body.classList.contains("darkmode"))
    {
        shoppingCart.src = "../Account/Images/shopping_cart_nohover_dark.png";
        logo.src = "../logo_dark.png";
    } else {
        shoppingCart.src = "../Account/Images/shopping_cart_nohover_light.png";
        logo.src = "../logo_light.png";
    }
});

function glowShoppingCart()
{
    document.getElementById("shoppingCart").src = "../Account/Images/shopping_cart_hover.png";
}

function dullShoppingCart()
{
    var shoppingCart = document.getElementById("shoppingCart");

    if(document.body.classList.contains("darkmode"))
    {
        shoppingCart.src = "../Account/Images/shopping_cart_nohover_dark.png";
    } else {
        shoppingCart.src = "../Account/Images/shopping_cart_nohover_light.png";
    }
}