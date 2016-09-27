<?php 
include 'imgUpload.php';
//var_dump($_POST);
/**
 * 
 * loops through $filename to look for $title
 * @param string $filename where to look
 * @param string $title what to look for
 * @return Boolean
 */
function check($filename, $title)
{
	
	$dom = simplexml_load_file($filename);
	foreach($dom->property as $p )
	{
		$t=$p->title;
		//echo "$t <br />\n\n";
		if(strcmp($t, $title)==0)
		{
			return FALSE;//already there
		}
	}
	return TRUE;		//cannot be found 
}
/**
 * 
 * creates a new property listing in the properties xml file
 * @param String $filename where to add
 * @param Boolean $debug show debug info
 */
function newListing($filename, $debug=false)  
{
	/*****************************************************************************************************************
	 * initialization of variables
	 ******************************************************************************************************************/ 
	$dom = simplexml_load_file($filename); //passes XML to an object 
	$numbOfProps = 0;						//the number of properties that exist prior to add a new property listing
	$newPropKey = 0;						//the key value of the new properties to be added
	$main=new imgUpload();					//creates an object to upload a new image
	
	/*****************************************************************************************************************
	 * finds the number of existing properties in xml file inorder to write new property after existing entries
	 * the var $dom is the XML as an object in PHP, as such the first occurance of a node in an XML with have a key
	 * value of 0, like an associative array;
	 * 
	 *  ex: property[0] is the first property in the xml
	 ******************************************************************************************************************/
	$numbOfProps=000;
	$highId=0;
	foreach ($dom->property as $property)
	{
		$numbOfProps=$numbOfProps+1;
		foreach($property->attributes() as $key=>$val)
		{
			if(strcasecmp($key, "uid")==0)
			{	
				if((int)$val > (int)$highId)
				{
					$highId=$val;
					if($debug)
					{
						echo"\t\tnew HIGH $highId";
					}
				}
					
			}
		}
	
	}
	if($debug)
		print ('number of properties: '.$numbOfProps. '<br />');
	$newPropKey = $numbOfProps;
	// need some way to make all the uid to be of the form ###: 001, 011, 111, etc (???)
	//this assumes the last property has the highest uid
	//$uid=$dom->property[$newPropKey-1]->attributes()->uid+1;
	$uid=$highId+1;//chaned this b/c of the edit feature
	if($debug)
		echo "uid = ".$uid;
	
	/*
	 * writes a new xml entry with all the attributes and values filled in from post
	*/
	$dom->addChild('property');
	$dom->property[$newPropKey]->addAttribute('type',$_POST['type']);
	$dom->property[$newPropKey]->addAttribute('uid',$uid);
	$dom->property[$newPropKey]->addChild( 'title' , $_POST['title']);
	$dom->property[$newPropKey]->addChild("address");
	$dom->property[$newPropKey]->address->addChild('street', $_POST['street']);
	$dom->property[$newPropKey]->address->addChild('city', $_POST['city']);
	$dom->property[$newPropKey]->address->addChild('state', $_POST['state']);
	$dom->property[$newPropKey]->address->addChild('zip', $_POST['zip']);
	$dom->property[$newPropKey]->addChild("lease");
	$dom->property[$newPropKey]->lease->addChild("perMonth", $_POST['perMonth']);
	$dom->property[$newPropKey]->lease->addChild("perSqFt", $_POST['perSqFt']);
	$dom->property[$newPropKey]->addChild("features");

	//add features to xml here
	for ($i=1; $i<=10; $i++)
	{
		if(isset($_POST['feature'.$i])/* != NULL)*/)
		{
			$dom->property[$newPropKey]->features->addChild("f", $_POST['feature'.$i]);
		}
	}
	
	$dom->property[$newPropKey]->addChild("pictures");
	
	/*
	 * todo: add arbiritary naming. Each Property needs to have unique name (01office3, 02office3, ... )
	 * use numbOfProps from above
	 */
	
	//add pictures
	//moves pictures from temporary directory 
	for ($i=1; $i<=10; $i++)
	{
		$oldName='images/temp/pic'.$i.".jpg";
		if(file_exists($oldName))
		{
			
			$newName='images/'.$uid."picture".$i.".jpg";
			//		 "img/1office1.jpg"
			//todo: pick either copy or rename
			copy($oldName, $newName);
			//rename($oldName, $newName); //causes problems when pressing back
			//echo "<br />\n"."<br />\n";
			//echo '<img src= "img/'.$uid.''.$_POST["type"].''.$i.'.jpg'.'" height="250" />';
			//echo '<img src= "'.$newName.'" height="250" />';
			$dom->property[$newPropKey]->pictures->addChild("picture",$newName);
		}	
	}	
	$dom->property[$newPropKey]->addChild("floorPlans");
	
	
	//add floor plan pictures
	for ($i=1; $i<=3; $i++)
	{
		$oldName='images/temp/FlPl'.$i.".jpg";
		if(file_exists($oldName))
		{
			
			$newName='images/'.$uid.'FlPl'.$i.".jpg";
			copy($oldName, $newName);
			$dom->property[$newPropKey]->floorPlans->addChild("fp", $newName);
		}	
	}

	//$dom->asXML("$filename");
	//echo $dom->asXML();
	save_to_xml($dom, $filename);
	return $uid;
}
function save_to_xml($simplexml, $filename, $link=false)
{
	$dom_sxe = dom_import_simplexml($simplexml);
	if (!$dom_sxe) 
	{
		echo 'Error while converting XML';
		exit;
	}
	$dom = new DOMDocument('1.0');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($simplexml->asXML());
	$dom->save($filename);
	if($link)
	{
		return '<a href="'.$filename.'"> Link</a>';
	}
}
function deleteMe($dir) 
{
	if (is_dir($dir))
	{
		$objects = scandir($dir);
		foreach ($objects as $object)
		{
			if ($object != "." && $object != "..") 
			{
				if (filetype($dir."/".$object) == "dir")
				{ 
					deleteMe($dir."/".$object);
				}
				else
				{ 
					//echo "deleted :".$dir."/".$object;
					unlink($dir."/".$object);
					
				}
			}
		}
		reset($objects);
		rmdir($dir);
	}	
}
?>


<br />
<br />
<?php 
//TODO: prevent user from adding the same thing multiple times
$fn="properties.xml";
$output;
$dom = simplexml_load_file($fn);
if(check($fn, $_POST["title"]))
{
	$output.= $_POST["title"]." has been added\n<br />\n";
	$uid=newListing($fn);
	$output.=('<a href="getInfo.php?uid='.$uid.'"> '.$_POST["title"].' can be found here</a>' );
	
}
else
{
	$output.= $_POST["title"]." was already on the list\n<br />\n";
	$count=0;
	$other=0;
	/*
	foreach ( $dom->property->title as $t)
	{
		if(strcasecmp($t, $_POST["title"])==0)
		{
			$other=$count;
		}
		$count++;
	}*/
	
	foreach($dom->property as $p )
	{
		$t=$p->title;
		if(strcmp($t, $_POST['title'])==0)
		{
			$other=$count;
		
		}
		$count++;
		//echo "$t \t "; echo $_POST["title"];
	}
	
	$output.='<a href="getInfo.php?uid='.$other.'" > It can be found here</a>';
}

//newListing("properties.xml", true);
deleteMe("/cms/images");
//clearstatcache(true);
//mkdir("images");

?>

