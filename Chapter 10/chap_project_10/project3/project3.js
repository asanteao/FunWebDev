$(function () {
	//Globals
	var retrievedData;
	var browsersCount = {};
	var countriesCount = {};
	var OSCount = {};
	var filterCountry = 0;
	var filterBrowser = 0;
	var filterOS = 0;
	
	var url = "http://www.randyconnolly.com/funwebdev/services/visits/browsers.php";
	$.get(url)
		.done(function (data) {
			var browsers = $("#filterBrowser");
			for(let i=0; i<data.length; i++) {
				var opt = $("<option>").html(data[i].name);
				opt.val(data[i].id);
				browsers.append(opt);
			}
		})
		.fail(function (xhr, status, error) {
			console.log(status);
		});

	url = "http://www.randyconnolly.com/funwebdev/services/visits/os.php"
	$.get(url)
		.done(function (data) {
			var os = $("#filterOS");
			for(let i=0; i<data.length; i++) {
				var opt = $("<option>").html(data[i].name);
				opt.val(data[i].id);
				os.append(opt);
			}
		})
		.fail(function (xhr, status, error) {
			console.log(status);
		});

	url = "http://www.randyconnolly.com/funwebdev/services/visits/countries.php?continent=EU"
	$.get(url)
		.done(function (data) {
			var countries = $("#filterCountry");
			for(let i=0; i<data.length; i++) {
				var opt = $("<option>").html(data[i].name);
				opt.val(data[i].iso);
				countries.append(opt);
			}
		})
		.fail(function (xhr, status, error) {
			console.log(status);
		});

	// #visitsBody table
	url = "http://www.randyconnolly.com/funwebdev/services/visits/visits.php?continent=EU&month=1&limit=100"
	$.get(url)
		.done(function (data) {
			retrievedData = data;
			var tbody = $("#visitsBody");
			for(let i=0; i<data.length; i++) {
				var tr = $("<tr>");
				var id = $("<td>").html(data[i].id);
				id.css("text-align", "left");
				var date = $("<td>").html(data[i].visit_date);
				date.css("text-align", "left");
				var country = $("<td>").html(data[i].country);
				country.css("text-align", "left");
				var browser = $("<td>").html(data[i].browser);
				browser.css("text-align", "left");
				var os = $("<td>").html(data[i].operatingSystem);
				os.css("text-align", "left");
				tr.append(id);
				tr.append(date);
				tr.append(country);
				tr.append(browser);
				tr.append(os);
				tbody.append(tr);
			}

			//Get browsers counts
			//"browsersCount" is a global object to keep browser counts
			var browser;
			var browserCnt;
			for(let i=0; i<retrievedData.length; i++) {
				browser = retrievedData[i].browser;
				browserCnt = browsersCount[browser];
				if(browserCnt) {
					browsersCount[browser] += 1;
				} else {
					browsersCount[browser] = 1;
				}
			}

			//Get countries count 
			//"countriesCount" is a global object to keep browser counts
			var country;
			var countryCnt;
			for(let i=0; i<retrievedData.length; i++) {
				country = retrievedData[i].country;
				countryCnt = countriesCount[country];
				if(countryCnt) {
					countriesCount[country] += 1;
				} else {
					countriesCount[country] = 1;
				}
			}

			//Get countries count 
			//"countriesCount" is a global object to keep browser counts
			var os;
			var osCnt;
			for(let i=0; i<retrievedData.length; i++) {
				os = retrievedData[i].operatingSystem;
				osCnt = OSCount[os];
				if(osCnt) {
					OSCount[os] += 1;
				} else {
					OSCount[os] = 1;
				}
			}
			
			//DRAW CHARTS
			drawCharts();
		})
		.fail(function (xhr, status, error) {
			console.log(status);
		});

	//on Country filter change
	$("#filterCountry").on("change", function (e) {
		var filteredData = $.grep(retrievedData, function (elem) {
			filterCountry = e.target.value;	
			if(
				((elem.country_code == filterCountry) || filterCountry == 0) 
				&& 
				((elem.browser_id == filterBrowser) || filterBrowser == 0) 
				&& 
				((elem.os_id == filterOS) || filterOS == 0)
			)
				return true;
			else
				return false;
		});
		
		var tbody = $("#visitsBody");
		tbody.empty();
		for(let i=0; i<filteredData.length; i++) {
			var tr = $("<tr>");
			var id = $("<td>").html(filteredData[i].id);
			id.css("text-align", "left");
			var date = $("<td>").html(filteredData[i].visit_date);
			date.css("text-align", "left");
			var country = $("<td>").html(filteredData[i].country);
			country.css("text-align", "left");
			var browser = $("<td>").html(filteredData[i].browser);
			browser.css("text-align", "left");
			var os = $("<td>").html(filteredData[i].operatingSystem);
			os.css("text-align", "left");
			tr.append(id);
			tr.append(date);
			tr.append(country);
			tr.append(browser);
			tr.append(os);
			tbody.append(tr);
		}
		
	});	
	
	//on browser filter change
	$("#filterBrowser").on("change", function (e) {
		console.log(retrievedData);
		var filteredData = $.grep(retrievedData, function (elem) {
			filterBrowser = e.target.value;	
			console.log(filterBrowser);
			if(
				((elem.country_code == filterCountry) || filterCountry == 0) 
				&& 
				((elem.browser_id == filterBrowser) || filterBrowser == 0) 
				&& 
				((elem.os_id == filterOS) || filterOS == 0)
			)
				return true;
			else
				return false;
		});
		console.log(filteredData);
		
		var tbody = $("#visitsBody");
		tbody.empty();
		for(let i=0; i<filteredData.length; i++) {
			var tr = $("<tr>");
			var id = $("<td>").html(filteredData[i].id);
			id.css("text-align", "left");
			var date = $("<td>").html(filteredData[i].visit_date);
			date.css("text-align", "left");
			var country = $("<td>").html(filteredData[i].country);
			country.css("text-align", "left");
			var browser = $("<td>").html(filteredData[i].browser);
			browser.css("text-align", "left");
			var os = $("<td>").html(filteredData[i].operatingSystem);
			os.css("text-align", "left");
			tr.append(id);
			tr.append(date);
			tr.append(country);
			tr.append(browser);
			tr.append(os);
			tbody.append(tr);
		}
		
	});

	//on OS filter change
	$("#filterOS").on("change", function (e) {
		var filteredData = $.grep(retrievedData, function (elem) {
			filterOS = e.target.value;	
			if(
				((elem.country_code == filterCountry) || filterCountry == 0) 
				&& 
				((elem.browser_id == filterBrowser) || filterBrowser == 0) 
				&& 
				((elem.os_id == filterOS) || filterOS == 0)
			)
				return true;
			else
				return false;
		});
		
		var tbody = $("#visitsBody");
		tbody.empty();
		for(let i=0; i<filteredData.length; i++) {
			var tr = $("<tr>");
			var id = $("<td>").html(filteredData[i].id);
			id.css("text-align", "left");
			var date = $("<td>").html(filteredData[i].visit_date);
			date.css("text-align", "left");
			var country = $("<td>").html(filteredData[i].country);
			country.css("text-align", "left");
			var browser = $("<td>").html(filteredData[i].browser);
			browser.css("text-align", "left");
			var os = $("<td>").html(filteredData[i].operatingSystem);
			os.css("text-align", "left");
			tr.append(id);
			tr.append(date);
			tr.append(country);
			tr.append(browser);
			tr.append(os);
			tbody.append(tr);
		}
	});

	//Function the draw browsers
	function drawCharts() {
		// Load the Visualization API and the corechart package.
		google.charts.load('current', 
			{
				'packages':['corechart', 'geochart', 'bar'], 
				'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
			});
	
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(drawBrowsers);
		google.charts.setOnLoadCallback(drawMap);
		google.charts.setOnLoadCallback(drawOS);
	
		// Callback that creates and populates a data table,
		// instantiates the pie chart, passes in the data and
		// draws it.
		function drawBrowsers() {
	
			// Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Browsers');
			data.addColumn('number', 'Visits');
			var dataRows = [];
			for(prop in browsersCount) {
				dataRows.push([prop, browsersCount[prop]]);
			}
			data.addRows(dataRows);
	
			// Set chart options
			var options = {'title':'Browser Counts',
	                       'width':400,
	                       'height':300};
	
			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
	      }
	

		//Callback to draw the coun
		function drawMap() {
			//Define the data to be drawn
			var countryData = [['Country', 'Visits']];
			for(prop in countriesCount) {
				countryData.push([prop, countriesCount[prop]]);
			}
			var data = google.visualization.arrayToDataTable(countryData);
			var options = {region: 150};
			
			//Instantiate and draw the map
			var chart = new google.visualization.GeoChart(document.getElementById('geochart'));
			chart.draw(data, options);
		}

		function drawOS() {
			//Define the data to be drawn
			var osData = [];
			for(os in OSCount) {
				osData.push([os, OSCount[os]]);
			}
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Operating System');
			data.addColumn('number', 'Visits');
			data.addRows(osData);
			
			//Instantiate and draw the map
			var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
			chart.draw(data);
		}
	}
});
