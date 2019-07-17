/* code goes here */
/*responsible for setting up event listeners on the page*/
function init() {
	document.getElementById("sampleForm").addEventListener("submit", checkForEmptyFields);
}

/*initialize handler once page is ready*/
window.addEventListener("load", init);

/*ensures form fields are not empty*/
function checkForEmptyFields(e) {
	/* hide the error message element */
	//this is an empty <div> in the html document
	var errorArea = document.getElementById("errors");
	errorArea.className = "hidden";
	
	var cssSelector = "input[type=text], input[type=password]";
	var fields = document.querySelectorAll(cssSelector);

	//loop thru the input elements looking for empty values
	var fieldList = [];
	for(i=0; i<fields.length; i++) {
		if(fields[i].value == null || fields[i].value == "") {
			e.preventDefault();
			fieldList.push(fields[i]);
		}
	}
	
	//now set up the error message
	var msg = "The following fields can't be empty: ";
	if(fieldList.length > 0) {
		for(i=0; i<fieldList.length; i++) {
			msg += fieldList[i].id + ", ";
		}
	}
	errorArea.innerHTML = "<p>" + msg + "</p>";
	errorArea.className = "visible";
}

