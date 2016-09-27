<?php
include_once 'xmlDelete.php';
/**
*
* joins two xml files
* @param string $parent Parent file name (child is added onto this one)
* @param string $child  Child file name (infomation to be added to parent)
* @param string $tag	 where to add the child info onto parent
* @return string
*/
function joinXML($parent, $child, $tag = null)
{
	$DOMChild = new DOMDocument;
	$DOMChild->loadXML($child);
	$node = $DOMChild->documentElement;

	$DOMParent = new DOMDocument;
	$DOMParent->formatOutput = true;
	$DOMParent->loadXML($parent);
	//var_dump($node);
	$node = $DOMParent->importNode($node, true);

	if ($tag !== null) {
		$tag = $DOMParent->getElementsByTagName($tag)->item(0);
		$tag->appendChild($node);
	} else {
		$DOMParent->documentElement->appendChild($node);
	}

	return $DOMParent->saveXML();
}  
  	function createElement($domObj, $tag_name, $value = NULL, $attributes = NULL)
    {
    	$element = ($value != NULL ) ? $domObj->createElement($tag_name, $value) : $domObj->createElement($tag_name);
    
    	if( $attributes != NULL )
    	{
    		foreach ($attributes as $attr=>$val)
    		{
    			$element->setAttribute($attr, $val);
    		}
    	}
    
    	return $element;
    	/*
    	 	$dom = new DOMDocument('1.0', 'utf-8');
			
			$elm = createElement($dom, 'foo', 'bar', array('attr_name'=>'attr_value'));
			
			$dom->appendChild($elm);
			
			echo $dom->saveXML();
			
			outputs : 
			<?xml version="1.0" encoding="utf-8"?>
			<foo attr_name="attr_value">bar</foo>
    	 */
    }
?>
<?php
$filename="properties.xml";
// create doctype
$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

// create root element
$root = createElement($dom, "property" , null , array('type'=>$_POST["type"] , "uid"=>$_POST["uid"]));
$dom->appendChild($root);

// create child element
$item = createElement($dom, "title", (string)$_POST['title']);//$dom->createElement("item");
$root->appendChild($item);
$address = createElement($dom, "address");

//items to be added under address
$item=array();
$i=0;
$root->appendChild($address);
$item[$i++]   = createElement($dom,"street", (string)$_POST['street']);
$item[$i++] = createElement($dom,"city",   (string)$_POST['city']);
$item[$i++] = createElement($dom,"state",  (string)$_POST['state']);
$item[$i++] = createElement($dom,"zip",    (string)$_POST['zip']);
foreach ($item as $v)
{
	
	$address->appendChild($v);
}

//$dom->save("temp.xml");
//Lease
$lease = $dom->createElement("lease");
$root->appendChild($lease);
$perMonth = $dom->createElement("perMonth",(string)$_POST['perMonth']);
$perSqFt = $dom->createElement("perSqFt", (string)$_POST['perSqFt']);
$lease->appendChild($perMonth);
$lease->appendChild($perSqFt);

//Features
$f = $dom->createElement("features");
$item=null;
//$f=0;
for($i=0;$i<10;$i++)
{
	if(isset($_POST["feature".$i]))
	{
		$item=$dom->createElement("f",$_POST["feature".$i]);
		$f->appendChild($item);	
	}
}
$root->appendChild($f);
//Pictures
$uid=$_POST['uid'];
$picture=$dom->createElement("pictures");
//moves pictures from temporary directory
for ($i=1; $i<=10; $i++)
{
	$oldName='images/temp/pic'.$i.".jpg";
	if(file_exists($oldName))
	{
			
		$newName='images/'.$uid."picture".$i.".jpg";
		copy($oldName, $newName);
		$item=null;
		$item=$dom->createElement("picture",$newName);
		$picture->appendChild($item);
	}
	elseif(file_exists("images/".$uid."picture".$i.".jpg"))
	{
		$item=null;
		$item=$dom->createElement("picture","images/".$uid."picture".$i.".jpg");
		$picture->appendChild($item);
	}
}
$root->appendChild($picture);

//Floorplan
$floorplan=$dom->createElement("floorPlans");
for ($i = 1; $i <=3; $i++)//Maxes out at 3 right?
{
	$oldName='images/temp/FlPl'.$i.".jpg";
	if(file_exists($oldName))
	{
	
		$newName='images/'.$uid.'FlPl'.$i.".jpg";
		copy($oldName, $newName);
		$item=null;
		$item=$dom->createElement("fp",$newName);
		$floorplan->appendChild($item);
	}
	elseif(file_exists("images/".$uid."FlPl".$i.".jpg"))
	{
		$item=null;
		$item=$dom->createElement("fp","images/".$uid."FlPl".$i.".jpg");
		//test the imgs
		//echo('<a href="images/'.$uid.'FlPl'.$i.'.jpg">'.$i.'</a>');
		$floorplan->appendChild($item);	
		
	}
}
$root->appendChild($floorplan);
$dom->save("temp.xml");

?>

<?php //var_dump($_POST,$_FILES);
$original = new DOMDocument();
$original->load("properties.xml");
$current=$original->getElementsByTagName('property');
?>

<?php

xmlDelete("properties.xml", $uid);
$doc = new DOMDocument('1.0');
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;
$doc->load("properties.xml");
$doc->loadXML(joinXML($doc->saveXML(), $dom->saveXML()) );
$doc->save("properties.xml");

?>

<h2>Your edit has been complete</h2>
It can be found <a href="getInfo.php?uid=<?php echo $uid; ?>"> here</a>.