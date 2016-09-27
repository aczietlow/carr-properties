<?php
/* 
TODO: Add Validatin for Features#
TODO: auto show and fill in Feature# info
TODO: Add validation for Pictures
TODO: auto show and fill in Picture# info
*/

//var_dump($_POST["Submit"]);
//var_dump($_SERVER);
 
//Html form that outputs info for a new proporty
//sends to propertyPreview
//include the main validation script
require_once "formvalidator.php";
function deleteMe($dir) 
{
	$time=date("m/d/y",time());
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
					error_log("".$time."  Deleted".$dir."/".$object." \n",3,"deleteLog.txt");
					unlink($dir."/".$object);
				}
			}
		}
		reset($objects);
		//rmdir($dir);
	}	
}
//deleteMe("image/temp");//cleans out "image/temp" dir
$show_form=true;

if(isset($_POST['Submit'])&&strcasecmp($_POST['Submit'], 'back')!=0)
{// The form is submitted

    	 $show_form=false;
        //Validation success. 
        //Here we can proceed with processing the form 
        //(like sending email, saving to Database etc)
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
		for ($i=1;$i<4;$i++)
		{
			if(!isset($_FILES['floorPlan'.$i]))// then no file is trying to be uploaded
			{
				//$imgUpload->image="images/flPl".$i.".jpg";
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
			//add hiddent information so that it can be passed to the create function
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
			<input type="hidden" name="uid" value="<?php print $_POST["uid"]; ?>" />
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
			</form>
			<?php
		}//if ($_POST['action'] == 'add')//redundent??
    
	
	//else*/
}//if(isset($_POST['Submit']))

if(true == $show_form)//Go here first
{
?>
<head>
<title> Input Property Details </title>
<script type="text/javascript">

function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789,.").indexOf(keychar) > -1))
   return true;

// decimal point jump

else
   return false;
}


function checkMe()
{

//Enable submit once all fields are full.
var dispM1 = false;
var dispM2 = false;
var message = "Please enter a valid value for";
var message2 = "Please provide at least one";

street = document.getElementById("street").value;
type = document.getElementById("type");
type2 = type.options[type.selectedIndex].value;
city = document.getElementById("city").value;
zip = document.getElementById("zip").value;
title = document.getElementById("title").value;
feature = document.getElementById("feature11").value;
floorPlan = document.getElementById("floorPlan11").value;
picture = document.getElementById("picture11").value;

if(street==""||type=="select"||city==""||zip==""||title==""||feature==""||floorPlan==""||picture=="")
{
	if(street=="")
		{message=message+" Street Address;"; dispM1 = true;}	
	if(type2=="select")
		{message = message+" Building Type;"; dispM1 = true;}
	if(city=="")
		{message = message+" City;"; dispM1 = true;}
	if(zip=="")
		{message = message+" Zip Code;"; dispM1 = true;}
	if(title=="")
		{message = message+" Title;"; dispM1 = true;}	
	
	if(feature=="")
		{message2 = message2+" Feature;"; dispM2=true;}	
	if(floorPlan=="")
		{message2 = message2+" Floor Plan;"; dispM2=true;}	
	if(picture=="")
		{message2 = message2+" Picture;"; dispM2=true;}	
		
	if(dispM1==true) {alert(message);}
	if(dispM2==true) {alert(message2);}
	dispM1 = false;
	dispM2 = false;
	return false; 
}
else
	{return true;}
	
}
/*
 * initialization of variables
 */ 
var fCounter = 1; //counter that is used for unique name sceme as features are added and removed
var fLimit = 10; // limit of features that system will accept

function addFeature(){ //add more feature input in the new property listing form

    if (fCounter == fLimit)  { //generates an alert if max number of allotted features is reached
          alert("You have reached the limit of adding " + fCounter + " features");
     }
    
     else {//
          var newdiv = document.createElement('div');
          newdiv.setAttribute('id','feature'+ (fCounter + 1));
          newdiv.innerHTML = "Feature " + (fCounter + 1) + "<br><input type='text' name='feature"+ (fCounter+1) + "'><input type='button' value='+' onClick='addFeature()'> <input type='button' value='-' onClick='removeFeature()'>";
          document.getElementById("features").appendChild(newdiv);
          document.getElementById("featuresNumb").innerHTML=' <input type="hidden" name ="featuresNumb" value="'+(fCounter+1)+'" />';
          fCounter++;
     }
}

function removeFeature(){//removes feature inputs in the new property listing form & adjust the couter
	
	var child = document.getElementById("feature" + fCounter);

	document.getElementById("features").removeChild(child);
	document.getElementById("featuresNumb").innerHTML=' <input type="hidden" name ="featuresNumb" value="'+(fCounter-1)+'" />';
	fCounter --;
}

/*
 * adds and removes picture forms from now property listing form
 */

var pCounter = 1;
var pLimit=10;

function addPicture(){ //add more picture input in the new property listing form

    if (pCounter == pLimit)  { //generates an alert if max number of allotted pictures is reached
          alert("You have reached the limit of adding " + pCounter + " pictures");
     }
    
     else {
          var newdiv = document.createElement('div');
          newdiv.setAttribute('id','picture'+ (pCounter + 1));
          newdiv.innerHTML = "Picture  " + (pCounter + 1) + "<br /><input type='file' value='Select JPEG image file' name='picture"+ (pCounter+1) + "'><input type='button' value='+' onClick='addPicture()'> <input type='button' value='-' onClick='removePicture()'>";
          document.getElementById("pictures").appendChild(newdiv);
          pCounter++;
     }
}

function removePicture(){//removes picture inputs in the new property listing form & adjust the couter
	
	var child = document.getElementById("picture" + pCounter);

	document.getElementById("pictures").removeChild(child);
	pCounter --;
}

/*
 * add or remove more floorplan inputs
 */

var flPlCounter = 1;
var flPlLimit=3;

function addFloorPlan(){ //add more floor plan pictures input in the new property listing form

    if (flPlCounter == flPlLimit)  { //generates an alert if max number of allotted floor plan pictures is reached
          alert("You have reached the limit of adding " + flPlCounter + " floor plan pictures");
     }
    
     else {
          var newdiv = document.createElement('div');
          newdiv.setAttribute('id','floorPlan'+ (flPlCounter + 1));
          newdiv.innerHTML = "Floor Plan Pictures  " + (flPlCounter + 1) + "<br /><input type='file' value='Select JPEG image file' name='floorPlan"+ (flPlCounter+1) + "'><input type='button' value='+' onClick='addFloorPlan()'> <input type='button' value='-' onClick='removeFloorPlan()'>";
          document.getElementById("floorPlans").appendChild(newdiv);
          flPlCounter++;
     }
}

function removeFloorPlan(){//removes floor plan pictures inputs in the new property listing form & adjust the couter
	
	var child = document.getElementById("floorPlan" + flPlCounter);

	document.getElementById("floorPlans").removeChild(child);
	flPlCounter --;
}


</script>
</head>
<?php deleteMe("images/temp");?>
<h1> List a new property</h1>
<!-- formt to get all the property's attribute information from the authenicated users. 
	sends information via post method
 -->
 <form name="inputProperty" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" onsubmit="return checkMe()">
<!--
<form name="inputProperty" enctype="multipart/form-data" action="propertyPreview.php" method="post">
-->
<p>
Title<br /><input id="title" type="text" name="title"  value="<?php
if(isset($_POST["title"])){
	 echo $_POST["title"];
}?>"/><br /><br />
Type

<select id="type" name="type">
<option value="select">Select One</option>
<option value="Commercial">Commercial</option>
<option value="Residential">Residential</option>
<option value="Out of Area">Out of Area</option>
</select>
</p>
<!-- <input type="text" name="type" value="Commercial" /><br /> -->
Street Address<br />
<input id="street" name="street" type="text" value="<?php
 if(isset($_POST["street"]))
	echo ($_POST["street"]);
 ?>"/>
<br />
City<br /><input id="city" name="city" type="text" value="<?php
if (isset($_POST["city"])) {
	echo $_POST["city"];
}?>"/><br />
State<br />
<select id="state" name = "state"> 
<option value="SC"> SC </option>
<option value="GA"> GA </option>
<option value="SC"> NC </option>
</select><br />
<!--  State<br /><input type="text" name="state"  /><br /> -->
Zip Code<br /><input id="zip" name="zip" type="text" onKeyPress="return numbersonly(this, event)" value="<?php
if (isset($_POST["zip"])) {
	echo $_POST["zip"];
} ?>"/><br />

Price Per Month<br /><input id="perMonth" name="perMonth" type="text" onKeyPress="return numbersonly(this, event)" value="<?php
if(isset($_POST["perMonth"])){ 
echo $_POST["perMonth"];
} ?>"/><br />
Price Per Sq. Ft.<br /><input id="perSqFt"type="text" name="perSqFt" onKeyPress="return numbersonly(this, event)" value="<?php
if(isset($_POST["perSqFt"])){
	 echo $_POST["perSqFt"];
}?>"/><br />

<!-- variable textfields for features -->
<div id="features">
	<div id="feature1">
		Feature 1<br /><input id="feature11" type="text" name="feature1">
		<input type="button" value="+" onClick="addFeature()"><br />
	</div>
</div>

<!-- variable textfields for pictures -->
<div id="pictures">
	<div id="picture1">
	Picture<br /><input id="picture11" name="picture1" type="file" value="Select JPG image file:" ><input type="button" value="+" onClick="addPicture()"><br />
	</div>
</div>

<!-- variable textfields for floor plan pictures -->
<div id="floorPlans">
	<div id="floorPlan1">
	Floor Plan Pictures<br /><input id="floorPlan11" name="floorPlan1" type="file" value="Select JPG image file:"><input type="button" value="+" onClick="addFloorPlan()"><br />
	</div>
</div>
<input type="hidden" name="action" value="add" />
<input type="hidden" name ="Submit" value="true" />
<div id="featuresNumb">
	<input type="hidden" name ="featuresNumb" value="1" />
</div>
<div id="picturesNumber">
	<input type="hidden" name="picturesNumber" value="1" />
</div>
<div id="floorPlanNumb">
	<input type="hidden" name="floorPlanNumb" value="1" />
</div>
<input id="sButton" type="submit" name="Submit" value="Preview New Property" />

</form>
</div>
<?php 
}//if($show_form)
?>
</body>

</html>