


/* Create some global variables */
var map;
var geocoder;
var infowindow;
var title;
var marker = null;
/* Create function that push options to select list */
function createSelctedList() {
	var selectList = document.getElementById("selectpicker");
	for (var ind in dateObject) {
		var option = document.createElement("option");
		option.value = ind;
		option.text = ind;
		selectList.appendChild(option);
	}
}

/* Create function that initialize the map view */
function initialize() {
	geocoder = new google.maps.Geocoder();
	var location = new google.maps.LatLng(48.856, 2.3522);
	var mapOptions = {
		center: location,
		zoom: 14
	};
	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	infowindow = new google.maps.InfoWindow();
	google.maps.event.addListener(map, 'click', function() {
		infowindow.close();
	});
}

/* Create function that handle the select change event */
function onSelectChange() {
	var selectedOption = document.getElementById('selectpicker').value;
	title = dateObject[selectedOption];
	var geocoderOptions = {
		'address': dateObject[selectedOption],
		'region': 'FR'
	};
	if (selectedOption == "Aucune") {
		alert("Veuillez choisir votre date d'inscription!");
	} else {
		geocoder.geocode({'address': geocoderOptions['address']}, function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				placeMarker(results[0].geometry.location);
			}
		});
	}
}

/* Create function place the marker on map */
function placeMarker(location) {
	if (marker) {
		marker.setMap(null);
	} 
	marker = new google.maps.Marker({
		position: location,
		map: map,
		icon: '../img/marker.png',
		title: title
	});
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent(title);
		infowindow.open(map, marker);
	});
}

createSelctedList();
initialize();