<?php

/*
 * (C) Copyright 2008 BestWebForms.com
 * For information visit http://www.bestwebforms.com/
 * All rights reserved. Used only by permission under license agreement.
 */

session_start();

require "./configbwf.php";

?>

<html>
<head>
<title>Thank you!</title>
<link rel="stylesheet" href="./styles.css">
<style type="text/css">
body {background-color: <?php echo $iframe_background_color; ?>;
      color: <?php echo $text_color; ?>;
      font-family: <?php echo $font_style; ?>;
      font-size: <?php echo $text_size; ?>}

</style> 
</head>
<body>
<center>

<div class="verdana">

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h4><font face="Verdana">Thank you!</font></h4>

<p><font face="Verdana" size="2">Your email has been sent. We will reply to you soon.<br>
To return to the home page <a href="/" target="_parent">click here</a></font></p>


</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php

if (isset($_SESSION['turing_string'])){
	if (isset($_GET['t']) && $_GET['t'] != "" && strtolower($_GET['t']) == strtolower($_SESSION['turing_string'])){
		// we have a conversion
?>

<!-- Google Code for PURCHASE Conversion Page -->
<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = <?php echo $google_conversion_id; ?>;
var google_conversion_language = "en_US";
var google_conversion_format = "1";
var google_conversion_color = "FFFFFF";
if (1) {
  var google_conversion_value = 1;
}
var google_conversion_label = "PURCHASE";
//-->
</script>
<script language="JavaScript" 
src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<img height=1 width=1 border=0 
src="http://www.googleadservices.com/pagead/conversion/<?php echo $google_conversion_id; ?>/?value=1&label=PURCHASE&script=0">
</noscript>

<?php
	}
}

?>

</center>
</body>
</html>


