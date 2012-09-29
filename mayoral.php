<?php 
$title = 'HRM - Mayoral Candidates';
$subtitle = 'A bit of info about them';
include 'templates/header.php'; ?>


<?php 

$mayors = array(
	'connors'=>array(
		'name'=>'Fred Connors',
		'image'=>'fred',
		'website'=>'http://fredconnorsforhrm.ca',
		'twitter'=>'fredforhrm',
		'facebook'=>'fredforhalifax',
		'email'=>'fred@fredconnorsforhrm.ca',
		'timeline'=>'249529366168616961',
	),
	'eisses'=>array(
		'name'=>'Aaron Eisses',
		'image'=>'aaron',
		'website'=>'http://aaroneisses.com/',
		'twitter'=>'aaron_eisses',
		'facebook'=>'',
		'email'=>'',
		'timeline'=>'250928851901878272',
	),
	'martin'=>array(
		'name'=>'Tom Martin',
		'image'=>'tom',
		'website'=>'http://ask4more.ca',
		'twitter'=>'tomaskformore',
		'facebook'=>'tommartinask4more',
		'email'=>'info@tommartinformayor.ca',
		'timeline'=>'249530144702726144',
	),
	'savage'=>array(
		'name'=>'Mike Savage',
		'image'=>'mike',
		'website'=>'http://mikesavage.ca/',
		'twitter'=>'MikeSavageHRM',
		'facebook'=>'Ilikemikesavage',
		'email'=>'information@mikesavage.ca',
		'timeline'=>'249529939819380736',
	),
	'stan'=>array(
		'name'=>'Tuxedo Stan',
		'image'=>'stan',
		'website'=>'http://spaydaynovascotia.wordpress.com/',
		'twitter'=>'TuxedoStan',
		'facebook'=>'Tuxedo-Party/391884324181841',
		'email'=>'spaydaynovascotia@gmail.com?subject=Tuxedo%20Stan',
		'timeline'=>'249557822415704065',
	),
	'mccormack'=>array(
		'name'=>'Robert Wesley McCormack',
		'image'=>'robert',
		'website'=>'',
		'twitter'=>'McCormack4Mayor',
		'facebook'=>'266325656718395',
		'email'=>'',
		'timeline'=>'252084938248167424',
	),
	'mackie'=>array(
		'name'=>'Steven Mackie ',
		'image'=>'steve',
		'website'=>'',
		'twitter'=>'Mackie4Mayor',
		'facebook'=>'',
		'email'=>'',
		'timeline'=>'252087780266614784',
	),
);

//sort them by last name (which is the key) to be fair
ksort($mayors);

?>

<div role="main" class="row">
	<?php foreach($mayors as $m): ?>
		<div class="row">
			<div class="three columns">
				<img src="images/<?php echo $m['image']; ?>-head.png?1" alt="" />
			</div>
			<div class="one columns"></div>
			<div class="four columns">
				<div class="panel">
					<h3><?php echo $m['name']; ?></h3>
					<?php if($m['website']): ?>
						<a href="<?php echo $m['website']; ?>" target="_blank">
							<img src="images/<?php echo $m['image']; ?>.png?1" alt="" />
						</a>
					<?php endif; ?>
					<div>
						<?php if(!empty($m['website'])): ?>
							<a class="fc-webicon rss" href="<?php echo $m['website']; ?>" target="_blank"><?php echo $m['website']; ?></a>
						<?php endif; ?>
						<?php if(!empty($m['twitter'])): ?>
							<a class="fc-webicon twitter" href="http://twitter.com/<?php echo $m['twitter']; ?>" target="_blank">@<?php echo $m['twitter']; ?></a>
						<?php endif; ?>
						<?php if(!empty($m['facebook'])): ?>
							<a class="fc-webicon facebook" href="http://www.facebook.com/<?php echo $m['facebook']; ?>" target="_blank"><?php echo $m['facebook']; ?></a>
						<?php endif; ?>
						<?php if(!empty($m['email'])): ?>
							<a class="fc-webicon mail" target="_blank" href="mailto:<?php echo $m['email']; ?>"><?php echo $m['email']; ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="four columns twitter-timeline">
				<a class="twitter-timeline"  href="https://twitter.com/search?q=%40<?php echo $m['twitter']; ?>" data-widget-id="<?php echo $m['timeline']; ?>" data-related="<?php echo $m['twitter']; ?>,seanja">Tweets about "@<?php echo $m['twitter']; ?>"</a>
			</div>
		</div>
		<div class="row">
			<hr />
		</div>
	<?php endforeach; ?>
</div>
<?php include 'templates/footer.php';