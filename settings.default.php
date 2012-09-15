<?php

$sensor = 'true';
$api_key = '';
$google_analytics = '';
$polling_stations = file_get_contents('districts/polling-stations.json');
$districts = file_get_contents('districts/districts.json');