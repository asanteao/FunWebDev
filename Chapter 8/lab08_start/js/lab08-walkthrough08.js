// define functions in this file
function outputBox(num) {
	var boxClass = 'movingDiv';
	box = "<div class='" + boxClass + "' movingDiv' id='div"+num+"'>";
	box += "This is div " + num;
	box += "</div>";
	return box;
}
