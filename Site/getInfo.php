<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$filename="properties.xml";
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
?>
	<title>
	<?php echo($dom->property[$spot]->title);?>
	</title>
	<style type="text/css">
		#picture {
			max-width:500px; 
			max-height:500px;
			margin-bottom:35px;
			margin-top:35px;
		}
		#wrapper {
			width:900px;
			margin-right:auto;
			margin-left:auto;
			border:1px solid blue;	
			z-index: 1001;
			background-color:#ffffff;
			top:0px;
			height:845px;
			position:relative;
			visibility: visible;
			 
		}
		 
		 #flash1 {
			z-index: 300;
			top: 311px;
			left: 298px;
			position: absolute;
		}
		 
		 .style1 {
			font-family: "Trebuchet MS";
		}
		 
		 .style2 {
			font-family: "Trebuchet MS";
			font-weight: bold;
			color: #FFFFFF;
		}
		.style3 {
			font-family: "Trebuchet MS";
			color: #FFFFFF;
		}
		.style4 {
			font-weight: normal;
		}
		 table#directions
		 {
		 border: 5px solid black;
		 }

 	</style>
<link rel="stylesheet" type="text/css" href="flexdropdown.css" />
<script type="text/javascript" src="jquery-1.6.1.min.js"></script>
<script type="text/javascript">
function loadPic(location)
{
	str = '<img id="picture" src="'.concat(location, '" /> <br />');
	document.getElementById('images').innerHTML = str;
}

</script>
<script type="text/javascript" src="js/flexdropdown.js">
/*
	Flex Level Drop Down Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
	This notice MUST stay intact for legal use
	Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
*/

</script>
</head>

