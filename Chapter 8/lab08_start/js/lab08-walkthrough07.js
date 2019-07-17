/* add code here */
var daysOfWeek = new Array("Mon", "Tues", "Wed", "Thurs", "Fri");
//document.write(daysOfWeek+"<br/>");
daysOfWeek.push("Sat");
//document.write(daysOfWeek+"<br/>");
daysOfWeek.unshift("Sun");
//document.write(daysOfWeek+"<br/>");
document.write("<table border=1>");
document.write("<tr>");
for(var i = 0; i < daysOfWeek.length; i++) {
	if(daysOfWeek[i].length < 4)
		day = daysOfWeek[i];
	else
		day = "<em>" + daysOfWeek[i] + "</em>";
	document.write("<th>" + day + "</th>");
}
document.write("</tr>");
/*
for(var i = 1; i < 32; ) {
	document.write("<tr>");
	for(var j = 0; j < 7; j++) {
		if(i < 32) {
			document.write("<td>" + i + "</td>");
		} else {
			document.write("<td></td>");
		}
		i++;
	}
	document.write("</tr>");
}
*/
var i = 1;
while(i < 32) {
	document.write("<tr>");
	for(var j = 0; j < 7; j++) {
		if(i < 32)
			document.write("<td>" + i + "</td>");
		else
			document.write("<td></td>");
		i++;
	}
	document.write("</tr>");
} 
document.write("</table>");
