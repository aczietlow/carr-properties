<?php 
 
	$filename="properties.xml";
	//$filename="test.xml";
	$dom = simplexml_load_file($filename);
	$uid=$_REQUEST["uid"];
	$spot=-1;
	$i=0;
	foreach ($dom as $p)
	{
		$temp=$p->attributes()->uid;
		if($temp==$uid)
		{
			$spot=$i;
			break;
		}
		$i++;
	}
$child=$dom->property[$spot]->features->children();
$fCount=count($child);
$child=$dom->property[$spot]->pictures->children();
$pCount=count($child);
$child=$dom->property[$spot]->floorPlans->children();
$fpCount=count($child);
?>

 <head>

 <script type="text/javascript">
 /*
  * initialization of variables
 */
 var fCounter = <?php echo $fCount;?>; //counter that is used for unique name sceme as features are added and removed
 var fLimit = 10; // limit of features that system will accept
 
 function addFeature(){
 	//add more feature input in the new property listing form
 
 	if (fCounter == fLimit)  {
 		//generates an alert if max number of allotted features is reached
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
 
 function removeFeature(){
 	//removes feature inputs in the new property listing form & adjust the couter
 
 	var child = document.getElementById("feature" + fCounter);
 	if(fCounter > <?php echo $fCount; ?>)
 	{
	 	document.getElementById("features").removeChild(child);
	 	document.getElementById("featuresNumb").innerHTML=' <input type="hidden" name ="featuresNumb" value="'+(fCounter-1)+'" />';
	 	fCounter --;
 	}
 }
 
 /*
  * adds and removes picture forms from now property listing form
 */
 
 var pCounter = <?php echo $pCount?>;
 var pLimit=10;
 
 function addPicture(){
 	//add more picture input in the new property listing form
 
 	if (pCounter == pLimit)  {
 		//generates an alert if max number of allotted pictures is reached
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
 
 function removePicture(){
 	//removes picture inputs in the new property listing form & adjust the couter
 
 	if(pCounter > <?php echo $pCount;?>)
	 	{
	 	var child = document.getElementById("picture" + pCounter);
	 
	 	document.getElementById("pictures").removeChild(child);
	 	pCounter --;
	 	}
 	
 	 }
 
 /*
  * add or remove more floorplan inputs
 */
 
 var flPlCounter = <?php echo $fpCount?>;
 var flPlLimit=3;
 
 function addFloorPlan(){
 	//add more floor plan pictures input in the new property listing form
 
 	if (flPlCounter == flPlLimit)  {
 		//generates an alert if max number of allotted floor plan pictures is reached
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
 
 function removeFloorPlan(){
 	//removes floor plan pictures inputs in the new property listing form & adjust the couter
	if(flPlCounter > <?php echo $fpCount;?>)
	{
		var child = document.getElementById("floorPlan" + flPlCounter);
		 
	 	document.getElementById("floorPlans").removeChild(child);
	 	flPlCounter --;	
	}
}
 </script>
 </head> 
 <form name="editProperty" enctype="multipart/form-data" action="edit2.php" method="post">
<p>
Type
<?php
var_dump($_POST);
echo ("<br /><pre>");
var_dump((string)$dom->property[$spot]->address->street);
echo("</pre>");
if ($spot==-1) 
{
	//TODO:Error Out
}
else//continue 
{
	echo("<br /> \n Info <br /> \n");
?>
<br />Type: 
<select name="type">
<option value="Commercial" <?php if(strcasecmp($dom->property[$spot]->attributes()->type,"Commercial")==0) echo 'selected="selected"';?>>Commercial</option>
<option value="Residential" <?php if(strcasecmp($dom->property[$spot]->attributes()->type,"Residential")==0) echo 'selected="selected"';?>>Residential</option>
<option value="Out of Area" <?php if(strcasecmp($dom->property[$spot]->attributes()->type,"Out of Area")==0) echo 'selected="selected"';?>>Out of Area</option>
</select>
<br />
Street Address<br />
<input name="street" type="text" name="street" value="<?php
 echo $dom->property[$spot]->address->street;
 ?> "/>
 
<br />
City<br />
<input name="city" type="text" name="city"  value="<?php
echo $dom->property[$spot]->address->city;
?>" /><br />
State<br />
<select name = "state"> 
<?php $state=$dom->property[$spot]->address->state;?>
<option value="SC" <?php if(strcasecmp($state, "SC")==0)echo 'selected="selected"';?>> SC </option>
<option value="GA" <?php if(strcasecmp($state, "GA")==0)echo 'selected="selected"';?>> GA </option>
<option value="NC" <?php if(strcasecmp($state, "NC")==0)echo 'selected="selected"';?>> NC </option>
</select><br />
Zip Code<br /><input name="zip" type="text" name="zip"  value="<?php
echo $dom->property[$spot]->address->zip;?>"/><br />
Title<br /><input id ="title" type="text" name="title"  value="<?php
echo $dom->property[$spot]->title;
?>"/><br />
Price Per Month<br /><input name="perMonth" type="text" name="perMonth" value="<?php
echo $dom->property[$spot]->lease->perMonth;
?>"/><br />
Price Per Sq. Ft.<br /><input name="perSqFt" type="text" name="perSqFt" value="<?php
echo $dom->property[$spot]->lease->perMonth;
?>"/><br />
Features <br />
<div id="features">
<?php 
	$i=1;
	foreach($dom->property[$spot]->features->children() as $f)
	{
		echo '
		<div id="feature'.$i.'">
		Feature '.$i.'
		<br />
		<input name="feature'.$i.'" type="text" value="'.$f.'">
		<input value="+" onclick="addFeature()" type="button">';
		if($i ===$fCount)
			echo '<input value="-" onclick="removeFeature()" type="button">';
		 echo'
	 	 <br />
		 </div>
		 ';
	$i++;	
	}
?>
</div>
<div id="pictures">
Pictures<br/>
<?php 
	$i=1;
	foreach($dom->property[$spot]->pictures->children() as $p)
	{
		
		echo '
		<div id="picture'.$i.'">'.'
		Picture '.$i.'(pictures are shrunk to save screen space here)'.'
		  <br />
		  &nbsp&nbsp&nbsp&nbsp&nbsp Current<br />&nbsp&nbsp&nbsp&nbsp&nbsp<img src="'.$p.'"height="250"/>
		  <br />
		  <input value="Select JPEG image file" name="picture'.$i.'" type="file">
		  <input value="+" onclick="addPicture()" type="button">';
		  if($i===$pCount)
		  {
		  	echo '<input value="-" onclick="removePicture()" type="button">';
		  }
		echo '</div>';
		$i++;
	}
?>
</div>
<div id="floorPlans">
Floor Plan Pictures<br/>
<?php 
	$i=1;
	foreach($dom->property[$spot]->floorPlans->children() as $fp)
	{
		echo
		'<div id="floorPlan'.$i.'">
		Floor Plan Picture '.$i.'
		<br />
		&nbsp&nbsp&nbsp&nbsp&nbspCurrent<br />&nbsp&nbsp&nbsp&nbsp&nbsp<img src="'.$fp.'"/>
		<br />
		<input value="Select JPEG image file" name="floorPlan'.$i.'" type="file">
		<input value="+" onclick="addFloorPlan()" type="button">';
		if($i===$fpCount)
			echo '<input value="-" onclick="removeFloorPlan()" type="button">';
		echo '</div>';
		$i++;
	}


?></div>

<div id="featuresNumb">
<?php 
$fChild=$dom->property[$spot]->features->children();
$fCount=count($fChild);
?>
<input type="hidden" name ="featuresNumb" value="<?php echo $fCount;?>" />
</div>

<div id="picturesNumber">
<?php 
$picChild=$dom->property[$spot]->pictures->children();
$picCount=count($picChild);
?>
<input type="hidden" name="picturesNumber" value="<?php echo $picCount;?>" />
</div>

<div id="floorPlanNumb">
<?php 
$fpChild=$dom->property[$spot]->floorPlans->children();
$fpCount=count($fpChild);
?>
<input type="hidden" name="floorPlanNumb" value="<?php echo $fpCount;?>" />
</div>
<input type="hidden" name="uid" value="<?php echo $uid;?>" />
<div align="right">
<input type="submit" name="Submit" value="Preview New Property" style="height: 45px; width: 256px"/>
</div>
</form>
<?php 
}//else continue if spot !=-1
?>


