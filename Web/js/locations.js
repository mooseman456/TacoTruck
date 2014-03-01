window.addEventListener('load', function() {
	
	// Initialize Google Map
	var truck1LatLng = new google.maps.LatLng(32.73, -96.8);
	var truck2LatLng = new google.maps.LatLng(32.8, -97);
	var mapOptions = {center: new google.maps.LatLng(32.73, -96.8),zoom: 11 };
	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
	//google.maps.event.addDomListener(window, 'load', initialize);

	// Trucks from json
	geocoder = new google.maps.Geocoder();
	var request = new XMLHttpRequest();
	request.open("GET", "resources/taco_truck_locations.json", false);
	request.send();

	if (request.status === 200) {
		console.log("it worked!");
		var trucks = JSON.parse(request.responseText);
		console.log(trucks[1].name);
		
		var tempAddress = "Addison Circle, Addison, TX, 75001";
		for(var i = 0; i<trucks.length; i++) {
			console.log("count: " + i);
			geocoder.geocode( { 'address': trucks[i].address + ", " + trucks[i].city + ", " + trucks[i].state + " " + trucks[i].zipcode}, function(results, status) {
			    if (status == google.maps.GeocoderStatus.OK) {
			        var marker = new google.maps.Marker({
			            //title: trucks[count].name,
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

	// Dummy Trucks
/*
	var truck1 = new google.maps.Marker( {
		position: truck1LatLng,
		map: map,
		title: 'One Truck!'
	});

	var truck2 = new google.maps.Marker( {
		position: truck2LatLng,
		map: map,
		title: 'Two Truck!'
	});
*/

}, false);