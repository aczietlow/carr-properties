<?php
$filename="../properties.xml";
$dom = simplexml_load_file($filename);
$templet='<ul id="properties2" class="flexdropdownmenu">'."\n";
$commercial='<li><a href="#"> Commercial </a> '."\n"."<ul>\n";
$residential='<li><a href="#"> Residential </a>'."\n"."<ul>\n";
$outOfArea='<li><a href="#"> Out of Area </a>'."\n"."<ul>\n";
foreach ($dom as $p)
{
	$title=$p->title;
	$type=(string)$p->attributes()->type;
	if (strcasecmp($type, "Commercial")==0) {
		$commercial=$commercial.'<li><a href="#">'.$title.'</a></li>'."\n";
	}elseif (strcasecmp($type, "Residential")==0) {
		$residential=$residential."\t".'<li><a href="#">'.$title.'</a></li>'."\n";
	}elseif (strcasecmp($type, "Out of Area")==0) {
		$outOfArea=$outOfArea.'<li><a href="#">'.$title.'</a></li>'."\n";
	}else 
	{
		echo "Error\n<br />\n";
		echo $type;
		echo "\n<br />\n";
	}
}
$commercial=$commercial."</ul>\n</li>\n";
$residential=$residential."</ul>\n</li>\n";
$outOfArea=$outOfArea."</ul>\n</li>\n";
$templet=$templet."\n".$commercial."\n".$residential."\n".$outOfArea."\n"."</ul>\n";
echo($templet);
?>