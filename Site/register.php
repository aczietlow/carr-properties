<html>
	<head>
		<title>
			Register
		</title>
		<script type="text/javascript" src="js/stscode.js"></script>
		<link rel="stylesheet" type="text/css" href="flexdropdown.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/flexdropdown.js">
		/*
			Flex Level Drop Down Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
			This notice MUST stay intact for legal use
			Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
		*/
		
		</script>
		<style type="text/css">
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
		.text {color: #8792BD;  font-family: arial, helvetica, sans-serif;  font-size: 10px; text-decoration: none}
		.style2 {
			font-size: medium;
		}
		 </style>
	</head>
	<body  style="background-image: url('images/bg5.gif'); background-attachment: fixed; background-color: #000066;">
		<div id="wrapper" style=" height: 100%; left: 0px; top: 0px;">
			<?php 
				include_once 'cms/menu/menu.php';
				include_once 'cms/register.php';
			?>
		</div>
	</body>
</html>