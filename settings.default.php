<?php

$sensor = 'true';
$api_key = '';
$google_analytics = '';
$polling_stations = file_get_contents('data/polling-stations.json');
$districts = file_get_contents('data/districts.json');
$meta = array();
$meta['descirption'] = 'The districts have changed in HRM, check here to see what your new district is and find your closest polling stations.';
$meta['image'] = 'http://election.seanja.com/images/screenshot.png';
$meta['title'] = 'HRM - Find Your District';
$meta['site-name'] = 'HRM - Find Your District';
$meta['twitter-author'] = '@SeanJA';
$meta['url'] = 'http://election.seanja.com';
$meta['facebook-type'] = 'activity';
$meta['twitter-card-type'] = 'summary';