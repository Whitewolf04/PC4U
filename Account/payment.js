document.addEventListener("DOMContentLoaded", function()
{
	if(document.getElementById("CCnum") != null)
	{
		var next = document.getElementById("nextButton");

		next.addEventListener("click", validateCreditcard);
	}
});

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
		document.getElementById("CCnum").style.borderColor = "#D90016";
        valid = false;
	} else {
        document.getElementById("CCnum").style.borderColor = null;
	}

	if(!CCname.value.match(/^[a-z]+ [a-z]+$/i))
	{
        document.getElementById("CCname").style.borderColor = "#D90016";
        valid = false;
	} else {
        document.getElementById("CCname").style.borderColor = null;
	}

	if(!CCmm.value.match(/^[0-9]{2}$/) || CCmm.value < 1 || CCmm.value > 12)
	{
		document.getElementById("CCmm").style.borderColor = "#D90016";
        valid = false;
	} else {
		document.getElementById("CCmm").style.borderColor = null;
	}

	if(!CCyy.value.match(/^[0-9]{2}$/))
	{
		document.getElementById("CCyy").style.borderColor = "#D90016";
        valid = false;
	} else {
		document.getElementById("CCyy").style.borderColor = null;
	}

	if(!CCvv.value.match(/^[0-9]{3}$/))
	{
        document.getElementById("CCvv").style.borderColor = "#D90016";
        valid = false;
	} else {
        document.getElementById("CCvv").style.borderColor = null;
	}

	if(valid)
	{
		document.getElementById("payment").submit();
	}
}