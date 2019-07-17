
/* add code here  */
window.addEventListener("load", function () {
	var hilightable_elems = document.getElementsByClassName("hilightable");
	var len = hilightable_elems.length;
	var elem;
	for(var i = 0; i < len; i++) {
		elem = hilightable_elems[i];
		elem.addEventListener("focus", makeToggleFunction(elem));
		elem.addEventListener("blur", makeToggleFunction(elem));
	}

	//This is a function maker that creates new lexical environment for each callback
	//So that each callback added as a listener has it's own specific elemotherwise all the callbacks refer to the same elem, and thus will toggle that.
	//rather than the elem being listened to.
	function makeToggleFunction(elem) {
		return function () {
			if(elem.classList) {
				elem.classList.toggle("highlight");
			} else {
				//For browsers that do not support classList
				let classes = elem.className.split(" ");
				let index = classes.indexOf("highlight");
				if(index >= 0) {
					classes = classes.splice(index, 1);
					elem.className = classes.join(" ");
				} else {
					classes.push("highlight");
					elem.className = classes.join(" ");
				}
			}
		};
	}
	
	/* Script for required fields */
	document.getElementById("mainForm").addEventListener("submit", checkRequiredFields);
	function checkRequiredFields(e) {
		var req_elems = document.getElementsByClassName("required");
		var len = req_elems.length;
		for(let i=0; i<len; i++) {
			let req_elem = req_elems[i];
			if(req_elem.value == null || req_elem.value == "") {
				e.preventDefault();
				req_elem.classList.toggle("error");
			}
		}
	}
});
