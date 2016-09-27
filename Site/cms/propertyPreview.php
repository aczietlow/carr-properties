<?php 
//Previews the Property before Adding or Deleting it
//Add:inputProperty.php->here->createProperty.php
//Delete:deleteSelect->  here->removeProperty.php
?>


<?php 
//var_dump($_POST);
//print ('action: '.$_POST['action'].'<br />');
if(strcmp($_POST['action'] , "edit") == 0)
{
	
}
elseif (strcmp($_POST['action'] , "add") == 0)
{
	include "imgUpload.php";
	$imgUpload = new imgUpload();
	$picNumb=0;
	$fpNumb=0;
	echo " <h1>Property List Preview</h1> \n <h5>Please review all information for correctness</h5>";
	print ('Title of listing: '.$_POST['title'].'<br />'."\n");
	print ('Type of Property: '.$_POST['type'].'<br />'."\n");
	print ('Address<br />'."\n");
	print ($_POST['street'].'<br />'."\n");
	print ($_POST['city'].', '.$_POST['state'].' '.$_POST['zip'].'<br />'."\n");
	print ('Price per month: '. $_POST['ppm'].'<br />'."\n");
	print ('Price per square foot: '. $_POST['ppsf']. '<br /><br />'."\n");
	print ('Features<br />'."\n");
	for ($i=1;$i<11;$i++)
	{
		if (isset($_POST['feature'.$i]))
			print ('Feature'.$i.': '. $_POST['feature'.$i].'<br />');
	}
	
	print ('Pictures<br />'."\n");
	//todo: create diffent path for delete for Pictures
	//		pictures for delete will come form server not $_FILES
	for ($i=1;$i<11;$i++)
	{
		
			if(!isset($_FILES['picture'.$i]))// then no file is trying to be uploaded
			{
				$imgUpload->image="images/pic".$i.".jpg";
			}
			
			else if ($_FILES['picture'.$i] != NULL )
			{
				try 
				{
					$imgUpload->upload($_FILES['picture'.$i],'pic'.$i);
					print ('<img src="'.$imgUpload->image.'"  height="250" />'."\n<br>\n");
					$picNumb=$i;
				}
				catch (Exception $e)
				{
					echo "<font color=RED>\n";
					echo 'Error: ' .$e->getMessage();
					echo "\n</font>\n";
				}
			}
		
		
	}
	
	print ('<br />Floor Plan Pictures<br />'."\n");
	//todo: create diffent path for delete for Floor Plan
	//		pictures for delete will come form server not $_FILES
	for ($i=1;$i<4;$i++)
	{
		
			if(!isset($_FILES['floorPlan'.$i]))// then no file is trying to be uploaded
			{
				$imgUpload->image="images/flPl".$i.".jpg";
			}
			
			else if (isset($_FILES['floorPlan'.$i]))
			{
				try 
				{	
					$imgUpload->upload($_FILES['floorPlan'.$i],'flPl'.$i);
					$fpNumb=$i;			
					print ('<img src="'.$imgUpload->image.'"  height="250" />'."\n<br>\n");
				}
				catch (Exception $e)
				{
					echo "<font color=RED>\n";
					echo 'Error: ' .$e->getMessage();
					echo "\n</font>\n";
				}
				
			}
		
		
	}
	
	if ($_POST['action'] == 'add')//redundent??
	{
		
		?>
		<form enctype="multipart/form-data" action="createProperty.php" method="post" >
		<!-- <form  enctype="multipart/form-data" action="fileTest.php" method="post" > -->
		<input type="hidden" name="type" value="<?php print($_POST['type']); ?>" />
		<input type="hidden" name="street" value="<?php print($_POST['street']); ?>" />
		<input type="hidden" name="city" value="<?php print($_POST['city']); ?>" />
		<input type="hidden" name="state" value="<?php print($_POST['state']); ?>" />
		<input type="hidden" name="zip" value="<?php print($_POST['zip']); ?>" />
		<input type="hidden" name="title" value="<?php print($_POST['title']); ?>" />
		<input type="hidden" name="perMonth" value="<?php print($_POST['perMonth']); ?>" />
		<input type="hidden" name="perSqFt" value="<?php print($_POST['perSqFt']); ?>" />
		<input type="hidden" name="picNumb" value="<?php print $picNumb; ?>" />
		<input type="hidden" name="fpNumb" value="<?php print $fpNumb; ?>" />
		<input type="hidden" name="uid" value="<?php print $uid; ?>" />
		<?php 
		for ($i=0;$i<11;$i++)
		{
			if(isset($_POST['feature'.$i]))
			{
				print ('<input type="hidden" name="feature'.$i.'" value="'.$_POST['feature'.$i].'" />'."\n<br>\n");
			}
		}		
		?>
		<input type="hidden" name="action" value="addConfirmed" />
		
		<input type="submit" value="Add Property" />
		
		</form>
		<?php 
	}
}
elseif (strcmp($_POST['action'] , "delete") == 0)
{
	?>
<head>
<title>Property Preview</title>
</head>
<h1>Property List Preview</h1>
<h5>Please review all information for correctness</h5>
	<?php 
	//echo 'this is what is sent in $_POST["property"]   : '.($_POST["property"]);
	$filename=$_POST["filename"];
	$dom = simplexml_load_file($filename);
	//echo "<br /><br />";var_dump($dom);
	$spot;
	for($i=000;$i<count($dom);$i++)
	{
		//this is used to find the uid of a proporty at spot $i;
		//echo $dom->property[$i]->attributes()->uid;echo "<br /><br />";
		if($dom->property[$i]->attributes()->uid == $_POST["property"])
		{
			$spot=$i;
		}
	}
	//echo '$spot: ';var_dump($spot);
	//echo "value of stuff @ spot:\n <br />	";
	//var_dump($dom->property[$spot]);
	//echo "<br /><br />\n\n";
	//xml version
	//echo $dom->property[$spot]->asXml();
	echo "Title of listing: ".$dom->property[$spot]->title."<br />\n";
	echo "Type of Property: ".$dom->property[$spot]->attributes()->type."<br />\n";
	echo "Address<br />\n";
	echo $dom->property[$spot]->address->street."<br />\n";
	echo $dom->property[$spot]->address->city."<br />\n";
	echo $dom->property[$spot]->address->state."<br />\n";
	echo "Lease \n<br />\n";
	echo "Price per Month: ".$dom->property[$spot]->lease->perMonth."\n<br />\n";
	echo "Price per Sq Foot: ".$dom->property[$spot]->lease->perSqFt."\n<br />\n";
	$counter=1;
	foreach($dom->property[$spot]->features->children() as $f)
	{
		
		$fString="Feature ".$counter.": ";
		echo (string)$fString.(string)$f."<br />\n";
		$counter++;
	}
	$c=$dom->property[$spot]->attributes()->uid;
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
	?>
	<!--<form action="delTest.php" method="post">-->
	<form action="removeProperty.php" method="post">
	<input type="hidden" name="uid" value="<?php echo $dom->property[$spot]->attributes()->uid; ?>">
	<input type="hidden" name="action" value="delConfirmed" />
	<input type="submit" value="Remove Property" />
	</form>
	<?php 
}else 
{
	echo '<font size="70"> <font color="RED">.:</font>Error<font color="RED">:.</font></font>';
}
?>
