<?php

require 'functions.php';

$lat = $_GET['lat'];
$long = $_GET['long'];


echo json_encode(get_district($long, $lat));