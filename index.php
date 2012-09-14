<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8"><!-- Set the viewport width to device width for mobile -->
		<meta name="viewport" content="width=device-width">
		<title>
			Welcome to Foundation
		</title><!-- Included CSS Files -->
		<link rel="stylesheet" href="stylesheets/app.css" type="text/css">
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script src="javascripts/foundation/modernizr.foundation.js" type="text/javascript"></script>
		<!-- IE Fix for HTML5 Tags -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		var geocoder;
		var map;
		function initialize() {
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(44.653024,-63.597107);
			var mapOptions = {
			  zoom: 8,
			  center: latlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
			var layer = new google.maps.FusionTablesLayer({
	          query: {
	            select: 'col2',
	            from: '1gaFfc1uY9wbu7M_W-WOol1zvXLO3mVOCIawbY78'
	          }
	        });
        	layer.setMap(map);
		}

		function codeAddress() {
			var address = document.getElementById('postal-code').value + ' Nova Scotia, Canada';
			geocoder.geocode( { 'address': address}, function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) {
			    map.setCenter(results[0].geometry.location);
			    var marker = new google.maps.Marker({
			        map: map,
			        position: results[0].geometry.location
			    });
			  } else {
			    alert('Geocode was not successful for the following reason: ' + status);
			  }
			});
		}
	</script>
	</head>
	<body onload="initialize();">
		<header class="row">
			<div class="twelve columns">
				<h2>
					Find your new district
				</h2>
				<p>
					Your district may have changed, find your new one.
				</p>
				<hr>
			</div>
		</header>
		<div role="main" class="row">
			<div class="four columns">
				<h4>
					Enter your postal code
				</h4>
				<input type="text" value="b3h 1s3" name="postal-code" id="postal-code" />
				<input type="button" value="Find It!" onclick="codeAddress()" />
			</div>
			<div class="eight columns">
				<div id="map_canvas" style="height:800px; width: 100%; top:30px"></div>
			</div>
		</div><!-- Included JS Files (Uncompressed) -->
		<footer class="row">
			<div class="twelve columns">
				<small>Data from OpenFile.ca</small>
			</div>
		</footer>
		<script src="javascripts/foundation/jquery.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.accordion.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.alerts.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.buttons.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.forms.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.mediaQueryToggle.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.navigation.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.orbit.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.reveal.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.tabs.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.foundation.tooltips.js" type="text/javascript"></script>
		<script src="javascripts/foundation/jquery.placeholder.js" type="text/javascript"></script><!-- Application Javascript, safe to override -->
		<script src="javascripts/foundation/app.js" type="text/javascript"></script>
		
	</body>
</html>