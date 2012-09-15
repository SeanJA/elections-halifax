<?php require 'settings.php'; ?><!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8"><!-- Set the viewport width to device width for mobile -->
		<meta property="fb:admins" content="119100167" />

		<meta property="og:title" content="HRM - Find Your District" />
		<meta property="og:description" content="Your district may have changed, find your new one." />
		<meta property="og:image" content="images/screenshot.png" />
		<meta property="og:type" content="activity" />
		<meta property="og:url" content="http://election.seanja.com" />
		<meta property="og:site_name" content="HRM - Find Your District" />

		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
		<title>
			HRM - Find Your District
		</title><!-- Included CSS Files -->
		<link rel="stylesheet" href="stylesheets/app.css" type="text/css">
		<script src="javascripts/foundation/modernizr.foundation.js"></script>
		<!-- IE Fix for HTML5 Tags -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	</head>
	<body>
		<a class="hide-for-small" href="https://github.com/SeanJA/elections-halifax"><img id="fork-me" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
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
				<a id="find-it" class="large button">Find It!</a>
				<div class="hide-for-small">
					<a class="twitter-timeline" href="https://twitter.com/search?q=%23votehrm" data-widget-id="246648916957859840">
					 	Vote HRM Tweets
					</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
			<div class="eight columns">
				<div id="map-canvas" class="map"></div>
				<div id="district-data">
				</div>
			</div>
		</div>
		<div class="row">
			
		</div>
		<div class="row">
			<div class="eight columns centered">
				<hr />
			</div>
		</div>
		<div class="row">
			<div class="four columns centered">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e6d6dff33a5a83e"></script>
				<!-- AddThis Button END -->
			</div>
		</div>
		<footer class="row">
			<div class="two columns offset-by-ten">
				<ul>
					<li>
						<small>District data from <a target="_blank" href="http://www.openfile.ca/halifax/data/hrm-election-2012-district-profiles">OpenFile.ca</a></small>
					</li>
					<li>
						<small>Built By <a target="_blank" href="http://seanja.info">SeanJA</a></small>
					</li>
					<li>
						<small>Using <a target="_blank" href="http://foundation.zurb.com/">Foundation</a></small>
					</li>
					<li>
						<small>Code <a target="_blank" href="https://github.com/SeanJA/elections-halifax">github</a></small>
					</li>
				</ul>
			</div>
		</footer>
		<script>
			var polling_stations = <?php echo $polling_stations; ?>;
			var districts = <?php echo $districts; ?>;
		</script>
		<script src="javascripts/foundation/jquery.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=<?php echo $sensor; ?>&amp;key=<?php echo $api_key; ?>"></script>
		<script src="javascripts/foundation/jquery.foundation.accordion.js"></script>
		<script src="javascripts/foundation/jquery.foundation.alerts.js"></script>
		<script src="javascripts/foundation/jquery.foundation.buttons.js"></script>
		<script src="javascripts/foundation/jquery.foundation.forms.js"></script>
		<script src="javascripts/foundation/jquery.foundation.mediaQueryToggle.js"></script>
		<script src="javascripts/foundation/jquery.foundation.navigation.js"></script>
		<script src="javascripts/foundation/jquery.foundation.orbit.js"></script>
		<script src="javascripts/foundation/jquery.foundation.reveal.js"></script>
		<script src="javascripts/foundation/jquery.foundation.tabs.js"></script>
		<script src="javascripts/foundation/jquery.foundation.tooltips.js"></script>
		<script src="javascripts/foundation/jquery.placeholder.js"></script>
		<script src="javascripts/foundation/app.js"></script>
		<script>
            var _gaq=[['_setAccount','<?php echo $google_analytics; ?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
	</body>
</html>