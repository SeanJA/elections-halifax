		<div class="row">
			<div class="eight columns centered">
				<hr />
			</div>
		</div>
		<div class="row">
			<div class="seven columns centered">
				<ul class="link-list no-margin">
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
						<div class="fb-like" ref="bottom" data-href="http://election.seanja.com" data-send="true" data-layout="button_count" data-width="212" data-show-faces="false"></div>
					</li>
				</ul>
			</div>
		</div>
		<footer class="row">
			<div class="ten columns panel">
				<p>
					Disclaimer: While I tried to get this stuff right, I makde no promise that I did (I am a private citizen and not a major news organization, I don't have access to the latest data all the time). If you see a problem (or you have some of the links that I missed...), or you want something else on here... <span class="hide-for-small inline" style="display: inline;">you can use the feedback link on the right side of the site,</span> hit me up on twitter <a target="_blank" href="http://twitter.com/SeanJA">@SeanJA</a>, on app.net <a target="_blank" href="http://alpha.app.net">@SeanJA</a>, create an issue in <a target="_blank" href="https://github.com/SeanJA/elections-halifax">github</a> or send me a support email at <a href="mailto:tickets@hrmelection.uservoice.com">tickets@hrmelection.uservoice.com</a>. I will see what I can do.
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
		<script src="javascripts/foundation/jquery.js?<?php echo filemtime('javascripts/foundation/jquery.js'); ?>"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=<?php echo $sensor; ?>&amp;key=<?php echo $api_key; ?>"></script>
		<script src="javascripts/foundation/app.min.js?<?php echo filemtime('javascripts/foundation/app.js'); ?>"></script>
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

		<?php $bg = rand(1,3); ?>

		<style>
			/* some final overrides for a fancy changing background */
			@media only screen and (min-width: 767px){
				body{
					background: url(images/bg<?php echo $bg; ?>.jpg) no-repeat center center fixed;
					<?php if($bg === 2): ?>
					color: #fff;
					<?php endif; ?>
				}
				<?php if($bg === 2): ?>
					.panel{
						background-color: #fff;
					    border-color: #fff;
					    color: #000;
					}
				<?php endif; ?>
			}
		</style>

	</body>
</html>