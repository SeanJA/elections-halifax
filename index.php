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
		<!-- og meta tags (linkedin, google plus, facebook) -->
		<meta property="og:title" content="<?php echo $meta['title']; ?>" />
		<meta property="og:description" content="<?php echo $meta['descirption']; ?>" />
		<meta property="og:image" content="<?php echo $meta['image']; ?>" />
		<meta property="og:type" content="<?php echo $meta['facebook-type']; ?>" />
		<meta property="og:url" content="<?php echo $meta['url']; ?>" />
		<meta property="og:site_name" content="<?php echo $meta['site-name']; ?>" />
		<!-- twitter has it's own meta tags... grumble grumble -->
		<meta name="twitter:card" content="<?php echo $meta['twitter-card-type']; ?>" >
		<meta name="twitter:url" content="<?php echo $meta['url']; ?>" >
		<meta name="twitter:creator" content="<?php echo $meta['twitter-author']; ?>" >
		<meta name="twitter:title" content="<?php echo $meta['title']; ?>" >
		<meta name="twitter:description" content="<?php echo $meta['descirption']; ?>" >
		<meta name="twitter:image" content="<?php echo $meta['image']; ?>" >

		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
		<title>
			HRM - Find Your District
		</title><!-- Included CSS Files -->
		<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
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
				<h2 class="fancy">
					Find your new district
				</h2>
				<p>
					Your district may have changed, find your new one.
				</p>
				<hr>
			</div>
		</header>
		<div class="row hide-for-small">
			<div class="eight columns centered">
				<ul class="link-list">
					<li>
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://election.seanja.com" data-hashtags="votehrm" data-dnt="true">Tweet</a>
					</li>
					<li>
						<script type="IN/Share" data-url="http://election.seanja.com" data-counter="right"></script>
					</li>
					<li>
						<div class="g-plus" data-action="share" data-annotation="bubble" data-height="15" data-href="http://election.seanja.com"></div>
					</li>
					<li>
						<div class="fb-like" ref="top" data-href="http://election.seanja.com" data-send="true" data-width="212" data-show-faces="false"></div>
					</li>
				</ul>
			</div>
		</div>
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
			<div class="eight columns centered">
				<hr />
			</div>
		</div>
		<div class="row">
			<div class="eight columns centered">
				<ul class="link-list">
					<li>
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://election.seanja.com" data-hashtags="votehrm" data-dnt="true">Tweet</a>
					</li>
					<li>
						<script type="IN/Share" data-url="http://election.seanja.com" data-counter="right"></script>
					</li>
					<li>
						<div class="g-plus" data-action="share" data-annotation="bubble" data-height="15" data-href="http://election.seanja.com"></div>
					</li>
					<li>
						<div class="fb-like" ref="bottom" data-href="http://election.seanja.com" data-send="true" data-width="212" data-show-faces="false"></div>
					</li>
				</ul>
			</div>
		</div>
		<footer class="row">
			<div class="ten columns">
				<p>
					Disclaimer: While I tried to get this stuff right, I makde no promise that I did (I am a private citizen and not a major news organization, I don't have access to the latest data all the time). If you see a problem (or you have some of the links that I missed...), or you want something else on here... <span class="hide-for-small inline" style="display: inline;">you can use the feedback link on the site ,</span> hit me up on <a target="_blank" href="http://twitter.com/SeanJA">@SeanJA</a>, or on app.net <a target="_blank" href="http://alpha.app.net">@SeanJA</a> I will see what I can do.
				</p>
				<p>
					Wanna see me elsewhere / see other things that I have done? <a target="_blank" href="http://seanja.info">Take a look over here.</a>
				</p>
			</div>
			<div class="two columns">
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
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		<script type="text/javascript">
		  var uvOptions = {};
		  (function() {
		    var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
		    uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/LEg0E80atR8y4piEgix37A.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
		  })();
		</script>
		<style>
			@media only screen and (max-width: 767px){
				#uvTabLabel{
					display: none !important;
				}
			}
			.inline {
				display: inline !important;
			}
		</style>
	</body>
</html>