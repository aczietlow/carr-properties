
<?php
$debug=false;
//$sxml = simplexml_load_file('properties.xml');
$dom=simplexml_load_file('properties.xml');

$highId=0;
foreach ($dom->property as $property)
{
	foreach($property->attributes() as $key=>$val)
	{
		if(strcasecmp($key, "uid")==0)
		{	
			//echo "[is $val > $highId ".$w." ]  ";
			if((int)$val > (int)$highId)
			{
				//echo "$key=>$val";
				$highId=$val;
				if($debug)
				{
					echo"\t\tnew HIGH $highId";
				}
			}
				
		}
	}
	$numbOfProps = $numbOfProps + 001;
}
echo "highId=$highId";
echo '<a href="properties.xml"> Test</a>';

//var_dump($sxml->asXML());
//echo "</pre>";
//echo $sxml->asXML();





//echo $dom->saveXML();

?>
