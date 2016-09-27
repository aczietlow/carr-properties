<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 
<title>Carr properties - Commercial Real Estate Services</title>
 
 <meta http-equiv="Page-Exit" content="progid:DXImageTransform.Microsoft.Fade(duration=.5)"/>

<meta name="keywords" content=" "/>  

<meta name="description" content=" "/> 
 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<meta http-equiv="Content-Style-Type" content="text/css"/>
 <meta name = "GOOGLEBOT" content="index,follow"/> 
 <meta name = "robots" content="INDEX,FOLLOW"/>
 <meta name = "revisit-after" content="7 Days"/>
 <meta name = "date.modified" content="3-25-2009"/>
 <meta name = "Author" content="http://techjunkies-csra.com"/>
 

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
 
 .style1 {
	text-align: left;
}
.style2 {
	text-align: left;
	font-size: medium;
}
.style4 {
	text-align: center;
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
	font-family: "Trebuchet MS";
}
 
 </style>


<!-- JS and CSS for dropdown menu -->
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



<body  style="background-image: url('images/bg5.gif'); background-attachment: fixed; background-color: #000066;">
<div id="wrapper" style=" height: 1111px; left: 0px; top: 0px;">
<img alt="banner" height="200" src="images/Banner-psd.png" width="900" />

<!-- drop down menu -->
<div style="position:absolute; top:200px; left:0px; z-index: 111; width: 900px; height: 26px;">

<!-- <script type="text/javascript" src="js/menu.js"></script>--> 
<?php

include ("cms/Menu/Menu.php");
?>
</div> 
<!-- drop down menu end -->

<div id="layer1" style="position: absolute; width: 133px; padding:10px; height: 626px; z-index: 201; top: 237px; left: 17px; text-align: center; background-color: #CCFFFF; font-size: small;">
		 
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p><b><font color="#000000">A Proud Member of:</font></b></p>
		<p ><font color="#000000">
		<img alt="banner" height="74" src="images/Berkeley%20logo.jpg" width="117" />&nbsp; Berkeley County Chamber of 
		Commerce</font></p>
		<hr  style="width:100px"/>

		<p class="style3"><font color="#000000">Charleston Trident Association 
		of Realtors</font></p><hr  style="width:100px"/>
		<p class="style3"><font color="#000000">National Federation of 
		Independent Businesses</font></p><hr  style="width:100px"/>
		<p class="style3"><font color="#000000">State Leadership Council </font>
		</p><hr  style="width:100px"/>&nbsp;</div>
<img alt="button" height="177" src="images/carr-button-psd.png" width="137" style="z-index: 400; top: 255px; left: 28px; position: absolute" />






<div id="layer2" style="position: absolute; width: 707px; height: 190px; z-index: 202; top: 304px; left: 173px; font-family: 'Trebuchet MS'">
		If you are have a problem, concern, comment, or issue with your website, feel to email us here. Someone will return your email with in
		24 hours. 
</div>


</div>
    

<div style="position: absolute; top:400px; left:550px; z-index:3003;">
<?php 

//For first run, output blank text fields.
if(!isset($_POST['Name']))
{
	output("","","","","","");
}

//Function that creates the form and fields. Outputs error message if invalid Captcha.
function output($fName, $fSubject, $fEmail, $fPhone, $fComments, $fError)
{
echo $fError;
echo '<div style="border:1px solid red;padding:5px;width:365px;text-align:right;">';
echo '<form method="post" action="'.$_SERVER["PHP_SELF"].'">';
echo '*Name: <input name="Name" type="text" value="'.$fName.'" size="30" maxlength="30" />';
echo '<br />';
echo '*Subject: <input name="Subject" type="text" value="'.$fSubject.'" size="30" maxlength="30" />';
echo '<br />';
echo '*Email Address: <input name="emailAddress" type="text" value="'.$fEmail.'" size="30" maxlength="30" />';
echo '<br />';
echo 'Phone (optional): <input name="Phone" type="text" value="'.$fPhone.'" size="30" maxlength="30" />';
echo '<br />';
echo '<br />';
echo '<div style="text-align:left;">';
echo '*Comments: <textarea name="Comments" cols="39" rows="10">'.$fComments.'</textarea>';
echo '</div>';
echo '<br />';
echo '<div style="text-align:left;">';
echo 'Type the text below here:  ';
echo '<input id="security_code" name="security_code" type="text" />';
echo '<img src="CaptchaSecurityImages.php" />';
echo '</form>';
echo '<br />';
echo '<br />';
echo '<input type="submit" value="Send" />';

}

//When submit button clicked, fire this. This is responsible for the actual work.
if(isset($_POST['Name']))
{
//Determine where it's going, and pull data from the fields.
$to='aczietlow@techjunkies-csra.com';
$name=$_POST['Name'];
$subject=$_POST['Subject'];
$email=$_POST['emailAddress'];
$phone=$_POST['Phone'];
$error='Invalid Captcha, please try again.';

//Phone is optional, if it's set, then keep it. It not set it to blank.
//Additionally, remove anything not a number, +, or -. If said removal leaves phone blank, set to error.
//From provides a line at the top of the message that tells the recipient email/phone of sender.
if($phone!='')
{
	$phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
	$from="Email: ".$email.". Phone: ".$phone.". \n \n";
	if($phone=='')
	{
	$phone='Error';
	}
}
else 
{
	$phone='';
	$from="Email: ".$email.". \n \n";
}
//Combine the $from to the comments.
	$message=$_POST['Comments'];
	$completeMessage=$from.$message;


//Check all required fields to make sure they have been filled in, make sure phone was validated. 
//Validate the email to be in the correct format, validate captcha entry.
//If everything checks out, send email. Otherwise output corresponding error message (do not send).
	

if($phone!='Error')
{
	if($name!='')
	{
		if ($subject!='')
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				if ($message!='')
				{
					
					if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) 
				   {
						$headers ='From: '.$name;
						mail($to,$subject,$completeMessage, $headers); 
						unset($_SESSION['security_code']);
						echo 'Thank you for contacting us! You will hear back from us as soon as possible.';
				   } 
					else
					{		
						$error='Invalid Captcha, please try again';
						output($name, $subject, $email, $phone, $message, $error);
					}
				}
				else
				{
				$error='Please enter valid comments.';
				output($name, $subject, $email, $phone, $message, $error);	
				}
			}
			else
			{
			$error='Please enter a valid e-mail address.';
			output($name, $subject, $email, $phone, $message, $error);
			}
		}
		else
		{
		$error='Please enter a valid subject.';
		output($name, $subject, $email, $phone, $message, $error);	
		}
	}
	else
	{
	$error='Please enter your name.';
	output($name, $subject, $email, $phone, $message, $error);
	}
}
else
{
$error='Please enter a valid phone number';
$phone='';
output($name, $subject, $email, $phone, $message, $error);
}


}


?>


    

   </div>
</body>

</html>
