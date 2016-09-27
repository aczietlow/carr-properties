<?php
//$filename="../properties.xml";// moved up one lvl

$dom = simplexml_load_file($filename);

//var_dump($dom);
$uid=$_REQUEST["uid"];

$spot=0;
foreach ($dom as $p)
{
	//echo $spot."<br />\n";
	$temp=$p->attributes()->uid;
	if($temp==$uid)
	{
			
			echo "Title of listing: ".$dom->property[$spot]->title."<br />\n";
			echo "Type of Property: ".$dom->property[$spot]->attributes()->type."<br />\n";
			echo "Address<br />\n";
			echo $dom->property[$spot]->address->street."<br />\n";
			echo $dom->property[$spot]->address->city."<br />\n";
			echo $dom->property[$spot]->address->state."<br />\n";
			
		$counter=1;
		foreach($dom->property[$spot]->features->children() as $f)
		{
			
			$fString="Feature ".$counter.": ";
			echo (string)$fString.(string)$f."<br />\n";
			$counter++;
		}
		$uid=$dom->property[$spot]->attributes()->uid;
		$counter=1;
		
		foreach ($dom->property[$spot]->pictures->children() as $pic) 
		{
			$picString="Picture ".$counter.": ";
			//Todo: display images better
			// resize or slideshow??
			echo $picString."\n<br>\n";
			echo '<img src="'.$pic.'"  height="250" />';
			//$src='img/'.$uid.'picture'.$counter.'.jpg';
			//echo '<img src ="'.$src.'" height="250" />';
			echo "<br />\n";
			$counter++;
		}
		
		$counter=1;
		foreach ($dom->property[$spot]->floorPlans->children() as $fp)
		{
			$fpString="Floor Plan ".$counter.": ";
			//Todo: display images better
			// resize or slideshow??
			echo $fpString."\n<br>\n";
			echo '<img src="'.$fp.'"  height="250" />';
			//$src='img/'.$uid.'FlPl'.$counter.'.jpg';
			//echo '<img src="'.$src.'" height="250" />';
			echo "<br />\n";
			$counter++;
		}
		
		break;
	}
$spot++;
}
?>
</html>