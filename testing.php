<?php

require 'functions.php';
require 'settings.default.php';

$polling_stations = json_decode($polling_stations, true);

foreach($polling_stations as $district=>$stations){
	foreach($stations as $k=>$station){
		$found = get_district($station['long'], $station['lat']);
		if($found !== $district){
			echo 'error at ' . $k . ' got ' . $found . PHP_EOL;
			var_dump($station);
			echo PHP_EOL;
		}
	}
}

//http://localhost/elections-halifax/get-district.php?