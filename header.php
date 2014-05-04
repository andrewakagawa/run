<?php
session_start(); // Must start session first thing
/*
gamehack
*/
// See if they are a logged in member by checking Session data


//Connect to the database through our include
include_once "connect_to_mysql.php";



?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8" />
  <title>Run Quest</title>

  <!-- external links to jquery -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
  <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>

  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />
  <!--[if lte IE 8]>
     <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.ie.css" />
  <![endif]-->
  <script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>


  <!-- external links to phonegap-->
  <script src="phonegap.js"></script>

  <!-- internal link to app.js-->
  <script src="app.js"></script>

  <style>
    body { margin:0; padding:0; }
    #map { position:absolute; top:0; left:0; width:100%; height:100%; }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

</head>

