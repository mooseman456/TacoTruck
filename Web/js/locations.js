window.addEventListener('load', function() {
	// Hover over locations event listener
	var locations = $(".location");
	$.each(locations, function(index, value) {
		$(value).addClass("shadowBoxLight");
		$(value).hover( function() {
			$(value).addClass("hover");
			markers[index].setAnimation(google.maps.Animation.BOUNCE);
		}, function() {
			$(value).removeClass("hover");
			markers[index].setAnimation(null);
		})
	});
	

	// Initialize Google Map
	var mapOptions = {center: new google.maps.LatLng(32.84, -96.8),zoom: 10 };
	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

	// Trucks from json
	geocoder = new google.maps.Geocoder();
	var request = new XMLHttpRequest();
	request.open("GET", "resources/taco_truck_locations.json", false);
	request.send();
	var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';

	var markers = {};
	if (request.status === 200) {
		var trucks = JSON.parse(request.responseText); //Holds the information about the truck pins
		var count = 0;
		for(var i = 0; i<trucks.length; i++) {
			console.log("count: " + i);
			geocoder.geocode( { 'address': trucks[i].address + ", " + trucks[i].city + ", " + trucks[i].state + " " + trucks[i].zipcode}, function(results, status) {
			    if (status == google.maps.GeocoderStatus.OK) {
			        var marker = new google.maps.Marker({
			            id: count,
			            map: map,
			            animation: google.maps.Animation.DROP,
			            position: results[0].geometry.location,
			            title: trucks[count++].name
			        });
			        markers[count-1] = marker;
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











