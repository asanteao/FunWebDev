/* add code here */
window.addEventListener("load", function () {
	//Mouseover figure img should fade in the caption
	//Mouseout events should fade out the caption
	var fig = document.querySelector("#featured");
	fig.addEventListener("mouseover", fadeInCaption);
	fig.addEventListener("mouseout", fadeOutCaption);


	var thumbs = document.getElementById("thumbnails");
	thumbs.addEventListener("click", setImage);
	
	//Function to show the larger version of a thumbnail in figure
	//Also sets the caption in figure to clicked image's title attribute
	function setImage(e) {
		// .target return a "node" read about API online
		// Nodes have properties (childNodes, firstChild, nodeName,etc
		// Nodes also have methods (appendChild(), contains(), removeChild
		// elem is a node
		var target = e.target;
		if(target && target.nodeName == "IMG") {
			var img = document.querySelector("#featured img");
			var caption = document.querySelector("#featured figcaption");
			//Change image of featured
			var array = target.getAttribute("src").split("/");
			var index = array.indexOf("small");
			array[index] = "medium";
			var newSrc = array.join("/");
			img.setAttribute("src", newSrc);

			//Change caption of feature
			caption.innerHTML = target.getAttribute("title");
		}
	}
	
	//Function to display caption of the featured image.
	//That is, change its opacity from 0 to 80%
	function fadeInCaption() {
		fig_caption = document.querySelector("#featured figcaption");
		fig_caption.style.opacity = 0.8;
		fig_caption.style.transition = "opacity 1s";
	}
	
	//Function to display caption of the featured image.
	//That is, change its opacity from 0 to 80%
	function fadeOutCaption() {
		fig_caption = document.querySelector("#featured figcaption");
		fig_caption.style.opacity = 0.0;
	}
});
