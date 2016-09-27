<?php
include '/cms/menu/menu.php';
if (!file_exists("images/temp"))
{
	//creates the folder images for temp storage of image files
	mkdir("images/temp");
}
echo'
    	<head>
		<title> Property List Preview </title>
		</head>';
echo "<br />\n";
//include_once 'propertyPreview.php';
include "imgUpload.php";
$imgUpload = new imgUpload();
$picNumb=0;
$fpNumb=0;
echo " <h1>Property List Preview</h1> \n
			   <h5>Please review all information for correctness</h5>";
print ('Title of listing: '.$_POST['title'].'<br />'."\n");
print ('Type of Property: '.$_POST['type'].'<br />'."\n");
print ('Address<br />'."\n");
print ($_POST['street'].'<br />'."\n");
print ($_POST['city'].', '.$_POST['state'].' '.$_POST['zip'].'<br />'."\n");
print ('Price per month: '. $_POST['perMonth'].'<br />'."\n");
print ('Price per square foot: '. $_POST['perSqFt']. '<br /><br />'."\n");
print ('Features<br />'."\n");
for ($i=1;$i<11;$i++)
{
if (isset($_POST['feature'.$i]))
print ('Feature'.$i.': '. $_POST['feature'.$i].'<br />');
		}

		//$h determins height of imgs for Pictures and FloorPlans
		$h=356;
		
		print ('Pictures<br />'."\n");
		//todo: create diffent path for delete for Pictures
		//		pictures for delete will come form server not $_FILES
		for ($i=1;$i<11;$i++)
		{
			if(!isset($_FILES['picture'.$i]))// then no file is trying to be uploaded
			{
				//$imgUpload->image="images/pic".$i.".jpg";
			}
			else if ($_FILES['picture'.$i] != NULL )
			{
				$pic=$_FILES['picture'.$i];
				if(empty($pic['name']))
				{
					$pChild=$dom->property[$spot]->pictures->children();
					$p=$pChild[1];
					echo'<img src="'.$pChild[$i-1].'"  height="'.$h.'" />';//must use $i-1 b/c the xml is 0 indexed
					echo"<br />\n<br />\n";
				}
				else
				{ 
					try
					{
						$imgUpload->upload($_FILES['picture'.$i],'pic'.$i);
						print ('<img src="'.$imgUpload->image.'"  height="'.$h.'" />'."\n<br>\n");
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
		}
		
		print ('<br />Floor Plan Pictures<br />'."\n");
		for ($i=1;$i<4;$i++)
		{
			if(!isset($_FILES['floorPlan'.$i]))// then no file is trying to be uploaded
			{
				//$imgUpload->image="images/flPl".$i.".jpg";
			}
			else if (isset($_FILES['floorPlan'.$i]))
			{
				$fPlan=$_FILES['floorPlan'.$i];
				if(empty($fPlan['name']))
				{
					$fpChild=$dom->property[$spot]->floorPlans->children();
					$fp=$fpChild[1];
					echo'<img src="'.$fpChild[$i-1].'"  height="'.$h.'" />';//must use $i-1 b/c the xml is 0 indexed
					echo"<br />\n<br />\n";
				}
				else
				{ 
					try
					{
						$imgUpload->upload($_FILES['floorPlan'.$i],'flPl'.$i);
						$fpNumb=$i;
						print ('<img src="'.$imgUpload->image.'"  height="'.$h.'" />'."\n<br>\n");
					}
					catch (Exception $e)
					{
						echo "<font color=RED>\n";
						echo 'Error: ' .$e->getMessage();
						echo "\n</font>\n";
					}
				}	
			}
		}
		
		//add hiddent information so that it can be passed to the create function
			?>
			<form enctype="multipart/form-data" action="edit3.php" method="post" >
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
			<input type="hidden" name="uid" value="<?php print $_POST["uid"]; ?>" />
			<?php 
			for ($i=0;$i<11;$i++)
			{
				if(isset($_POST['feature'.$i]))
				{
					print ('<input type="hidden" name="feature'.$i.'" value="'.$_POST['feature'.$i].'" />'."\n\n");
				}
			}		
			?>
			
			<input type="hidden" name="action" value="addConfirmed" />
			<input type="submit" value="Add Property" />
			</form>
			<?php 
			/* This is here to block what is below from printing
			<!--  
			<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >
			<input type="hidden" name ="Submit" value="null" />
			<input type="hidden" name="type" value="<?php print($_POST['type']); ?>" />
			<input type="hidden" name="street" value="<?php print($_POST['street']); ?>" />
			<input type="hidden" name="city" value="<?php print($_POST['city']); ?>" />
			<input type="hidden" name="state" value="<?php print($_POST['state']); ?>" />
			<input type="hidden" name="zip" value="<?php print($_POST['zip']); ?>" />
			<input type="hidden" name="title" value="<?php print($_POST['title']); ?>" />
			<input type="hidden" name="perMonth" value="<?php print($_POST['perMonth']); ?>" />
			<input type="hidden" name="perSqFt" value="<?php print($_POST['perSqFt']); ?>" />
			
			<?php 
			for ($i=0;$i<11;$i++)
			{
				if(isset($_POST['feature'.$i]))
				{
					print ('<input type="hidden" name="feature'.$i.'" value="'.$_POST['feature'.$i].'" />'."\n<br>\n");
				}
			}
			?>
			 
			<INPUT TYPE="Submit" name="Submit" value="back"> 
			</form>-->*/
			?>
