/* code goes here */
/*
order.product = "Self Portrait in a Straw Hat";
order.price = 15.0;
order.quantity = 2;
order.total = function () { return this.price * this.quantity };
*/

/*
order["product"] = "Self Portrait in a Straw Hat";
order["price"] = 15.0;
order["quantity"] = 2;
order["total"] = function () { return this.price * this.quantity };
*/

/*
var order = {
	product: "Self Portrait in a Straw Hat",
	price: 15.0,
	quantity: 2,
	total: function () {return this.price * this.quantity; }
}
*/

function order(product, price, quantity) {
	this.product = product;
	this.price = price;
	this.quantity = quantity;
	this.total = function () { return this.quantity * this.price };
	
	this.output = function () {
			document.write("<p>Product=" + this.product);
			document.write("<br/>Price=" + this.price);
			document.write("<br/>Quantity=" + this.quantity);
			document.write("<br/>Total=" + this.total());
		};
}

var example1 = new order("Self Portrait in a Straw Hat", 15.0, 2);
var example2 = new order("Untitled #24", 10.0, 4);

example1.output();
example2.output();
