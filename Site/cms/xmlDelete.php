<?php
//a function that deletes an entry from an xml tree of $filename by looking for $lookFor (currently in properties->attributes()->uid
function xmlDelete(  $fileName,  $lookFor, $debug=false)
{
	$val=false;
	$filename=$fileName;
	if(file_exists($filename))
	{
		$lookFor =$lookFor;//"Delete";
		$dom = simplexml_load_file($filename);
		if($debug)
		{
			echo "Before: \n<br />\n";
			print $dom->asXml();
		}
		foreach($dom->property as $p)
		{
			//Todo: change to an xpath so that it can be passed as a param
			$uid=$p->attributes()->uid;
			if($debug)
			{
				//echo $p['type']."  ";
				echo "uID = ".$uid;
				echo "\n<br />\n";
			}
			
			if( strcmp ($uid , $lookFor)==0 )	
			{
				if($debug)
				{
					echo("<br /> Found $lookFor ! <br /> \n");	
				}
				$doc=dom_import_simplexml($p);
			  	$doc->parentNode->removeChild($doc);
			  	$val=true;
			}

			
		}
		if($debug)
		{
			echo "\n <br /> \n After: \n<br />\n";
			print $dom->asXml();
		}
	}
	else 
	{
		echo("Failed to open $filename");
	}
	//write to file
	if($val)
	{
		$dom->asXml($filename);
	}
	return $val;//true if work else false
}

/*
echo "<br /> \nFind it? <br /> \n";
if(xmlDelete("properties.xml", "Delete",TRUE))
{
	echo "<br /> \nYup";
}
else 
{
	echo "<br /> \nNope";
}
*/


?>