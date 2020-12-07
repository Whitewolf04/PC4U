document.addEventListener("DOMContentLoaded", function()
{
	var purchase = document.getElementById("purchase");

	purchase.addEventListener("click", payment);
});

function payment()
{
	if(document.getElementById("subtotal").value > 0)
	{
		document.getElementById("cartform").submit();
	}
}