<?php
include 'xmlDelete.php';
//echo "Post[ ]= ";var_dump($_POST);
echo "\n<br />\n\n<br />\n";
//xmlDelete(  $fileName,  $lookFor, $debug=false)
//xmlDelete("test.xml",$_POST["uid"],true);
$fn="properties.xml";
$dom = simplexml_load_file($fn);
$t;
$count=0;
$spot=0;
foreach ($dom->property as $p)
{
	if(strcmp($p->attributes()->uid, $_POST["uid"])==0)
	{
		$t=$p->title;
		//echo" t= ".$t;
		//echo "<br />\n";
		$spot=$count;
	}
	$count++;
}

if(xmlDelete($fn, $_POST["uid"]))
{
	echo "\n<br>\n ".$t." has been removed form the list";
}
else
{
	echo "\n<br>\n "."Noting was found at spot number ".$_POST["uid"]."<br />\n Maybe you already deleted it.";
}
//TODO: delete pictures too
	$counter=1;
	foreach ($dom->property[$spot]->pictures->children() as $pic) 
	{
		$picString="Picture ".$counter.": ";
		//Todo: display images better
		// resize or slideshow??
		//echo $picString."\n<br>\n";
		//echo '<img src="'.$pic.'"  height="250" />';
		//$src='img/'.$uid.'picture'.$counter.'.jpg';
		//echo '<img src ="'.$src.'" height="250" />';
		//echo "<br />\n";
		unlink($pic);
		$counter++;
	}
	
	$counter=1;
	foreach ($dom->property[$spot]->floorPlans->children() as $fp)
	{
		//$fpString="Floor Plan ".$counter.": ";
		//Todo: display images better
		// resize or slideshow??
		//echo $fpString."\n<br>\n";
		//echo '<img src="'.$fp.'"  height="250" />';
		//$src='img/'.$uid.'FlPl'.$counter.'.jpg';
		//echo '<img src="'.$src.'" height="250" />';
		//echo "<br />\n";
		unlink($fp);
		$counter++;
	}


?>