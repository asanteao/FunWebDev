/* add code below this */
var stringOne = new String("Test");
var stringTwo = "Test";
var stringThree = "Test";
var stringFour = new String("Test");

document.write("<br>typeof stringOne=" + typeof stringOne);
document.write("<br>typeof stringThree=" + typeof stringThree);

if(stringOne == stringTwo)
	document.write("<br>stringOne has = value to stringTwo");
if(stringOne == stringFour)
	document.write("<br>stringOne has = value to stringFour");
if(stringOne === stringTwo)
	document.write("<br>stringOne has = value and = type to stringTwo");
if(stringTwo === stringThree)
	document.write("<br>stringTwo has = value and = type to stringThree");
if(stringTwo === stringFour)
	document.write("<br>stringTwo has = value and = type to stringFour");

var dateOne = new Date();
document.write("<p>" + dateOne + "</p>");

document.write("<br>" + Math.PI + "<br/>");
document.write(Math.sqrt(4) + "<br/>");
document.write(Math.random() + "<br/>");
