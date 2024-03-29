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

var last_lat = null;
var last_lng = null;
var elapsed = null;
var dist = null;
var total_dist = null;

// Waits until the device is ready before starting the js function(s) and then calls loadMap
//document.addEventListener("deviceready", onDeviceReady, false);
 
//function onDeviceReady() { //lets go directly through the browser

	// Instantiate a geolocation watch 
	GeoWatchID = navigator.geolocation.watchPosition(onGeolocationSuccess, onGeolocationError, { enableHighAccuracy: true, timeout: 30000 });

	trackID = setInterval ( watchLocation, 1000 );		

	timerID = setInterval ( watchTimer, 1000 );

//}


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

function start() {	
        total_dist = null; //reset distance
	timestamp = new Date();
        last_time = new Date();
        last_lat = lat;
        last_lng = lng;
}

function stop() {	

	timestamp = null;

}


function watchTimer(){
        //set new timestamp
	time = new Date();

        //wait to hit start button
        if (timestamp != null){
        	
          //get elapsed time from start
	  elapsed = (time - timestamp)/1000;
	      	
          //watch distance
          dist = getDistance(last_lat, last_lng, lat, lng);
	  total_dist += dist;
	  
        }

        //print to the app
	document.getElementById('track').innerHTML = 'time: ' + elapsed + ' sec <br>speed: ' + speed + ' meters per sec <br>distance: ' + total_dist + ' meters';	
	document.getElementById('geo').innerHTML = 'time: ' + elapsed + ' sec <br>speed: ' + speed + ' meters per sec <br>distance: ' + total_dist + ' meters';	
        document.getElementById('distance').value = total_distance;

        //reset lat,lng,time for next watch
        last_lat = lat;
        last_lng = lng;

}

function getDistance(lat1,lon1,lat2,lon2) {
	var R = 6371000; // Radius of the earth in meters
	var dLat = deg2rad(lat2-lat1);  // deg2rad below
	var dLon = deg2rad(lon2-lon1); 
	var a = 
	  Math.sin(dLat/2) * Math.sin(dLat/2) +
	  Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
	  Math.sin(dLon/2) * Math.sin(dLon/2)
	  ; 
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	var d = R * c; // Distance in meters
	return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}
