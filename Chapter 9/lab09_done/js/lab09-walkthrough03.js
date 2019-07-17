/* code goes here */

var first = document.getElementById("first");

var text = document.createTextNode("this is programmatically created");
var p = document.createElement("p");

p.appendChild(text);
first.appendChild(p);

var icons = document.getElementById("iconList");
icons.removeChild( document.getElementById("deleteThisOne") );