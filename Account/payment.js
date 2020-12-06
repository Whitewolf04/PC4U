document.addEventListener("DOMContentLoaded", function()
{
	if(document.getElementById("email") != null)
	{
		var next = document.getElementById("nextButton");

		next.addEventListener("click", validateEmail);
	}

	if(document.getElementById("CCnum") != null)
	{
		var next = document.getElementById("nextButton");

		next.addEventListener("click", validateCreditcard);
	}

	if(document.getElementById("addressl1") != null)
	{
		var next = document.getElementById("nextButton");

		next.addEventListener("click", validateShipping);
	}
});

function validateEmail()
{
	var email = document.getElementById("email");

    if(!email.value.match(/^[a-zA-Z]*[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/))
    {
		email.style.borderColor = "#D90016";
		document.getElementById("emailCondition").style.display = "block";
		return;
    }

	email.style.borderColor = null;
	document.getElementById("emailCondition").style.display = null;
    document.getElementById("payment").submit();
}

function validateCreditcard()
{
	var CCnum = document.getElementById("CCnum");
	var CCname = document.getElementById("CCname");
	var CCmm = document.getElementById("CCmm");
	var CCyy = document.getElementById("CCyy");
	var CCvv = document.getElementById("CCvv");
	var valid = true;

	if(!CCnum.value.match(/^[0-9]{16}$/))
	{
		CCnum.style.borderColor = "#D90016";
        valid = false;
	} else {
        CCnum.style.borderColor = null;
	}

	if(!CCname.value.match(/^[a-z]+ [a-z]+$/i))
	{
        CCname.style.borderColor = "#D90016";
        valid = false;
	} else {
        CCname.style.borderColor = null;
	}

	if(!CCmm.value.match(/^[0-9]{2}$/) || CCmm.value < 1 || CCmm.value > 12)
	{
		CCmm.style.borderColor = "#D90016";
        valid = false;
	} else {
		CCmm.style.borderColor = null;
	}

	if(!CCyy.value.match(/^[0-9]{2}$/))
	{
		CCyy.style.borderColor = "#D90016";
        valid = false;
	} else {
		CCyy.style.borderColor = null;
	}

	if(!CCvv.value.match(/^[0-9]{3}$/))
	{
        CCvv.style.borderColor = "#D90016";
        valid = false;
	} else {
        CCvv.style.borderColor = null;
	}

	if(valid)
	{
		document.getElementById("payment").submit();
	}
}

function validateShipping()
{
	var addressl1 = document.getElementById("addressl1");
	var postalcode = document.getElementById("postalcode");
	var city = document.getElementById("city");
	var province = document.getElementById("province");
	var valid = true;

	if(!addressl1.value.match(/[0-9]+/) || !addressl1.value.match(/[a-z]+/i))
	{
		addressl1.style.borderColor = "#D90016";
		valid = false;
	} else {
		addressl1.style.borderColor = null;
	}

	if(!postalcode.value.match(/^[0-9a-z]{6}$/i))
	{
		postalcode.style.borderColor = "#D90016";
		valid = false;
	} else {
		postalcode.style.borderColor = null;
	}

	if(!city.value.match(/^[a-z]+$/i))
	{
		city.style.borderColor = "#D90016";
		valid = false;
	} else {
		city.style.borderColor = null;
	}

	if(!province.value.match(/^[A-Z]+$/))
	{
		province.style.borderColor = "#D90016";
		valid = false;
	} else {
		province.style.borderColor = null;
	}

	if(valid)
	{
		document.getElementById("payment").submit();
	}
}