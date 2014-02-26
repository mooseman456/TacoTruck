window.addEventListener('load', function() {
	
	// Initialize Google Map
	var truck1LatLng = new google.maps.LatLng(32.73, -96.8);
	var truck2LatLng = new google.maps.LatLng(32.8, -97);
	var mapOptions = {center: new google.maps.LatLng(32.73, -96.8),zoom: 11 };
	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
	//google.maps.event.addDomListener(window, 'load', initialize);

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

}, false);