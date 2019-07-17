/* add loop and other code here ... in this simple exercise we are not
   going to concern ourselves with minimizing globals, etc */
var subTotal = 0;
var tax = 0;
var shipping = 0;
var grandTotal = 0;

var file = "";
var title = "";
var quantity = 0;
var price = 0;
var total = 0;

for(var i = 0; i < filenames.length; i++) {
	file = filenames[i];
	title = titles[i];
	quantity = quantities[i];
	price = prices[i];
	total = calculateTotal(quantity, price);
	subTotal += total;
	outputCartRow(file, title, quantity, price, total);
}

//tax
tax = subTotal * 0.10;

//shipping
if(subTotal > 1000) 
	shipping = 0;
else
	shipping = 40;

//grand total
grandTotal = subTotal + tax + shipping;

//print totals
document.write("<tr class='totals'>");
document.write("<td colspan='4'>Subtotal</td>");
document.write("<td>$" + subTotal.toFixed(2) + "</td>");
document.write("</tr>");

document.write("<tr class='totals'>");
document.write("<td colspan='4'>Tax</td>");
document.write("<td>$" + tax.toFixed(2) + "</td>");
document.write("</tr>");


document.write("<tr class='totals'>");
document.write("<td colspan='4'>Shipping</td>");
document.write("<td>$" + shipping.toFixed(2) + "</td>");
document.write("</tr>");

document.write("<tr class='totals focus'>");
document.write("<td colspan='4'>Grand Total</td>");
document.write("<td>$" + grandTotal.toFixed(2) + "</td>");
document.write("</tr>");
