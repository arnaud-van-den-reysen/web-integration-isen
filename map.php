
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Aled</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css" rel="stylesheet" />
<style>
	body { margin: 0; padding: 0; }
	#map { position: absolute; top: 15%; bottom: 0; right:0%; left:15%; width: 70%; height: 70%; }
	#adresse {display:none;}

</style>
</head>
<body>


<div id="map"></div>
<input type="text" id="pinpoint" value="<?php echo $_SESSION['adresse']; ?>"></input>
<script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiY2hyaWNocnkiLCJhIjoiY2thenV1bG1hMDF2cDJ5bWVwZjFodGw3aiJ9.bPZ_CejlYFFE8X8gJYDvrg';

var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
mapboxClient.geocoding
.forwardGeocode({
query: document.getElementById('pinpoint').value,
autocomplete: false,
limit: 1
})
.send()
.then(function(response) {
if (
response &&
response.body &&
response.body.features &&
response.body.features.length
) {
var feature = response.body.features[0];

var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: feature.center,
zoom: 10
});
new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
}
});
</script>

</body>
</html>
