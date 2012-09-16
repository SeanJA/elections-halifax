<?php
$candidates = array(
	'district_1'=>array(
		array(
			'name'=>'Barry Dalrymple'
		),
		array(
			'name'=>'Steve Streatch'
		),
	),
	'district_2'=>array(
		array(
			'name'=>'Laurie Cook'
		),
		array(
			'name'=>'Will Gilligan'
		),
		array(
			'name'=>'Dave Hendsbee'
		),
		array(
			'name'=>'Gail McQuarrie',
		),
		array(
			'name'=>'Jason Josey',
		),
		array(
			'name'=>'Keith Leahy',
		)
	),
	'district_3'=>array(
		array(
			'name'=>'Jackie Barkhouse'
		),
		array(
			'name'=>'Bill Karsten'
		),
		array(
			'name'=>'Jim MacDonald'
		),
	),
	'district_4'=>array(
		array(
			'name'=>'Angela Jones'
		),
		array(
			'name'=>'Lorelei Nicoll'
		),
		array(
			'name'=>'Barry A. Smith'
		),
	),
	'district_5'=>array(
		array(
			'name'=>'Sam Austin'
		),
		array(
			'name'=>'Ken Bowman'
		),
		array(
			'name'=>'Sonya Dudka'
		),
		array(
			'name'=>'Bryn Jones-Vaillancourt'
		),
		array(
			'name'=>'Gloria McCluskey'
		),
		array(
			'name'=>'Kate Watson'
		),
		array(
			'name'=>'Bill Zebedee'
		),
	),
	'district_6'=>array(
		array(
			'name'=>'Darren Fisher'
		),
		array(
			'name'=>'Jerry Pye'
		),
	),
	'district_7'=>array(
		array(
			'name'=>'Mike MacDonell'
		),
		array(
			'name'=>'Dawgfather PHD'
		),
		array(
			'name'=>'Waye Mason'
		),
		array(
			'name'=>'Gerry Walsh'
		),
		array(
			'name'=>'Sue Uteck'
		),
	),
	'district_8'=>array(
		array(
			'name'=>'Karen Dempsey'
		),
		array(
			'name'=>'Doug MacDonald'
		),
		array(
			'name'=>'James McKay'
		),
		array(
			'name'=>'Dawn Marie Sloane'
		),
		array(
			'name'=>'Jennifer Watts'
		),
	),
	'district_9'=>array(
		array(
			'name'=>'Giovanni (John) Abati'
		),
		array(
			'name'=>'Richard MacLean'
		),
		array(
			'name'=>'Linda Mosher'
		),
		array(
			'name'=>'John Wimberly'
		),
	),
	'district_10'=>array(
		array(
			'name'=>'Kurt Bulger'
		),
		array(
			'name'=>'John Thibeau'
		),
		array(
			'name'=>'Russell Walker'
		),
	),
	'district_11'=>array(
		array(
			'name'=>'Steve Adams'
		),
		array(
			'name'=>'Peter Grabosky'
		),
		array(
			'name'=>'Jim Hoskins'
		),
		array(
			'name'=>'Tom Lavers'
		),
	),
	'district_12'=>array(
		array(
			'name'=>'P. Rano Khokhar'
		),
		array(
			'name'=>'Reg Rankin'
		),
		array(
			'name'=>'Bruce E. Smith'
		),
		array(
			'name'=>'Mary Wile'
		),
	),
	'district_13'=>array(
		array(
			'name'=>'Peter Lund'
		),
		array(
			'name'=>', Doug Poulton'
		),
		array(
			'name'=>', Matt Whitman'
		),
	),
	'district_14'=>array(
		array(
			'name'=>'Brad (BJ) Johns'
		),
		array(
			'name'=>', Laurie Sauers'
		),
	),
	'district_15'=>array(
		array(
			'name'=>'Steve Craig'
		),
		array(
			'name'=>', Janet Langille'
		),
		array(
			'name'=>', Stephen Taylor'
		),
		array(
			'name'=>', Curt Wentzell'
		),
		array(
			'name'=>', Ian Wilson'
		),
	),
	'district_16'=>array(
		array(
			'name'=>'Tim Outhit'
		),
		array(
			'name'=>', Mark Ward'
		),
	),
);


$fh = fopen('districts_kml.csv', 'r');

$first = true;

while($row = fgetcsv($fh)){
	if($first){
		$first = false;
		continue;
	}
	list($name,$geometry,$colours,$eligible_voters,$district_number) = $row;
	$key = strtolower(str_replace(' ','_',trim($district_number)));

	$data[$key] = array(
		'name' => trim($name),
		'voters' => trim($eligible_voters),
		'district'=>trim($district_number),
		'candidates'=>$candidates[$key],
	);
}

echo json_encode($geo);