
function calculatePayment(){

 	p = document.getElementById("principal").value
    n = document.getElementById("loanTerm").value
    n = Math.round(n)
	document.getElementById("loanTerm").value = n

    annualRate = document.getElementById("interestRate").value

    if (isNaN(p) || p < 0) {
    	alert("Please input only numeric, positive values")
    	document.getElementById("principal").value = 0
    	return
    }

    if (isNaN(n) || n < 0) {
    	alert("Please input only numeric, positive values")
    	document.getElementById("loanTerm").value = 0
    	return
    }

    if (isNaN(annualRate) || annualRate < 0) {
    	alert("Please input only numeric, positive values")
    	document.getElementById("interestRate").value = 0
    	return
    }

    monthlyRate = (annualRate / 12) / 100 
	
    monthlyPayment = (p * monthlyRate) / (1 - (1 / ((1 + monthlyRate)**n)))
	sumPayments = monthlyPayment * n

	TotalInterestPaid = sumPayments - p
	
	monthlyPayment = monthlyPayment.toFixed(2)
	sumPayments = sumPayments.toFixed(2)
	TotalInterestPaid = TotalInterestPaid.toFixed(2)

    document.getElementById("payment").innerHTML = monthlyPayment
    document.getElementById("sumPayments").innerHTML = sumPayments
    document.getElementById("interestPaid").innerHTML = TotalInterestPaid

    var form = document.getElementById("calcForm");
	function handleForm(event) { event.preventDefault(); } 
	form.addEventListener('submit', handleForm);
    
    return

}