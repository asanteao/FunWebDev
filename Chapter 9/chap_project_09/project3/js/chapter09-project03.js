/* add code here */
window.addEventListener("load", function () {
	//highlight button
	hl_btn = document.getElementById("highlight");
	hl_btn.addEventListener("click", highlightNodes);

	//hide button
	hd_btn = document.getElementById("hide");
	hd_btn.addEventListener("click", removeHighlights);
	hd_btn.style.display = "none";

	function highlightNodes() {
		function innerHighlightNodes(node) {
			var childNodes = node.childNodes;
			var len = childNodes.length;
			for(let i = 0; i<len; i++) {
				let childNode = childNodes[i];
				if(childNode.nodeType == 1 && childNode.className != "hoverNode") {
					let newNode = document.createElement("span");
					newNode.className = "hoverNode";
					newNode.innerText = childNode.nodeName.toLowerCase();
					newNode.addEventListener("click", function () {
						let msg = "id: " + childNode.id + "\ntag name: " + 
							childNode.nodeName.toLowerCase() + "\nclass name: " + 
							childNode.className + "\ninner HTML: " + childNode.innerHTML;
						alert(msg);
					});
					childNode.appendChild(newNode);
					innerHighlightNodes(childNode);
				}
			}
		}
		
		//Starting from the body element (the root node of the HTML) work your way through the tree.
		var root = document.querySelector("body");
		innerHighlightNodes(root);
		hl_btn.style.display = "none";
		hd_btn.style.display = "block";
	}

	function removeHighlights() {
		//Remove all elements in the class "hoverNode". 
		var hoverNodes = document.getElementsByClassName("hoverNode");
		var len = hoverNodes.length;

		//NOTE: that we always remove the first element. This is because "document.getElementByClassName()"
		//returns an HTMLCollection object (at least in Chrome). This HTMLCollection is a "live object"
		//meaning it updates everytime the document changes. So if we try to remove using index i. We will
		//eventually get an out of bounds exception.
		for(let i = 0; i < len; i++) {
			hoverNodes[0].remove();
		}
		hd_btn.style.display = "none";
		hl_btn.style.display = "block";
	}
});
