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
<title>
Property Preview
</title>
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
		<div style="border:solid; width:800px; margin:auto;"  >
			<?php 
			include_once 'cms/menu/menu.php';
			include_once 'cms/propertyPreview.php';
			?>
</div>
</body>
</html>