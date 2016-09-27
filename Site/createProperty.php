<?php
include_once 'cms/isLoggedIn.php';
session_start();
if(!isLoggedIn())
{
	header("location:index2.php");
}
?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="flexdropdown.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/flexdropdown.js">
/*
	Flex Level Drop Down Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
	This notice MUST stay intact for legal use
	Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
*/

</script>
</head>
<body>
<?php 
include 'cms/createProperty.php';//placed up here so the menu will populate 
?>
<div style="border:solid; width:800px; margin:auto;"  >
<?php 
include 'cms/menu/menu.php';
?>

<?php 
//include '/cms/createProperty.php';
echo $output;//$output comes from /cms/createProperty.php
for ($i = 0; $i < 10; $i++) {
	echo "<br /> \n";//used to create extra space
	
}
?>

</div>
</body>
</html>