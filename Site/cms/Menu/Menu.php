<?php 
	@session_start();
	include_once 'cms/isLoggedIn.php';
?>

<!--<div id="menu" style="align:center">-->
<div id="spacer" style=" color: #FFFFFF; background-color: #000000; width: 100px;"></div>
<ul id="menu" style="text-align:center">
<!--<li id="menu"><a id="menu" data-flexmenu="#" href="#" </a></li>-->
<li id="menu"><a id="menu" data-flexmenu="home" style="width:100px;" href="index.php">Home</a></li> 
<li id="menu"><a id="menu" data-flexmenu="properties" style="width:100px;">Properties</a></li> 
<li id="menu"><a id="menu" data-flexmenu="Services" style="width:100px;">Services</a></li>
<li id="menu"><a id="menu" data-flexmenu="Self-Storage" style="width: 100px;" href="http://climatemastersstorage.com/">Self-Storage</a></li>  
<li id="menu"><a id="menu" data-flexmenu="Mountain Rental" style="width: 100px;" href="http://theshamrockhouse.com/">Mountain Rental</a></li> 
<li id="menu"><a id="menu" data-flexmenu="About_us" style="width: 100px;" href="about.php">About us</a> </li>
<!--<li id="menu"><a id="menu" data-flexmenu="#" href="#"> </a></li>-->
</ul>
<!-- <div id="spacer" style=" color: #FFFFFF; background-color: #000000; width: 100px;"></div> -->
<!--</div>-->
<?php 
if(!isLoggedIn())//not logged in
{
	?>
	<ul id="home" class="flexdropdownmenu">
	<li><a href="main_login.php">Log In</a></li>
	<?php //<li><a href="register.php" >Register</a> </li>//no longer needed?>
	</ul>
	<?php 
}
else
{
	?>
	<ul id="home" class="flexdropdownmenu">
	<li><a href="addProp.php">Create New Property</a></li>
	<li><a href="editSelect.php">Edit a Property</a></li>
	<li><a href="deleteSelect.php"> Delete A Property</a></li>
	<li><a href="devContact.php">Contact Developers</a></li>
	<li><a href="logout.php">Log out</a></li>
	</ul>
	<?php 
}
$filename="properties.xml";
$dom = simplexml_load_file($filename);
$templet='<ul id="properties" class="flexdropdownmenu">'."\n";
$commercial='<li><a href="#"> Commercial </a> '."\n"."<ul>\n";
	$temp="";
	$charleston='<li><a href="#"> Charleston </a> '."\n"."<ul>\n";
	$danielIsland='<li><a href="#"> Daniel Island </a> '."\n"."<ul>\n";
	$hanahan='<li><a href="#"> Hanahan </a> '."\n"."<ul>\n";
$residential='<li><a href="#"> Residential </a>'."\n"."<ul>\n";
$outOfArea='<li><a href="#"> Out of Area </a>'."\n"."<ul>\n";
foreach ($dom as $p)
{
	$title=$p->title;
	$uid=$p->attributes()->uid;
	$type=(string)$p->attributes()->type;
	if (strcasecmp($type, "Commercial")==0) 
	{
		//$commercial=$commercial.'<li><a href="getInfo.php?uid='.$uid.'">'.$title.'</a></li>'."\n";
		$city=$p->address->city;
		if (strcasecmp($city, "Charleston")==0||strcasecmp($city, "North Charleston")==0)
		{
			$charleston=$charleston.'<li><a href="getInfo.php?uid='.$uid.'">'.$title.'</a></li>'."\n";
		}
		elseif (strcasecmp($city, "Daniel Island")==0)
		{
			$danielIsland=$danielIsland.'<li><a href="getInfo.php?uid='.$uid.'">'.$title.'</a></li>'."\n";
		}
		elseif (strcasecmp($city, "Hanahan")==0) 
		{
			$hanahan=$hanahan.'<li><a href="getInfo.php?uid='.$uid.'">'.$title.'</a></li>'."\n";;
		}
		else {
			$temp=$temp.'<li><a href="getInfo.php?uid='.$uid.'">'.$title.'</a></li>'."\n";
		}
	}elseif (strcasecmp($type, "Residential")==0) 
	{
		$residential=$residential."\t".'<li><a href="getInfo.php?uid='.$uid.'">'.$title.'</a></li>'."\n";
	}elseif (strcasecmp($type, "Out of Area")==0) 
	{
		$outOfArea=$outOfArea.'<li><a href="getInfo.php?uid='.$uid.'">'.$title.'</a></li>'."\n";
	}else 
	{
		error_log("Wrong type: \"".$type."\" from uid = $uid");
		echo "<!--Error \t\"".$type."\"\t -->\n<br />\n";
	}
}
$charleston=$charleston."</ul>\n</li>\n";
$danielIsland=$danielIsland."</ul>\n</li>\n";
$hanahan=$hanahan."</ul>\n</li>\n";
$commercial=$commercial."\n".$charleston."\n".$danielIsland."\n".$hanahan;
$commercial=$commercial.$temp;
$commercial=$commercial."</ul>\n</li>\n";
$residential=$residential."</ul>\n</li>\n";
$outOfArea=$outOfArea."</ul>\n</li>\n";
$templet=$templet."\n".$commercial."\n".$residential."\n".$outOfArea."\n"."</ul>\n";
echo($templet);
?>
<ul id="Services" class="flexdropdownmenu">
<li><a href="#">Brokerage</a></li>
<li><a href="#">Managment</a></li>
<li><a href="#">Development</a></li>
</ul>
<ul id="About_us" class="flexdropdownmenu">
<li><a href="links.php">Links</a></li>
<li><a href="Contact.php">Contact Us</a></li>
<li><a href="mailto:mike@carr-properties.com">E-Mail Us</a></li>
</ul>