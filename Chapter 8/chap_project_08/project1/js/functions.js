/* define functions here */
function calculateTotal(quantity, price) {
	return quantity * price;
}

function outputCartRow(file, title, quantity, price, total) {
	document.write("<tr>");
	document.write("<td> <img src='images/" + file + "'></td>");
	document.write("<td>"+ title + "</td>");
	document.write("<td>"+ quantity + "</td>");
	document.write("<td>$"+ price.toFixed(2) + "</td>");
	document.write("<td>" + calculateTotal(quantity, price).toFixed(2) + "</td>");
	document.write("</tr>");
}

        
