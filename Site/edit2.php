<?php
include_once 'cms/isLoggedIn.php';
session_start();
if(!isLoggedIn())
{
	header("location:index2.php");
} 
	$filename="properties.xml";
	//$filename="test.xml";
	$dom = simplexml_load_file($filename);
	$uid=$_POST["uid"];
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
<html>
<head>
<title>
Edit a property
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
		<div style="border:solid; width:800px; margin:auto; "  >
			<?php 

			include '/cms/edit2.php';
			?> 
		</div>	
		<br /><br /><br /><br /><br />
	</body>
</html>