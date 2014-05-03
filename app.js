
//initialize variables
var map        = null;
var GeoWatchID = null;
var trackID    = null;
var timerID    = null;
var lat        = null;
var lng        = null;
var track      = null;
var marker     = null;
var acr        = null;
var alt        = null;
var altAcr     = null;
var heading    = null;
var speed      = null;
var timestamp  = null;
var time       = null;

// Waits until the device is ready before starting the js function(s) and then calls loadMap
document.addEventListener("deviceready", onDeviceReady, false);
 
function onDeviceReady() {
	
	// Instantiate a geolocation watch 
	GeoWatchID = navigator.geolocation.watchPosition(onGeolocationSuccess, onGeolocationError, { enableHighAccuracy: true, timeout: 30000 });
		
	trackID = setInterval ( watchLocation, 1000 );		

	timerID = setInterval ( watchTimer, 1000 );
		
}


// onSuccess Geolocation
function onGeolocationSuccess(position) {
	
	lat       = position.coords.latitude;
	lng       = position.coords.longitude;
	acr       = position.coords.accuracy;
	alt       = position.coords.altitude;
	altAcr    = position.coords.altitudeAccuracy;
	heading   = position.coords.heading;
	speed     = position.coords.speed;

	
	map = L.map('map', { zoomControl:false }).setView([lat , lng], 15);	

	// add an OpenStreetMap tile layer
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);
	
	marker = L.marker([lat, lng]);
		map.addLayer(marker);
		//marker.bindPopup('add a comment here')
		//.openPopup();	
}
	
// onError Callback receives a PositionError object
//
function onGeolocationError(error) {
		alert('code: '    + error.code    + '\n' +
			  'message: ' + error.message + '\n');
}

function watchLocation(){
	
	
	// add a marker in the given location, attach some popup content to it and open the popup		
	var circleMarker = L.circleMarker([lat, lng],{
    	color: 'red',
		radius: 7,
		fillOpacity: '1'
	}).addTo(map);
		
	marker.setLatLng([lat, lng]);	
}

function timer() {	
	timestamp = new Date();

}

function watchTimer(){
	time = new Date();
	var elapsed = time - timestamp;
	document.getElementById('geo').innerHTML = 'time: ' + elapsed + '<br>test: '+ time +'<br>speed: ' + speed;	
}
