<?php

function is_in_polygon($vertices_x, $vertices_y, $longitude_x, $latitude_y){
  $points_polygon = count($vertices_x) - 1; // number vertices - zero-based array
  $i = $j = $c = 0;
  for ($i = 0, $j = $points_polygon ; $i < $points_polygon; $j = $i++) {
    if ( (($vertices_y[$i]  >  $latitude_y != ($vertices_y[$j] > $latitude_y)) && ($longitude_x < ($vertices_x[$j] - $vertices_x[$i]) * ($latitude_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]) ) ){
       $c = !$c;
    }
  }
  return $c;
}


function find_district($longitude_x, $latitude_y){
	$fh = fopen('data/districts_kml.csv', 'r');
	$first = true;
	while($row = fgetcsv($fh)){
		if($first){
			$first = false;
			continue;
		}
		$coords = strip_tags(trim($row[1]));
		$coords = explode(" ", $coords);
		foreach($coords as $c){
			$c = explode(',',$c);
			$vertices_x[] = $c[0];
			$vertices_y[] = $c[1];
		}
		if(is_in_polygon($vertices_x, $vertices_y, $longitude_x, $latitude_y)){
			fclose($fh);
			return strtolower(str_replace(' ','_',$row[4]));
		}
	}
	fclose($fh);
	return 'not found';
}

$lat = $_GET['lat'];
$long = $_GET['long'];


echo json_encode(find_district($long, $lat));