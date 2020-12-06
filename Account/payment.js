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