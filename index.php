<?php

include 'second.php';
 $arr1 = array();
 $arr2 =array();
for($w=0;$w<$t;$w++)
{
$mark2[$w] = $mark[$w];

$mark1[$w] = $mar[$w];
$arr1[$w] = $ar1[$w];
$arr2[$w] = $ar2[$w];

}
	 ?>
<html>
<head>
<title>How to Get Current Location using Google Map Javascript API</title>
</head>
<style>
body {
	font-family :Arial;
}
#map-layer {
	margin: 20px 0px;
	max-width: 600px;
	min-height: 400;
}
#btnAction {
	background: #3878c7;
    padding: 10px 40px;
    border: #3672bb 1px solid;
    border-radius: 2px;
    color: #FFF;
    font-size: 0.9em;
    cursor:pointer;
    display:block;
}
#btnAction:disabled {
    background: #6c99d2;
}
</style>
<body>
<h1>How to Get Current Location using Google Map Javascript API</h1>
	
		
		</script>

<div id="button-layer"><button id="btnAction" onClick="locate()">My Current Location</button></div>
	<div id="map-layer"></div>

	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvIh6JpjczoI2AOqxPhFkYbGmt6KKCHJA&callback=initMap"
		async defer></script>
	<script type="text/javascript">
	var map;
	function initMap() {
		var mapLayer = document.getElementById("map-layer");
		var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
		var defaultOptions = { center: centerCoordinates, zoom: 17 }
		map = new google.maps.Map(mapLayer, defaultOptions);
		
			var latit = <?php echo json_encode($arr1); ?>;
	var longi = <?php echo json_encode($arr2); ?>;
	var marki =<?php echo json_encode($mark1);?>;
	var marki2 =<?php echo json_encode($mark2);?>;
for(var i=0;i<4;i++)
{	var e = longi[i];
var n = latit[i];
var testtitle = marki[i] +":" + marki2[i];   

	var uluru = {lat: n, lng: e};
		var marker = new google.maps.Marker({position: uluru,title: testtitle, map: map});
}	
	
	
	}

	function locate(){
		document.getElementById("btnAction").disabled = true;
		document.getElementById("btnAction").innerHTML = "Processing...";
		if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(function(position){ 
				var currentLatitude = position.coords.latitude;
				var currentLongitude = position.coords.longitude;
				/*window.location.href = "second.php?name=" + currentLatitude;
				window.location.href = "second.php?name=" + currentLongitude;
*/


				var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
				var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
				var currentLocation = { lat: currentLatitude, lng: currentLongitude };
				infoWindow.setPosition(currentLocation);
				document.getElementById("btnAction").style.display = 'none';
			});
		 }
		 
		 }
		 	  
         
        

		
	
	
		</script>

		</body>
			
		</script>


</html>
