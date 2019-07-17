/* code goes here */
var isCanadian = true;


function calculateTax(amount) {

	var tax = function taxRate() {
		if(isCanadian) {
			return 0.05;
		} else {
			return 0.0;
		}
	}
	return amount * tax();
}

function calculateTotal(price, quantity) {
	return (price * quantity) + calculateTax(price * quantity);
}

