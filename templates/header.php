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
					HRM - Find your new district
				</h2>
				<p>
					Your district may have changed, find your new one.
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
						<div class="fb-like" ref="top" data-href="http://election.seanja.com" data-send="true" data-layout="button_count" data-width="212" data-show-faces="false"></div>
					</li>
				</ul>
			</div>
		</div>