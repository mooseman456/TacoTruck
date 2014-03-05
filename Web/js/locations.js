window.addEventListener('load', function() {
	// Hover over locations event listener
	var locations = $(".location");
	$.each(locations, function(index, value) {
		$(value).addClass("shadowBox");
		$(value).hover( function() {
			console.log("on");
			$(value).addClass("hover");	
		}, function() {
			console.log("off");
			$(value).removeClass("hover");
		})
	});
	

	// Initialize Google Map
	var mapOptions = {center: new google.maps.LatLng(32.68, -96.8),zoom: 11 };
	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

	// Trucks from json
	geocoder = new google.maps.Geocoder();
	var request = new XMLHttpRequest();
	request.open("GET", "resources/taco_truck_locations.json", false);
	request.send();

	if (request.status === 200) {
		var trucks = JSON.parse(request.responseText); //Holds the information about the truck pins

		for(var i = 0; i<trucks.length; i++) {
			console.log("count: " + i);
			geocoder.geocode( { 'address': trucks[i].address + ", " + trucks[i].city + ", " + trucks[i].state + " " + trucks[i].zipcode}, function(results, status) {
			    if (status == google.maps.GeocoderStatus.OK) {
			        marker = new google.maps.Marker({
			            map: map,
			            position: results[0].geometry.location
			        });
			    } else {
			        alert("Geocode was not successful for the following reason: " + status);
			    }
			});
		}	
	} else {
		window.alert("Could not get truck locations.")
	}
}, false);


function initialize() {
	console.log("poop");
}











