<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" prefix="og: http://ogp.me/ns#">
	<!--<![endif]-->
	<?php require 'settings.php'; ?>
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
		<?php if (stristr($_SERVER['HTTP_USER_AGENT'], 'Twitterbot')): ?>
			<meta name="twitter:card" content="<?php echo $meta['twitter-card-type']; ?>" >
			<meta name="twitter:url" content="<?php echo $meta['url']; ?>" >
			<meta name="twitter:creator" content="<?php echo $meta['twitter-author']; ?>" >
			<meta name="twitter:title" content="<?php echo $meta['title']; ?>" >
			<meta name="twitter:description" content="<?php echo $meta['descirption']; ?>" >
			<meta name="twitter:image" content="<?php echo $meta['image']; ?>" >
		<?php endif; ?>
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
		<title>
			<?php echo isset($title)? $title : 'HRM - Find Your District'; ?>
		</title><!-- Included CSS Files -->
		<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="stylesheets/app.css?<?php echo filemtime('stylesheets/app.css'); ?>" type="text/css">
		<style>
			<?php $bg = rand(1,5); ?>
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
						background-color: rgba(255, 255, 255, 0.6);
					    border-color: #fff;
					    color: #000;
					}
				<?php endif; ?>
				<?php if(in_array($bg, array(4,5))): ?>
					header{
						background-color: rgba(0, 0, 0, 0.8);
						color: #fff;
					}
					header h4{
						padding: 5px;
					}
					.panel{
							background-color: rgba(0, 0, 0, 0.8);
					}
				<?php endif; ?>
			}
		</style>
		<script src="javascripts/foundation/modernizr.foundation.js?<?php echo filemtime('javascripts/foundation/modernizr.foundation.js'); ?>"></script>
		<!-- IE Fix for HTML5 Tags -->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<a class="hide-for-small" href="https://github.com/SeanJA/elections-halifax"><img id="fork-me" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
		<div class="row">
			<div class="twelve columns">
				<ul class="nav-bar">
					<li>
						<a href="index#header">Home</a>
					</li>
					<li>
						<a href="mayoral#header">Mayoral Candidates</a>
					</li>
					<li>
						<a href="news#header">News</a>
					</li>
				</ul>
			</div>
		</div>
		<header class="row" id="header">
			<div class="twelve columns">
				<h2 class="fancy">
					<?php echo isset($title)? $title : 'HRM - Find Your District'; ?>
				</h2>
				<p>
					<?php echo isset($subtitle)? $subtitle : 'Your district may have changed, find your new one.'; ?>
				</p>
				<hr />
			</div>

		</header>

		<div class="row hide-for-small">
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
						<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Felection.seanja.com&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35&amp;ref=top" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:175px; height:35px;" allowTransparency="true"></iframe>
					</li>
				</ul>
			</div>
		</div>