<body    onload="runSlideShow()" style="background-image: url('images/bg5.gif'); background-attachment: fixed; background-color: #000066;">
	<div id="wrapper" style=" height: 100%; left: 0px; top: 0px;">
		<img alt="banner" height="200" src="images/Banner-psd.png" width="900" />
		<div style="position:absolute; top:200px; left:0px; z-index: 111; width: 900px; height: 26px;">
			<?php 
				include '/cms/menu/menu.php';
				echo"<br>\n";
			?>
		</div>
		<br /><br /><br />
		<div align="center">
		<?php 
		if($spot==-1)
		{
		?>
			<table width="100%">
				<tr>
					<td valign="top" id="sidebar" rowspan="4" width=151px>
						<img src="images/carr-button-psd.png"></img>
						<p><b> A Proud Member of: </b></p>
						<p > <img alt="banner" height="74" src="images/Berkeley%20logo.jpg" width="117" />  </p>
						<hr  style="width:100px"/>
						 Charleston Trident Association of Realtors 
						<hr  style="width:100px"/>
						National Federation of Independent Businesses 
						<hr  style="width:100px"/>
						State Leadership Council  
						<hr  style="width:100px"/>&nbsp;
						<img  src="images/narsig2motto.gif" />
						<br /> 
						<img  src="images/header_logo.gif" />
						<br />
						<img  src="images/eqhouseop.gif" width=150px />
						<table id="directions"><tr><td>
					  		DIRECTIONS<br /> 
							From I-26, take Dorchester Road exit 215, one mile east on Dorchester Road, just before Rivers Ave.<br />
						</td></tr></table>
					</td>
				</tr>
					<tr>
					<td>
						<h1> Error </h1>
						<br />
						We are sorry but, the page you are looking for no longer exist 
					</td>
				</tr>
			</table>
		<?php 
		}//if($spot==-1)
		else 
		{
		?>
			<table width="100%">
			<tr>
			<td valign="top" id="sidebar" rowspan="4" width=151px>
			<img src="images/carr-button-psd.png"></img>
			<p><b> A Proud Member of: </b></p>
			<p > <img alt="banner" height="74" src="images/Berkeley%20logo.jpg" width="117" />  </p>
			<hr  style="width:100px"/>
	
			 Charleston Trident Association of Realtors 
			<hr  style="width:100px"/>
			National Federation of Independent Businesses 
			<hr  style="width:100px"/>
			State Leadership Council  
			<hr  style="width:100px"/>&nbsp;
			<img  src="images/narsig2motto.gif" />
			<br /> 
			<img  src="images/header_logo.gif" />
			<br />
			<img  src="images/eqhouseop.gif" width=150px />
			</td>
			</tr>
			<tr>
			
			<td id="info"> 
			<?php
				echo $dom->property[$spot]->title;
				echo "\n<br />\n";
				echo $dom->property[$spot]->address->street;
				echo "\n<br />\n";
				echo $dom->property[$spot]->address->city;
				echo " , ";
				echo $dom->property[$spot]->address->state;
			?>
			</td>
			<td>
			<!-- col span maybe -->
			&nbsp;
			<!-- blank -->
			</td>
				<td valign="top">
				<div id="sale" align="right">
					<?php
						if(false)//we have no sale 
						{ 
							echo"For Sale - ".$dom->property[$spot]->Sale;
							echo"\n<br />\n";
						}
						if(!empty($dom->property[$spot]->lease->perMonth))
						{
							echo"For Lease - ".$dom->property[$spot]->lease->perMonth." Mo.";
							echo"\n<br />\n";
						}
						if(!empty($dom->property[$spot]->lease->perSqFt))
						{
							echo"For Lease - ".$dom->property[$spot]->lease->perSqFt." Per Square Foot";
							echo"\n<br />\n";
						}
					?>
					</div>
				</td>
			</tr>
 			<tr>
			 
			    <td colspan="3">
                 <div align="center" style="font-size:12px;">Click on thumbnail for larger view </div> 
                 <div id="imageThumbs" align="center">
			   <?php 
				    $counter=1;	
					foreach ($dom->property[$spot]->pictures->children() as $pic) 
					{
						echo '<a href="#"><img src="'.$pic.'" height="75" style="margin:3px" onclick="loadPic(\''.$pic.'\')" /></a>';
						$counter++;
					}
					?>
				<br />
					<!--<img src="<?php echo $dom->property[$spot]->picture->pic;?>" />-->
				</div>
                <div id="images" align="center" >
                 	<?php $image=$dom->property[$spot]->pictures->children();
							echo '<img id="picture" src="'.$image.'"/> <br />';
					?>
                    
                </div>
                
               
                
			   
				</td>
				
			  </tr>
			  
			  <tr>
			  <td valign="top" colspan="3">
			  <div align="center">
				  <div id="feature" align="left" style=" color: #FFFFFF; background-color: #000000; width: 600px;">
				  	<h2>Features :</h2>
				  	<ul>
						<?php 
				  			$counter=1;
							foreach($dom->property[$spot]->features->children() as $f)
							{
								
								$fString="<li> ".(string)$f."</li>";
								echo (string)$fString."\n";
								$counter++;
							}
					  	?>
				  	</ul>
				  	<p>&nbsp;<br />&nbsp;<br /></p>
				  </div>
			  </div>
			  </td>
			  </tr>
			  <tr>
			  <td  valign="top" rowspan="3" width=151px>
			  	<br /><br /><br />
			  	<table id="directions"><tr><td>
			  		DIRECTIONS<br /> 
					From I-26, take Dorchester Road exit 215, one mile east on Dorchester Road, just before Rivers Ave.<br />
				</td></tr></table>
			</td>
			  </tr>
			  <tr>
			  <td colspan="3">
			  <h2>Floor Plan</h2>
			  	<div align="center">
				  <?php 
					    $counter=1;	
						foreach ($dom->property[$spot]->floorPlans->children() as $pic) 
						{
							//$picString="Picture ".$counter.": ";
							//Todo: display images better
							// resize or slideshow??
							//echo $picString."\n<br>\n";
							$info=getimagesize($pic);
							if($info[1]>700)
							{
								echo '<img src="'.$pic.'" width=600  />';
							}
							else 
								echo '<img src="'.$pic.'"   />';
							
							
							//$src='img/'.$uid.'picture'.$counter.'.jpg';
							//echo '<img src ="'.$src.'" height="250" />';
							//echo "<br />\n";
							echo "\n";
							$counter++;
						}
					?>
				</div>
			  </td>
			  </tr>
			  <tr>
			<td> </td>
			<td> </td>
			<td> </td>
			</tr>
			</table>
			<?php 
			}//else
			?>
		</div>
		
</div>
<?php echo "test".(empty($spot)&&$spot!=0) ?>
</body>
</html>