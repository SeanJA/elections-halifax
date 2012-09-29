<?php include 'templates/header.php'; ?>
		<div role="main" class="row">
			<div class="four columns">
				<h4>
					Enter your postal code
				</h4>
				<input type="text" value="b3h 1s3" name="postal-code" id="postal-code" />
				<a id="find-it" class="large button">Find It!</a>
				<div class="hide-for-small twitter-timeline">
					<a class="twitter-timeline" href="https://twitter.com/search?q=%23votehrm" data-widget-id="246648916957859840">
					 	Vote HRM Tweets
					</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
			<div class="eight columns">
				<div id="map-canvas" class="map"></div>
				<div id="district-data">
					<div class="panel">
						<h5>Hello</h5>
						<p>
							If you were to click/tap on a district on the map or use the "Find It!" button, this box would be filled with useful information about the district.
						</p>
					</div>
				</div>
			</div>
		</div>
<?php include 'templates/footer.php';