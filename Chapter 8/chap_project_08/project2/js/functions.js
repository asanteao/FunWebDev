/* add in your functions here */
function outputCountryBox(name, continent, cities, photos) {
	//inner function to output to cities
	document.write("<div class='item'>");
	document.write("<h2>" + name + "</h2>");
	document.write("<p>" + continent + "</p>");
	//output cities
	outputCities();
	//output photos
	outputPhotos();
	
	function outputCities() {
		document.write("<div class='inner-box'>");
		document.write("<h3>Cities</h3>");
		document.write("<ul>");
		
		var len = cities.length;
		for(let i = 0; i < len; i++) {
			document.write("<li>" + cities[i] + "</li>");
		}

		document.write("</ul>");
		document.write("</div>");
	}

	//inner function to output to cities
	function outputPhotos() {
		document.write("<div class='inner-box'>");
		document.write("<h3>Popular Photos</h3>");

		var len = photos.length;
		for(let i = 0; i < len; i++) {
			document.write("<img src='" + photos[i] + "' class='photo'>");
		}
		
		document.write("</div>");
	}
	document.write("<button>Visit</button>");
	document.write("</div>");
}
