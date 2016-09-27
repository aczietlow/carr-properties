<?php
ob_start();

/*

 * (C) Copyright 2008 BestWebForms.com

 * For information visit http://www.bestwebforms.com/

 * All rights reserved. Used only by permission under license agreement.

 */



session_start();

include ("./funcbwf.php");

if( file_exists( './configbwf.php' ) )
{
    $tmp = file_get_contents('./configbwf.php') ;
    $check = @eval('?>' . $tmp . '<?php return true ;') ;
} 
else
{   $check = false;
} 

if ($check) {
  include ("./configbwf.php");
}else{
  echo "THE CONFIG FILE IS BROKEN! WOULD YOU LIKE TO FIX IT?" ;
}

include ("./authbwf.php");






if (isset($_POST['action'])){

	if ($_POST['action'] == 'update'){
		ob_end_clean();
		update_settings($_POST);

		header("Location: ./adminbwf.php");

		exit;

	}

}



setup_form ();

exit;



///////////////////////////////////////////////////////////////////////////////////////////////////////

function setup_form () {

///////////////////////////////////////////////////////////////////////////////////////////////////////



global $base_url;



global $turing_text_font;

global $turing_image_font;

global $popup_thankyou_location;

global $thank_you_url;



global $security_level;



global $use_border;



global $custom_thankyou_page;



global $admin_email;

global $admin_cc_email;

global $admin_from_email;

global $admin_override_from;

global $google_conversion_id;



global $iframe_background_color;

global $form_background_color;

global $text_color;

global $font_style;

global $text_size;

global $terms;

global $formtop;

global $formbottom;

global $subject_hidden_field;


global $form_border_color;



global $turing_image_url;

global $num_guesses;

global $length;

global $path_to_border_images;



global $google_adsense_code;

global $missing_fields_message;



global $default_form;



global $validation_arrow;

global $validation_star;

$tmp = explode(".", $_SERVER['HTTP_HOST']) ;

$frmHost = array_pop($tmp) ;

$frmHost = array_pop($tmp) . "." . $frmHost ;

?>

<html>

<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Web Form Designer Panel</title>

<meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />



<script language="JavaScript">

<!--



function openForm () {



var num;

for (i = 0; i < document.forms[0].default_form.length; i++){

	if (document.forms[0].default_form[i].checked == true){

		num = i+1;

	}

}



url = './formbwf.php?f='+num;

newWin = window.open (url,'','');



}
<?php
	$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
	$display_url = eregi_replace(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1), "", $url);
?>
function generateCode1 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=1&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="850" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}


function generateCode2 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=2&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1050" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode3 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=3&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="950" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode4 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=4&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1000" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode5 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=5&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="950" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode6 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=6&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="550" height="600" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode7 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=7&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1000" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode8 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=8&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1050" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode9 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=9&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="950" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode10 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=10&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1000" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode11 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=11&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1000" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode12 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=12&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1350" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode13 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=13&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1270" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode14 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=14&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="850" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode15 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=15&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1300" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode16 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=16&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="700" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode17 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=17&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1050" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode18 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=18&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1275" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode19 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=19&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1550" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode20 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=20&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1800" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode21 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=21&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1500" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode22 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=22&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1700" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode23 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=23&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="180" height="850" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode24 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=24&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="180" height="1050" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode25 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=25&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="180" height="800" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode26 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=26&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="900" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode27 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=27&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="2350" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode28 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=28&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1325" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode29 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=29&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1450" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode30 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=30&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1000" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode31 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=31&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1000" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;



}

function generateCode32 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=32&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="2700" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode33 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=33&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="700" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode34 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=34&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="750" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode35 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=35&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1325" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode36 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=36&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1600" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode37 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=37&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="2025" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode38 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=38&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1225" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode39 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=39&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="180" height="900" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode40 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=40&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="960" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}

function generateCode41 (num) {



var scriptName = new String("adminbwf.php");



var url = '<?php echo $display_url; ?>'+'formbwf.php?f=41&iframe=yes';



var codeSnippet = ('<iframe name="bwfIFRAME" src="'+url+'" width="425" height="1160" frameborder="0" scrolling="no"></iframe>');



document.code.code_snippet.value = codeSnippet;


}



function shuffleLetters (arrayName) {



Array.prototype.shuffle= function(times){



var i,j,t,l=this.length;



while(times--){



with(Math){

	i=floor(random()*l);j=floor(random()*l);}

	t=this[i];this[i]=this[j];this[j]=t;

}



return this;



}



arrayName.shuffle(300);



}



var letters = new Array ();



letters[0] = 'A';

letters[1] = 'B';

letters[2] = 'C';

letters[3] = 'D';

letters[4] = 'E';

letters[5] = 'F';

letters[6] = 'G';

letters[7] = 'H';

letters[8] = 'I';

letters[9] = 'J';

letters[10] = 'K';

letters[11] = 'L';

letters[12] = 'M';

letters[13] = 'N';

letters[14] = 'O';

letters[15] = 'P';

letters[16] = 'Q';

letters[17] = 'R';

letters[18] = 'S';

letters[19] = 'T';

letters[20] = 'U';

letters[21] = 'V';

letters[22] = 'W';

letters[23] = 'X';

letters[24] = 'Y';

letters[25] = 'Z';





function reloadLetters (font) {



if (font == 'timesroman'){

	document.images['captcha6_1'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha6_2'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha6_3'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha6_4'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

}



if (font == 'verdana'){

	document.images['captcha7_1'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha7_2'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha7_3'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha7_4'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

}



if (font == 'hand'){

	document.images['captcha8_1'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha8_2'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha8_3'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

	document.images['captcha8_4'].src = './fonts/'+font+'/'+letters[(Math.round(Math.random() * 25))]+'.gif';

}





}





function getObj(name){



	if (document.getElementById){

  		this.obj = document.getElementById(name);

		this.style = document.getElementById(name).style;

	}else if (document.all){

		this.obj = document.all[name];

		this.style = document.all[name].style;

	}else if (document.layers){

   		this.obj = document.layers[name];

	   	this.style = document.layers[name];

	}

}



var DHTML = (document.getElementById || document.all || document.layers);



function reloadText (id) {



randText = letters[(Math.round(Math.random() * 25))]+letters[(Math.round(Math.random() * 25))]+letters[(Math.round(Math.random() * 25))]+letters[(Math.round(Math.random() * 25))];



if (!DHTML) return;

var x = new getObj(id);

x.obj.innerHTML = randText;



}





function reloadCaptcha (turingImageId) {



imageName = 'captcha'+turingImageId;

document.images[imageName].src = './inc/turing-image'+turingImageId+'.php#'+letters[(Math.round(Math.random() * 25))];



}



function generateFullCode () {

	alert ('Under Construction!')

}



//-->

</script>



</head>

<body>

<form method="POST" name="code">

<input type="hidden" name="action" value="update">



<div align="center">

<br>

&nbsp;<div align="center">

	<table border="1" cellpadding="0" cellspacing="0" width="600" bordercolor="#000080" id="table57">

		<tr>

			<td><table border="0" cellpadding="0" cellspacing="0" width="600" bordercolor="#003366" id="table1" bgcolor="#FFFFFF">

 <tr>

  <td>

   <div align="center">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">



     <tr>

      <td colspan="5" align="center">

		</td>

     </tr>



     <tr>

      <td colspan="5" align="center">

		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table186">
			<tr>
				<td valign="top" rowspan="9"><p align="left">

		<font face="Verdana" size="1">&nbsp;&copy

		<a target="window.open" href="http://bestwebforms.com">

		<font color="#000000">BestWebForms.com</font></a> <br>
&nbsp;</font></p>

		<p align="center"><b>

		<font face="Verdana" color="#000080"> <u>Web Form Designer</u></font></b><br>&nbsp;<br><a href="./logoutbwf.php"><font face="Verdana" size="2" color="#333333">Logout</font></a></td>
				<td width="240" align="left" colspan="2" height="20">
				<p align="center"><font face="Verdana" size="1">&nbsp;<b>Shortcut Menu</b>:</font></td>
			</tr>
			<tr>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1"><a href="#email">Email Address</a></font></td>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1"><a href="#interior">Interior 
				Colors</a></font></td>
			</tr>
			<tr>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#ISP">ISP &amp; Hosting Test</a></font></td>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#text">Text Choices</a></font></td>
			</tr>
			<tr>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#validation">Validation Images</a></font></td>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#password">Change Password</a></font></td>
			</tr>
			<tr>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#borders">Borders</a></font></td>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#thanks">Thank You Page</a></font></td>
			</tr>
			<tr>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#security">Security Styles</a></font></td>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1"><a href="#terms">Terms Text</a></font></td>
			</tr>
			<tr>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#subject">Subject Text</a></font></td>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#forms">Web Forms</a></font></td>
			</tr>
			<tr>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#non-iframe">Non-iFrame Method</a></font></td>
				<td width="120" align="left" height="20">
				<font face="Verdana" size="1">
				<a href="#iframe">iFrame Snippet</a></font></td>
			</tr>
			<tr>
				<td width="120" valign="top" align="left">
				<font size="1">&nbsp;</font></td>
				<td width="120" valign="top" align="left">
				<font size="1">&nbsp;</font></td>
			</tr>
		</table>
		</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td colspan="3" valign="top">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table192">
			<tr>
				<td width="276" valign="top"><font face="Verdana" size="2"><b>Welcome.<br>
&nbsp;
		<br>
		Please read below</b>:</font><p><font color="#000080" face="Verdana" size="2"><b><u>This is how you design your form</u></b>:</font></p>

		<p>

		<font color="#800000" face="Verdana"><b>1.</b></font><font face="Verdana" size="2"> Click on your web form

		preferences below. Enter your email <a href="#email">address</a>. Choose the <a href="#colors">colors</a> and 
		<a href="#borders">borders</a> that match the general

		look of your website.<br>
&nbsp;<br>

		</font><font color="#800000" face="Verdana">

		<b>2.</b></font><font face="Verdana" size="2"> Then click any of the &quot;<b>Save Changes</b>&quot; buttons.<br>
&nbsp;<br>

		</font><font color="#800000" face="Verdana">

		<b>3.</b></font><font face="Verdana" size="2"> Click on the web form 
		<a href="#forms">link</a>, near the bottom of this page, to preview it.<br>
&nbsp;&nbsp; <br>

		</font><font color="#800000" face="Verdana">

		<b>4.</b></font><font face="Verdana" size="2"> Click the &quot;<b><a href="#forms">Generate</a> iFrame Code</b>&quot; button to create 
		the &quot;<b>iFrame Code <a href="#iframe">Snippet</a></b>&quot; to insert into

		the code of a webpage on your website.<br>
&nbsp;<br>

		</font><font color="#800000" face="Verdana">

		<b>5.</b></font><font face="Verdana" size="2"> Upload your webpage to your website with the &quot;<b>iFrame Code Snippet</b>&quot;

		in it that you have inserted. This <b>iFrame Method</b> is easiest for the 
		inexperienced.<br>
		&nbsp;<br>
		</font><font color="#800000" face="Verdana">
		<b>6.</b></font><font face="Verdana" size="2"> You may also choose to use the <b>
		<a href="#non-iframe">Non-iFrame</a> Method</b> below. This method involves pasting the header and footer code 
		from your website into their respective fields below. This 
		method is not recommended for beginners.</font></p>

		<p><font face="Verdana" size="2"><b>The Basics Are Then Done.<br>
&nbsp;</b></font><p align="center"><b>
		<font face="Verdana" size="2">*************************</font></b></p>
		<p align="left"><font face="Verdana" size="2"><br>
		The sample form to the right is just to show you what your current 
		settings are for colors, borders, and such. It is only for display and 
		informational purposes to assist you in making your designer choices. <b>
		<br>
		<br>
		</b><font color="#E60000"><b>click to view &gt;&gt;</b></font>
		<a target="window.open" href="formbwf.php?f=1">Contact Form</a> - 
		Classic<b><br>

&nbsp;<br>

&nbsp;</b></font></td>
				<td align="center" valign="top">
				<p align="center">
				<iframe name="I1" src="formbwf.php?f=42&iframe=yes" width="265" height="650" frameborder="0" scrolling="no"></iframe>
				</td>
			</tr>
		</table>
		</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3">
		<p align="left">
		<font face="Verdana" size="2">For a full 
		understanding of this program, please review
		<a target="window.open" href="instructions-bwf.html">instructions-bwf.html</a>.<br>
		You may also 
		wish to review the <font color="#0000FF">
		<a target="window.open" href="tips.html">tips.html</a></font> guide, located in your download.<br>
&nbsp;<br>
		View this

		Web Form Designer Panel in your <u>browser</u> after you have uploaded it to your

		server and set permissions to <font color="#0000CC"><b>777</b></font> 
									on the Web Forms Package

		<b>folder</b> &quot;<b>forms</b>&quot;, and set permissions to
		<font color="#000080"> <b>777</b></font> on the <b>temp folder</b>, and <b>configbwf.php</b>.<br>
		<br>
		<b>Note</b>: If setting the permissions to <b>777</b> does not work on 
		your server, then try setting the permissions to <font color="#0000CC">
		<b>755</b></font>.<br>
		<br>
									Also, if you use a <b>Windows</b> server, 
		they use a <u>
									different</u> method of setting &quot;<b>permissions</b>&quot; 
									for your files. You will need to log into 
									your main hosting account with your hosting 
									company to change permissions as needed. You 
									might need to contact them to do this for 
									you, and maybe to &quot;turn on&quot; PHP, if it is 
									available. <b>Linux</b> servers are much 
									easier to set permissions on.<br>
&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3"><font face="Verdana">

		<b>&nbsp; <a name="email"></a> <br>

		<font color="#000080">

		<u>Enter Your Email Address</u></font></b><font color="#000080">:</font><font size="1"><br>

&nbsp; <br>

		</font></font><font face="Verdana" size="2">Below are 2 e-mail address fields that you can have the form results sent to. It is best if these

		are &quot;dedicated&quot; e-mail addresses; not your primary accounts. If you have been receiving spam, then you should use a &quot;brand new&quot; email address. Test the new email addresses to make sure

		they work. This Admin Panel does not &quot;create&quot; new email addresses on your server.<br>

&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3"><p><font face="Verdana" size="2">First

		email address:&nbsp; </font><input type="text" name="admin_email" value="<?php echo $admin_email; ?>" size="45"><br><font face="Verdana" size="2">example:

		FirstAddress@gmail.com</a> </font><font face="Verdana" size="1">&nbsp; (google's email)</font></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20" height="35">&nbsp;</td>

      <td align="center" colspan="3" height="35"><font face="Verdana" size="2">

		<u>And if you wish</u>:</font></td>

      <td width="20" height="35">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">

		<p align="left"><font face="Verdana" size="2">Enter the second e-mail address you want the form results to be copied to, or leave it empty if you don't want a copy.

		Most people use just one email address (above) and leave the field below

		blank.<br>

&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3"><p><font face="Verdana" size="2">Second

		email address:&nbsp; </font><input type="text" name="admin_cc_email" value="<?php echo $admin_cc_email; ?>" size="45"><br><font face="Verdana" size="2">example:

		SecondAddress@gmail.com</a> </font><font face="Verdana" size="1">&nbsp; (google's email)</font></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>

     <tr>

      <td width="20">&nbsp;</td>

      <td colspan="3">

        <p align="center"><a name="ISP"></a><br><b><font face="Verdana" size="3" color="#000080"><u>Hosting and ISP Configuration</u></font></b><font color="#000080">:</font></p>

        <p>

          <font face="Verdana" size="2"><u>Most</u> people will not need to be 
			concerned about this section:<br>
			<br>
			There are some hosting and internet services providers that do not allow email to be sent or received from a domain 
			<b>that is different from</b> the domain sending the web form email. </font>

          <font face="Verdana" size="1"><br>
&nbsp;</font><font face="Verdana" size="2"><br>
			For example, a Yahoo Business Hosting account with a website domain called 
			<br>
			"my-website.com" can only send email that is "From" an email address such as jan@my-website.com. If this is the case, check the box below, and enter a valid

email address on that domain's server.

          <br><br><a href="javascript:void();" onclick="window.open('testFrom.php', 'testfrom', 'width=500,height=520,scrollbars=yes')">Click Here</a> to test your 
			Website Hosting or ISP provider's 
			email settings.</font>

        </p>

        <table align="center">

          <tr>

            <td align="right" width="275">
			<p align="center"><font face="Verdana" size="2">Then do the below <u>
			if needed</u>:<br>
&nbsp; </font></td>

            <td style="padding-left:4px;">&nbsp;</td>

            <td style="padding-left:4px;">&nbsp;</td>

          </tr>

          <tr>

            <td align="right" width="275"><font face="Verdana" size="2">Override Email 
			&quot;From&quot; Address:</font></td>

            <td style="padding-left:4px;"><input type="checkbox" name="admin_override_from" value="true" <?php echo ($admin_override_from == "true") ? "checked=\"checked\"" : ""; ?>><font face="Verdana" size="1">&nbsp;</font></td>

            <td style="padding-left:4px;"><font face="Verdana" size="1">Check 
			this box to have email &quot;From&quot; <br>
			the below address.</font></td>

          </tr>

          <tr>



            <td align="right" width="275"><font face="Verdana" size="2">Enter 
			Domain's Email &quot;From&quot; Address:</font></td>

            <td style="padding-left:4px;" colspan="2">
			<input type="text" name="admin_from_email" value="<?php echo $admin_from_email; ?>" size="30"></td>

          </tr>

        </table>

      </td>

      <td width="20">&nbsp;</td>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30">&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><input type="submit" value="Save Changes"></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><font face="Verdana">

		<b>&nbsp; <br>

		<font color="#000080">

		<u>Enter Your Google Adwords Account Number</u></font></b><font color="#000080">:</font><font size="1"><br>

&nbsp;<br>

&nbsp;</font></font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" width="45%"><font face="Verdana" size="2">Enter your Google

		conversion <br>

		ID number to track keywords. <br>

		If you do not have a Google Adwords account, then leave example <br>
		number 1234567890 in the field.</font></td>  
		<td width="7%">&nbsp;</td>

      <td align="left"><p><input type="text" name="google_conversion_id" value="<?php echo $google_conversion_id; ?>" size="20"><br><font face="Verdana" size="2">example: 1234567890</font></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><font face="Verdana">

		<font size="1">&nbsp;</font><b> <a name="validation"></a> <br>

		<font color="#000080">

		<u>Choose Your Validation Images</u></font></b><font color="#000080">:</font><font size="1"><br>

&nbsp;<br>

&nbsp;</font></font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="left" colspan="3">

		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table9">

			<tr>

				<td align="center" valign="top">

				<p align="center"><table border="0" id="table3" width="210">



         <tr>

          <td colspan="3">

			<p align="center"><font face="Verdana" size="2">Choose validation

			stars<br>

			(left side of form)<br>

			To show the user which<br>

			fields must be filled in.<br>

&nbsp; </font> </td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			1.</font></b></td>

          <td align="center"><img src='./star_images/required.gif'></td>

          <td><p><input type="radio" value="required.gif" name="validation_star" <?php if ($validation_star == 'required.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			2.</font></b></td>

          <td align="center"><img src='./star_images/required-star.gif'></td>

          <td><p><input type="radio" value="required-star.gif" name="validation_star" <?php if ($validation_star == 'required-star.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			3.</font></b></td>

          <td align="center"><img src='./star_images/required-blue-star.gif'></td>

          <td><p><input type="radio" value="required-blue-star.gif" name="validation_star" <?php if ($validation_star == 'required-blue-star.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			4.</font></b></td>

          <td align="center"><img src='./star_images/required-red-asterisk.gif'></td>

          <td><p><input type="radio" value="required-red-asterisk.gif" name="validation_star" <?php if ($validation_star == 'required-red-asterisk.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			5.</font></b></td>

          <td align="center"><img src='./star_images/required-red-star.gif'></td>

          <td><p><input type="radio" value="required-red-star.gif" name="validation_star" <?php if ($validation_star == 'required-red-star.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;</td>

          <td>&nbsp;</td>

         </tr>





         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			6.</font></b></td>

          <td bgcolor="#333333" align="center">
			<p align="center"><img src='./star_images/required-white-asterisk.gif'></td>

          <td><p><input type="radio" value="required-white-asterisk.gif" name="validation_star" <?php if ($validation_star == 'required-white-asterisk.gif'){echo "checked";}?>></p></td>

         </tr>





         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;</td>

          <td>&nbsp;</td>

         </tr>





        </table></td>

				<td>&nbsp;</td>

				<td valign="top">

				<p align="center"><table border="0" id="table3" width="210">



         <tr>

          <td colspan="3">

			<p align="center"><font face="Verdana" size="2">Choose validation

			arrows<br>

			(right side of form)<br>

			Viewable upon clicking <br>

			the submit button.<br>

			&nbsp;</font></td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			1.</font></b></td>

          <td align="center"><img src='./arrow_images/missing.gif'></td>

          <td><p><input type="radio" value="missing.gif" name="validation_arrow" <?php if ($validation_arrow == 'missing.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			2.</font></b></td>

          <td align="center"><img src='./arrow_images/missing-exclamation.gif'></td>

          <td><p><input type="radio" value="missing-exclamation.gif" name="validation_arrow" <?php if ($validation_arrow == 'missing-exclamation.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			3.</font></b></td>

          <td align="center"><img src='./arrow_images/missing-red-lg-arrow.gif'></td>

          <td><p><input type="radio" value="missing-red-lg-arrow.gif" name="validation_arrow" <?php if ($validation_arrow == 'missing-red-lg-arrow.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			4.</font></b></td>

          <td align="center"><img src='./arrow_images/missing-red-skinny-arrow.gif'></td>

          <td><p><input type="radio" value="missing-red-skinny-arrow.gif" name="validation_arrow" <?php if ($validation_arrow == 'missing-red-skinny-arrow.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			5.</font></b></td>

          <td align="center"><img src='arrow_images/missing-pencil.gif' width="22" height="22"></td>

          <td><p><input type="radio" value="missing-pencil.gif" name="validation_arrow" <?php if ($validation_arrow == 'missing-pencil.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

         </tr>



         <tr>

          <td width="50"><b><font face="Arial" size="2" color="#383838">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			6.</font></b></td>

          <td bgcolor="#333333" align="center"><img src='./arrow_images/missing-white-skinny-arrow.gif'></td>

          <td><p><input type="radio" value="missing-white-skinny-arrow.gif" name="validation_arrow" <?php if ($validation_arrow == 'missing-white-skinny-arrow.gif'){echo "checked";}?>></p></td>

         </tr>



         <tr>

          <td width="50">&nbsp;</td>

          <td align="center">&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



        </table></td>

			</tr>

		</table>

		</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">&nbsp;</td>



       <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><div align="left">

        <hr>

        </div>

       </td>



       <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">

		<p align="center"><font face="Verdana"><font size="1">&nbsp; 
		<a name="borders"></a> </font><b><br>

		<font color="#000080">

		<u>Choose Your Borders</u></font></b><font color="#000080">:</font><font size="1"><br>

&nbsp; <br>

&nbsp;</font></font></td>



       <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">

		<p align="center"><table border="0" cellpadding="0" cellspacing="0" id="table4">

  	 <tr>

          <td align="left" colspan="6"><font face="Verdana" size="2">

			Choose from any of the

			<b>40</b> web form border styles below. <br>Or, you can choose to

			have <b>no</b> border at all.</font></td>

         </tr>



         <tr>

          <td align="left" colspan="6">&nbsp;</td>

  	 </tr>



         <tr>

          <td align="left"><input type="radio" value="./Border/border1" name="path_to_border_images" <?php if (preg_match("/\/Border\/border1/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border1.gif" width="123" height="80"></td>

          <td align="left">

			<p align="left"><input type="radio" value="./Border/border2" name="path_to_border_images" <?php if (preg_match("/\/Border\/border2/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border2.gif" width="122" height="77"></td>

          <td align="left"><input type="radio" value="./Border/border3" name="path_to_border_images" <?php if (preg_match("/\/Border\/border3/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border3.gif" width="123" height="78"></td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left"><p align="center">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">

			<input type="radio" value="./Border/border4" name="path_to_border_images" <?php if (preg_match("/\/Border\/border4/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border4.gif" width="119" height="76"></td>

          <td align="left">

			<input type="radio" value="./Border/border5" name="path_to_border_images" <?php if (preg_match("/\/Border\/border5/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border5.gif" width="121" height="77"></td>

          <td align="left">

			<input type="radio" value="./Border/border6" name="path_to_border_images" <?php if (preg_match("/\/Border\/border6/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border6.gif" width="126" height="78"></td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">

			<input type="radio" value="./Border/border7" name="path_to_border_images" <?php if (preg_match("/\/Border\/border7/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border7.gif" width="126" height="81"></td>

          <td align="left">

			<input type="radio" value="./Border/border8" name="path_to_border_images" <?php if (preg_match("/\/Border\/border8/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border8.gif" width="124" height="79"></td>

          <td align="left">

			<input type="radio" value="./Border/border9" name="path_to_border_images" <?php if (preg_match("/\/Border\/border9/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border9.gif" width="125" height="79"></td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">

			<input type="radio" value="./Border/border10" name="path_to_border_images" <?php if (preg_match("/\/Border\/border10/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border10.gif" width="125" height="75"></td>

          <td align="left">

			<input type="radio" value="./Border/border11" name="path_to_border_images" <?php if (preg_match("/\/Border\/border11/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border11.gif" width="127" height="83"></td>

          <td align="left">

			<input type="radio" value="./Border/border12" name="path_to_border_images" <?php if (preg_match("/\/Border\/border12/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border12.gif" width="127" height="83"></td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



         <tr>

          <td align="left">

			<input type="radio" value="./Border/border13" name="path_to_border_images" <?php if (preg_match("/\/Border\/border13/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border13.gif" width="127" height="84"></td>

          <td align="left">

			<input type="radio" value="./Border/border14" name="path_to_border_images" <?php if (preg_match("/\/Border\/border14/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border14.gif" width="128" height="85"></td>

          <td align="left">

			<input type="radio" value="./Border/border15" name="path_to_border_images" <?php if (preg_match("/\/Border\/border15/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border15.gif" width="125" height="82"></td>

         </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

      	 </tr>



         <tr>

          <td align="left">&nbsp;</td>

          <td align="left">

			<div align="left">

			&nbsp;</div>

			</td>

          <td align="left">&nbsp;</td>

          <td align="left">

			&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">

			&nbsp;</td>

         </tr>



         <tr>

          <td align="left">

			<input type="radio" value="./Border/border16" name="path_to_border_images" <?php if (preg_match("/\/Border\/border16/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border16.gif" width="126" height="84"></td>

          <td align="left">

			<input type="radio" value="./Border/border17" name="path_to_border_images" <?php if (preg_match("/\/Border\/border17/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border17.gif" width="126" height="82"></td>

          <td align="left">

			<input type="radio" value="./Border/border18" name="path_to_border_images" <?php if (preg_match("/\/Border\/border18/",$path_to_border_images)){echo "checked";}?>></td>

          <td align="left">

			<img border="0" src="border_samples/border18.gif" width="125" height="82"></td>

         </tr>



         <tr>

          <td align="left"></td>

          <td align="left">&nbsp;</td>

          <td align="left"></td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

          <td align="left">&nbsp;</td>

         </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>



         <td align="left">&nbsp;</td>



         <td align="left">

			&nbsp;</td>



        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border19" name="path_to_border_images" <?php if (preg_match("/\/Border\/border19/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border19.gif" width="126" height="84"></td>

         <td align="left">

			<input type="radio" value="./Border/border20" name="path_to_border_images" <?php if (preg_match("/\/Border\/border20/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border20.gif" width="128" height="83"></td>

         <td align="left">

			<input type="radio" value="./Border/border21" name="path_to_border_images" <?php if (preg_match("/\/Border\/border21/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border21.gif" width="128" height="85"></td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border22" name="path_to_border_images" <?php if (preg_match("/\/Border\/border22/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border22.gif" width="126" height="83"></td>

         <td align="left">

			<input type="radio" value="./Border/border23" name="path_to_border_images" <?php if (preg_match("/\/Border\/border23/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border23.gif" width="127" height="85"></td>

         <td align="left">

			<input type="radio" value="./Border/border24" name="path_to_border_images" <?php if (preg_match("/\/Border\/border24/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border24.gif" width="127" height="86"></td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border25" name="path_to_border_images" <?php if (preg_match("/\/Border\/border25/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border25.gif" width="127" height="85"></td>

         <td align="left">

			<input type="radio" value="./Border/border26" name="path_to_border_images" <?php if (preg_match("/\/Border\/border26/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border26.gif" width="122" height="79"></td>

         <td align="left">

			<input type="radio" value="./Border/border27" name="path_to_border_images" <?php if (preg_match("/\/Border\/border27/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border27.gif" width="123" height="81"></td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border28" name="path_to_border_images" <?php if (preg_match("/\/Border\/border28/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border28.gif" width="124" height="83"></td>

         <td align="left">

			<input type="radio" value="./Border/border29" name="path_to_border_images" <?php if (preg_match("/\/Border\/border29/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border29.gif" width="118" height="75"></td>

         <td align="left">

			<input type="radio" value="./Border/border30" name="path_to_border_images" <?php if (preg_match("/\/Border\/border30/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border30.gif" width="117" height="75"></td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border31" name="path_to_border_images" <?php if (preg_match("/\/Border\/border31/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border31.gif" width="119" height="76"></td>

         <td align="left">

			<input type="radio" value="./Border/border32" name="path_to_border_images" <?php if (preg_match("/\/Border\/border32/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border32.gif" width="117" height="73"></td>

         <td align="left">

			<input type="radio" value="./Border/border33" name="path_to_border_images" <?php if (preg_match("/\/Border\/border33/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border33.gif" width="125" height="81"></td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border34" name="path_to_border_images" <?php if (preg_match("/\/Border\/border34/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border34.gif" width="129" height="86"></td>

         <td align="left">

			<input type="radio" value="./Border/border35" name="path_to_border_images" <?php if (preg_match("/\/Border\/border35/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border35.gif" width="128" height="85"></td>

         <td align="left">

			<input type="radio" value="./Border/border36" name="path_to_border_images" <?php if (preg_match("/\/Border\/border36/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border36.gif" width="127" height="84"></td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border37" name="path_to_border_images" <?php if (preg_match("/\/Border\/border37/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border37.gif" width="130" height="86"></td>

         <td align="left">

			<input type="radio" value="./Border/border38" name="path_to_border_images" <?php if (preg_match("/\/Border\/border38/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border38.gif" width="128" height="85"></td>

         <td align="left">

			<input type="radio" value="./Border/border39" name="path_to_border_images" <?php if (preg_match("/\/Border\/border39/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border39.gif" width="131" height="88"></td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">

			<input type="radio" value="./Border/border40" name="path_to_border_images" <?php if (preg_match("/\/Border\/border40/",$path_to_border_images)){echo "checked";}?>></td>

         <td align="left">

			<img border="0" src="border_samples/border40.gif" width="121" height="78"></td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">

			&nbsp;</td>

        </tr>



        <tr>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

         <td align="left">&nbsp;</td>

        </tr>



        <tr>

         <td align="left" height="40"><p><input type="checkbox" name="use_border" value="no" <?php if($use_border == 'no'){echo "checked";} ?>></p></td>

         <td align="left" height="40" colspan="5"><font face="Verdana" size="2">&nbsp; <b>

			Check box to have NO border.</b></font></td>

        </tr>



        <tr>

         <td align="left" height="40">&nbsp;</td>

         <td align="left" height="40" colspan="5"><font face="Verdana" size="2">

			<b>Note</b>: Most of the above border images are semi-transparent. So the

			background color of your webpage can show through part of the border

			image.

			But most people just have white backgrounds.</font></td>

        </tr>



        </table></td>



       <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">&nbsp;</td>



       <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><input type="submit" value="Save Changes"><font size="1"><br>

&nbsp;</font><br>

		<font face="Verdana" size="2"><b>Note</b>: All &quot;Save Changes&quot; buttons on this

		Web Form Designer function the same.<br>

		Pressing any of the &quot;Save Changes&quot; buttons will save all of your

		choices.</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="left" colspan="3">

		<p align="center"><font face="Verdana"><font size="1">&nbsp; 
		<a name="security"></a> </font><b><br>

		<font color="#000080">

		<u>Choose Your Security Style</u></font></b><font color="#000080">:</font></font></p>

		<p align="center"><font face="Verdana" size="2">This is what stops the spam robots! <br>

		Click

		the button next to the <b>Security Choice</b> you prefer. <br>

		Then also choose the

		<b>Security <u>Number</u> </b>you wish to use.</font><br>

&nbsp;</p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="left" colspan="3">
		<p align="center"><font face="Verdana" size="2"><font color="#000080"><b>Security

		Choice A</b>:</font> <input type="radio" name="security_level" value="highest" <?php if ($security_level == 'highest'){echo "checked";} ?>><br>

		&nbsp;<br>

		<b>Note</b>: If you are viewing this Designer Panel from your own 
		website (after uploading the full package to your server), and if you do 
		not see images 1 - 5 below, then your PHP version does not have <b>GD 
		Support enabled with Free Type</b>. <br>
		So then choose Security Choice B. It is <u>very</u> secure also.<br>

&nbsp;<br>

		Choose your CAPTCHA security code style:<br>&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><div align="center">



        <table border="0" id="table3" width="500">

         <tr>

          <td><font color="#393939" face="Arial" size="2"><b>1.</b></font></td>

          <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          <td><img src="./inc/turing-image1.php" alt="Style 1" id="captcha1"></td>

          <td><p><input type="radio" value="./inc/turing-image1.php" name="turing_image_url" <?php if (preg_match("/turing\-image1\.php/",$turing_image_url)){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadCaptcha(1);"></td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td>&nbsp;</td>

          <td width="50">&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td><b><font face="Arial" size="2" color="#393939">2.</font></b></td>

          <td width="50">&nbsp;</td>

          <td><img src="./inc/turing-image2.php" alt="Style 2" id="captcha2"></td>

          <td><p><input type="radio" value="./inc/turing-image2.php" name="turing_image_url" <?php if (preg_match("/turing\-image2\.php/",$turing_image_url)){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadCaptcha(2);"></td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td>&nbsp;</td>

          <td width="50">&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td><b><font face="Arial" size="2" color="#393939">3.</font></b></td>

          <td width="50">&nbsp;</td>

          <td><img src="./inc/turing-image3.php" alt="Style 3" id="captcha3"></td>

          <td><p><input type="radio" value="./inc/turing-image3.php" name="turing_image_url" <?php if (preg_match("/turing\-image3\.php/",$turing_image_url)){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadCaptcha(3);"></td>

          <td><p align="left">&nbsp;</td>

         </tr>



         <tr>

          <td>&nbsp;</td>

          <td width="50">&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td><b><font face="Arial" size="2" color="#393939">4.</font></b></td>

          <td width="50">&nbsp;</td>

          <td><img src="./inc/turing-image4.php" alt="Style 4" id="captcha4"></td>

          <td><p><input type="radio" value="./inc/turing-image4.php" name="turing_image_url" <?php if (preg_match("/turing\-image4\.php/",$turing_image_url)){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadCaptcha(4);"></td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td>&nbsp;</td>

          <td width="50">&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td><b><font face="Arial" size="2" color="#393939">5.</font></b></td>

          <td width="50">&nbsp;</td>

          <td><img src="./inc/turing-image5.php" alt="Style 5" id="captcha5"></td>

          <td><p><input type="radio" value="./inc/turing-image5.php" name="turing_image_url" <?php if (preg_match("/turing\-image5\.php/",$turing_image_url)){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadCaptcha(5);"></td>

          <td>&nbsp;</td>

         </tr>



        </table></div>

       </td>



       <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="left" colspan="3">
		<p align="center"><font face="Verdana" size="2"><font color="#000080"><b>Security

		Choice B</b>:</font> <input type="radio" name="security_level" value="high" <?php if ($security_level == 'high'){echo "checked";} ?>><br>

		<br>

		The below is a

		random <b><u>image</u></b> security code.<br>

		Also very secure.<br>

		Choose your image security code text font:<br>&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><div align="center">

        <table border="0" id="table3" width="500">



         <tr>

          <td width="25"><font color="#393939" face="Arial" size="2"><b>6.</b></font></td>

          <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          <td width='200'>



	   <table border='0' cellpadding='1' cellspacing='1'>

            <tr>

             <td><img src='./fonts/timesroman/B.gif' id='captcha6_1'></td>

             <td><img src='./fonts/timesroman/L.gif' id='captcha6_2'></td>

             <td><img src='./fonts/timesroman/S.gif' id='captcha6_3'></td>

             <td><img src='./fonts/timesroman/E.gif' id='captcha6_4'></td>

            </tr>

           </table>



           </td>

          <td><p><input type="radio" value="timesroman" name="turing_image_font" <?php if ($turing_image_font == 'timesroman'){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadLetters('timesroman')"></td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td>&nbsp;</td>

          <td width="50">&nbsp;</td>

          <td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td><font color="#393939" face="Arial" size="2"><b>7.</b></font></td>

          <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          <td width='200'>



	   <table border='0' cellpadding='1' cellspacing='1'>

            <tr>

             <td><img src='./fonts/verdana/B.gif' id='captcha7_1'></td>

             <td><img src='./fonts/verdana/L.gif' id='captcha7_2'></td>

             <td><img src='./fonts/verdana/S.gif' id='captcha7_3'></td>

             <td><img src='./fonts/verdana/E.gif' id='captcha7_4'></td>

            </tr>

           </table>



          </td>

          <td><p><input type="radio" value="verdana" name="turing_image_font" <?php if ($turing_image_font == 'verdana'){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadLetters('verdana')"></td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td>&nbsp;</td>

          <td width="50">&nbsp;</td>

          <td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

         </tr>





         <tr>

          <td><font color="#393939" face="Arial" size="2"><b>8.</b></font></td>

          <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

          <td width='200'>





	   <table border='0' cellpadding='1' cellspacing='1'>

            <tr>

             <td><img src='./fonts/hand/B.gif' id='captcha8_1'></td>

             <td><img src='./fonts/hand/L.gif' id='captcha8_2'></td>

             <td><img src='./fonts/hand/S.gif' id='captcha8_3'></td>

             <td><img src='./fonts/hand/E.gif' id='captcha8_4'></td>

            </tr>

           </table>



          </td>

          <td><p><input type="radio" value="hand" name="turing_image_font" <?php if ($turing_image_font == 'hand'){echo "checked";}?>></p></td>

          <td align="center" valign="middle"><input type=button value="Refresh" onClick="reloadLetters('hand')"></td>

          <td>&nbsp;</td>

         </tr>



         <tr>

          <td>&nbsp;</td>

          <td width="50">&nbsp;</td>

          <td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

         </tr>



        </table></div>

       </td>



       <td width="20">&nbsp;</td>

      </tr>



      <tr>

       <td width="20">&nbsp;</td>

       <td align="center" colspan="3" height="30"><hr></td>

       <td width="20">&nbsp;</td>

      </tr>



      <tr>

       <td width="20">&nbsp;</td>

       <td align="center" colspan="3" height="30"><p><font face="Verdana" size="2">
		<font color="#000080"><b>

		Security Choice C</b>:</font> <input type="radio" name="security_level" value="medium" <?php if ($security_level == 'medium'){echo "checked";} ?>><br>

		<br>

		The below is actual browser text.<br>

		Choose from the below random browser text fonts if you wish.<br>

		&nbsp;</font></td>

       <td width="20">&nbsp;</td>

      </tr>



      <tr>

       <td width="20">&nbsp;</td>

       <td align="center" colspan="3" height="30">
		<table border="0" id="table6" width="500">
			<tr>
				<td width="20"><b><font color="#383838" face="Verdana" size="2">9.</font></b></td>
				<td width="107" align="center"><font face="Verdana" size="2">Verdana</font></td>
				<td valign="bottom" width="150">&nbsp;<b><font face="Verdana" size="5"><span id='textVerdana'>DGWI</span></font></b></td>
				<td>
				<input type="radio" value="verdana" name="turing_text_font" <?php if ($turing_text_font == 'verdana'){echo "checked";}?>></td>
				<td align="center">
				<input type=button value="Refresh" onClick="reloadText('textVerdana')"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="107" align="center">&nbsp;</td>
				<td width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><b><font face="Verdana" size="2" color="#383838">10.</font></b></td>
				<td width="107" align="center"><font face="Verdana" size="2">Times

			Roman</font></td>
				<td width="150">&nbsp;&nbsp; <b><font size="5">
				<span id='textTimesRoman'>PIWA</span></font></b></td>
				<td>
				<input type="radio" value="times new roman" name="turing_text_font" <?php if ($turing_text_font == 'times new roman'){echo "checked";}?>></td>
				<td align="center">
				<input type=button value="Refresh" onClick="reloadText('textTimesRoman')"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="107" align="center">&nbsp;</td>
				<td width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><b><font face="Verdana" size="2" color="#383838">11.</font></b></td>
				<td width="107" align="center"><font face="Verdana" size="2">Algerian</font></td>
				<td width="150">&nbsp;&nbsp; <b><font size="5" face="Algerian">
				<span id='textAlgerian'>PSVG</span></font></b></td>
				<td>
				<input type="radio" value="algerian" name="turing_text_font" <?php if ($turing_text_font == 'algerian'){echo "checked";}?>></td>
				<td align="center">
				<input type=button value="Refresh" onClick="reloadText('textAlgerian')"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="107" align="center"><font face="Verdana" size="2">&nbsp;</font></td>
				<td width="150">&nbsp;</td>
				<td>&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><b><font face="Verdana" size="2" color="#383838">12.</font></b></td>
				<td width="107" align="center"><font face="Verdana" size="2">Arial</font></td>
				<td width="150">&nbsp;&nbsp; <b>
				<font size="5" face="Arial Rounded MT Bold">
				<span id='textArial'>KNCD</span></font></b></td>
				<td>
				<input type="radio" value="arial" name="turing_text_font" <?php if ($turing_text_font == 'arial'){echo "checked";}?>></td>
				<td align="center">
				<input type=button value="Refresh" onClick="reloadText('textArial')"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="107" align="center"><font face="Verdana" size="2">&nbsp;</font></td>
				<td width="150">&nbsp;</td>
				<td>&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><b><font face="Verdana" size="2" color="#383838">13.</font></b></td>
				<td width="107" align="center">Courier</td>
				<td width="150">&nbsp;&nbsp; <b>
				<font size="5" face="Courier New"><span id='textCourier'>DMSK</span></font></b></td>
				<td>
				<input type="radio" value="courier" name="turing_text_font" <?php if ($turing_text_font == 'courier'){echo "checked";}?>></td>
				<td align="center">
				<input type=button value="Refresh" onClick="reloadText('textCourier')"></td>
				<td>&nbsp;</td>
			</tr>
		</table>



       </td>

       <td width="20">&nbsp;</td>

      </tr>



      </table>



     <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table54">



     <tr>

      <td align="center">&nbsp;</td>

     </tr>



     </table>



     <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">

      <tr>

       <td width="20">&nbsp;</td>

       <td align="right" valign="top" colspan="3"><hr></td>

       <td width="20">&nbsp;</td>

      </tr>



      <tr>

       <td width="20">&nbsp;</td>

       <td align="right" valign="top">&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td width="20">&nbsp;</td>

      </tr>



      <tr>

       <td width="20"><font face="Verdana" size="2">&nbsp;</font></td>

       <td align="right" valign="top"><font face="Verdana" size="2">Number of attempts allowed

		for<br>

		all the above security code styles:</font></td>

       <td>&nbsp;</td>

       <td><p><input type="text" name="num_guesses" value="<?php echo $num_guesses; ?>" size="5"> <font face="Verdana" size="1" color="#393939">10 is the default</font></p></td>

       <td width="20">&nbsp;</td>

      </tr>



      <tr>

       <td colspan="5"><font size="1">&nbsp;</font></td>

      </tr>



      <tr>

       <td width="20">&nbsp;</td>

       <td align="right"><font face="Verdana" size="2">Number of characters in security image:</font></td>

       <td>&nbsp;</td>

       <td><input type="text" name="length" value="<?php echo $length; ?>" size="5"> <font face="Verdana" size="1" color="#393939">4 is the maximum and is the default</font></td>

       <td width="20">&nbsp;</td>

      </tr>



      <tr>

       <td width="20">&nbsp;</td>

       <td align="right">&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td width="20">&nbsp;</td>

      </tr>

     </table>



     <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table8">

      <tr>

       <td width="20">&nbsp;</td>

       <td align="right"><hr></td>

       <td width="20">&nbsp;</td>

      </tr>

      <tr>

       <td width="20">&nbsp;</td>

       <td align="right"><p align="center"><font face="Verdana" size="2">
		<font color="#000080"><b>

		Security Choice D</b>:</font> <input type="radio" name="security_level" value="lowest" <?php if ($security_level == 'lowest'){echo "checked";} ?>><br>

		&nbsp;<br>

		Choose this one to have <b>no</b> security code. <br>

		Your email address is

		still hidden from spam robots. <br>

		But this selection is not as secure.</font></td>

       <td width="20">&nbsp;</td>

      </tr>

     </table>



     <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">



      <tr>

       <td width="20">&nbsp;</td>

       <td align="right"><div align="center">

        </div>



      	</td>

      <td width="20">&nbsp;</td>



     </tr>



      </table>



     <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table55">



     <tr>

      <td align="center"><input type="submit" value="Save Changes"></td>

     </tr>



    </table>



    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" colspan="4" height="30"><hr></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" colspan="4" height="30">

		<p align="center"><font face="Verdana"><font size="1">&nbsp; 
		<a name="interior"></a> </font><b><br>

		<font color="#000080">

		<u>Choose Your Interior Colors</u></font></b><font color="#000080">:</font><font size="1"><br>

&nbsp; <br>

&nbsp;</font></font></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="center" rowspan="7" valign="top" width="4%">

		&nbsp;</td>

      <td align="right" colspan="3" valign="top">

		<p align="left"><font face="Verdana" size="2">Color the background and

		thin <u>inner</u> border of your form if you wish. Add color

		of your choice. Most people just choose white, or a very light color.<br>

		&nbsp;<br>

		Besides the graphic borders that come with the forms, you can have a

		thin colored <b> <u>inner</u></b> border. Experiment with it. Enter a color, <u>

		save</u> your changes, then preview a form below. <br>

&nbsp;</font></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%" rowspan="2">&nbsp;</td>

      <td align="right" valign="top"><font face="Verdana" size="2">Enter a

		HEX color number for <br>

		the iFrame

		background:</font><font face="Verdana" size="1"><b> </b>.</font></td>

      <td width="5%" rowspan="2">&nbsp;</td>

      <td align="left" valign="top" rowspan="2"><p><input type="text" name="iframe_background_color" value="<?php echo $iframe_background_color; ?>" size="20"><br>

		<font face="Verdana" size="2">

		example: enter <b>FFFFFF</b> <br>

		for a white background</font></p></td>

      <td width="3%" rowspan="2"><p>&nbsp;</p><p>&nbsp;</p></td>

     </tr>



     <tr>

      <td align="right" valign="top">

		<p align="left"><font face="Verdana" size="1"><b>Note</b>: <br>

&nbsp;&nbsp; iFrame color is sometimes ignored<br>

&nbsp;&nbsp; because of parent page properties.</font></td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" valign="top">&nbsp;</td>

      <td width="5%">&nbsp;</td>

      <td align="left">&nbsp;</td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" valign="top"><font face="Verdana" size="2">Enter a

		HEX color number for <br>

		the table

		background:</font></td>

      <td width="5%">&nbsp;</td>

      <td align="left"><p><input type="text" name="form_background_color" value="<?php echo $form_background_color; ?>" size="20"><br><font face="Verdana" size="2">

		example: enter <b>F5F5F5</b><br>

		for a grey background</font></p></td>

      <td width="3%"><p>&nbsp;</p><p>&nbsp;</p></td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td width="5%">&nbsp;</td>

      <td align="left">&nbsp;</td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" valign="top"><font face="Verdana" size="2">Enter a

		HEX color number for <br>

		the thin <b> <u>inner</u></b> border:</font></td>

      <td width="5%">&nbsp;</td>

      <td align="left"><p><input type="text" name="form_border_color" value="<?php echo $form_border_color; ?>" size="20"><br><font face="Verdana" size="2">

		example: enter <b>808080</b><br>

		for a <b>dark</b> grey thin border</font></p></td>

      <td width="3%"><p>&nbsp;</p><p>&nbsp;</p></td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" width="4%">&nbsp;</td>

      <td width="39%">&nbsp;</td>

      <td align="left">&nbsp;</td>

      <td width="46%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" width="4%">&nbsp;</td>

      <td colspan="3">
		<p align="center"><input type="submit" value="Save Changes"></td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" width="4%">&nbsp;</td>

      <td width="39%"><a name="colors"></a></td>

      <td align="left">&nbsp;</td>

      <td width="46%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" colspan="2" height="30" valign="top">

		<p align="center"><font face="Verdana" size="2">Here are just a few <br>

		sample colors below<br>

		and their HEX numbers.<br>

&nbsp;</font></td>

      <td align="right" colspan="2" height="30" valign="top">

		<p align="center"><font face="Verdana" size="2">There is a great color

		selector at:<br>

		<a target="window.open" href="http://www.colorschemer.com/online.html">

		http://www.colorschemer.com/online.html</a></font><br>

		<font face="Verdana" size="1">opens in new window</font></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" colspan="4" height="30">

		<div align="center">

			<table border="0" cellpadding="0" cellspacing="0" id="table18">

				<tr>

					<td valign="top">

					<table border="1" width="100%" id="table19" bordercolor="#FFFFFF" cellpadding="3">

						<tr>

							<td align="middle" bgColor="aliceblue" width="60">

							<font face="Verdana" size="2">F0F8FF </font></td>

							<td align="middle" bgColor="navy" width="60">

							<font face="Verdana" size="2" color="#FFFFFF">000080

							</font></td>

							<td align="middle" bgColor="antiquewhite" width="60">

							<font face="Verdana" size="2">FAEBD7 </font></td>

							<td align="middle" bgColor="aqua" width="60">

							<font face="Verdana" size="2">00FFFF </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="aquamarine" width="60">

							<font face="Verdana" size="2">7FFFD4 </font></td>

							<td align="middle" bgColor="olivedrab" width="60">

							<font face="Verdana" size="2">688E23 </font></td>

							<td align="middle" bgColor="azure" width="60">

							<font face="Verdana" size="2">F0FFFF</font></td>

							<td align="middle" bgColor="beige" width="60">

							<font face="Verdana" size="2">F5F5DC </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="bisque" width="60">

							<font face="Verdana" size="2">FFE4C4 </font></td>

							<td align="middle" bgColor="orchid" width="60">

							<font face="Verdana" size="2">DA70D6 </font></td>

							<td align="middle" bgColor="black" width="60">

							<font face="Verdana" size="2"><font color="#ffffff">

							000000</font> </font></td>

							<td align="middle" bgColor="blanchedalmond" width="60">

							<font face="Verdana" size="2">FFEBCD </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="burlywood" width="60">

							<font face="Verdana" size="2">DEB887 </font></td>

							<td align="middle" bgColor="paleturquoise" width="60">

							<font face="Verdana" size="2">AFEEEE </font></td>

							<td align="middle" bgColor="cadetblue" width="60">

							<font face="Verdana" size="2">5F9EA0 </font></td>

							<td align="middle" bgColor="chartreuse" width="60">

							<font face="Verdana" size="2">7FFF00 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="chocolate" width="60">

							<font face="Verdana" size="2">D2691E </font></td>

							<td align="middle" bgColor="peachpuff" width="60">

							<font face="Verdana" size="2">FFDAB9 </font></td>

							<td align="middle" bgColor="coral" width="60">

							<font face="Verdana" size="2">FF7F50 </font></td>

							<td align="middle" bgColor="cornflowerblue" width="60">

							<font face="Verdana" size="2">6495ED </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="cornsilk" width="60">

							<font face="Verdana" size="2">FFF8DC </font></td>

							<td align="middle" bgColor="plum" width="60">

							<font face="Verdana" size="2">DDA0DD </font></td>

							<td align="middle" bgColor="crimson" width="60">

							<font face="Verdana" size="2">DC143C </font></td>

							<td align="middle" bgColor="cyan" width="60">

							<font face="Verdana" size="2">00FFFF </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="darkblue" width="60">

							<font face="Verdana" size="2" color="#FFFFFF">00008B

							</font></td>

							<td align="middle" bgColor="red" width="60">

							<font face="Verdana" size="2">FF0000 </font></td>

							<td align="middle" bgColor="darkcyan" width="60">

							<font face="Verdana" size="2">008B8B </font></td>

							<td align="middle" bgColor="darkgoldenrod" width="60">

							<font face="Verdana" size="2">B8860B </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="darkgray" width="60">

							<font face="Verdana" size="2">A9A9A9 </font></td>

							<td align="middle" bgColor="saddlebrown" width="60">

							<font face="Verdana" size="2">8B4513 </font></td>

							<td align="middle" bgColor="darkgreen" width="60">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							006400</font> </font></td>

							<td align="middle" bgColor="darkkhaki" width="60">

							<font face="Verdana" size="2">BDB76B </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="darkmagenta" width="60">

							<font face="Verdana" size="2">8B008B </font></td>

							<td align="middle" bgColor="seagreen" width="60">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							2E8B57</font> </font></td>

							<td align="middle" bgColor="darkolivegreen" width="60">

							<font face="Verdana" size="2">556B2F </font></td>

							<td align="middle" bgColor="darkorange" width="60">

							<font face="Verdana" size="2">FF8C00 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="darkorchid" width="60">

							<font face="Verdana" size="2">9932CC </font></td>

							<td align="middle" bgColor="silver" width="60">

							<font face="Verdana" size="2">C0C0C0 </font></td>

							<td align="middle" bgColor="darkred" width="60">

							<font face="Verdana" size="2">8B0000 </font></td>

							<td align="middle" bgColor="darksalmon" width="60">

							<font face="Verdana" size="2">E9967A </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="darkseagreen" width="60">

							<font face="Verdana" size="2">8FBC8F </font></td>

							<td align="middle" bgColor="slategray" width="60">

							<font face="Verdana" size="2">708090 </font></td>

							<td align="middle" bgColor="darkslateblue" width="60">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							483D8B</font> </font></td>

							<td align="middle" bgColor="darkslategray" width="60">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							2F4F4F</font> </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="darkturquoise" width="60">

							<font face="Verdana" size="2">00CED1 </font></td>

							<td align="middle" bgColor="steelblue" width="60">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							4682B4</font> </font></td>

							<td align="middle" bgColor="darkviolet" width="60">

							<font face="Verdana" size="2">9400D3 </font></td>

							<td align="middle" bgColor="deeppink" width="60">

							<font face="Verdana" size="2">FF1493 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="deepskyblue" width="60">

							<font face="Verdana" size="2">00BFFF </font></td>

							<td align="middle" bgColor="thistle" width="60">

							<font face="Verdana" size="2">D8BFD8 </font></td>

							<td align="middle" bgColor="dimgray" width="60">

							<font face="Verdana" size="2">696969 </font></td>

							<td align="middle" bgColor="dodgerblue" width="60">

							<font face="Verdana" size="2">1E90FF </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="firebrick" width="60">

							<font face="Verdana" size="2">B22222 </font></td>

							<td align="middle" bgColor="violet" width="60">

							<font face="Verdana" size="2">EE82EE </font></td>

							<td align="middle" bgColor="floralwhite" width="60">

							<font face="Verdana" size="2">FFFAF0 </font></td>

							<td align="middle" bgColor="forestgreen" width="60">

							<font face="Verdana" size="2">228B22 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="fuchsia" width="60">

							<font face="Verdana" size="2">FF00FF </font></td>

							<td align="middle" bgColor="whitesmoke" width="60">

							<font face="Verdana" size="2">F5F5F5 </font></td>

							<td align="middle" bgColor="gainsboro" width="60">

							<font face="Verdana" size="2">DCDCDC </font></td>

							<td align="middle" bgColor="ghostwhite" width="60">

							<font face="Verdana" size="2">F8F8FF </font></td>

						</tr>

						<tr>

							<td width="60">&nbsp;</td>

						</tr>

					</table>

					</td>

					<td valign="top" width="60">

					<table border="1" width="100%" id="table20" bordercolor="#FFFFFF" cellpadding="3">

						<tr>

							<td align="middle" bgColor="gold" width="70">

							<font face="Verdana" size="2">FFD700 </font></td>

							<td align="middle" bgColor="goldenrod" width="70">

							<font face="Verdana" size="2">DAA520 </font></td>

							<td align="middle" bgColor="gray" width="70">

							<font face="Verdana" size="2">808080 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="green" width="70">

							<font face="Verdana" size="2">008000 </font></td>

							<td align="middle" bgColor="greenyellow" width="70">

							<font face="Verdana" size="2">ADFF2F </font></td>

							<td align="middle" bgColor="honeydew" width="70">

							<font face="Verdana" size="2">F0FFF0 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="hotpink" width="70">

							<font face="Verdana" size="2">FF69B4 </font></td>

							<td align="middle" bgColor="indianred" width="70">

							<font face="Verdana" size="2">CD5C5C </font></td>

							<td align="middle" bgColor="indigo" width="70">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							4B0082</font> </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="ivory" width="70">

							<font face="Verdana" size="2">FFFFF0 </font></td>

							<td align="middle" bgColor="khaki" width="70">

							<font face="Verdana" size="2">F0E68C </font></td>

							<td align="middle" bgColor="lavender" width="70">

							<font face="Verdana" size="2">E6E6FA </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="lavenderblush" width="70">

							<font face="Verdana" size="2">FFF0F5 </font></td>

							<td align="middle" bgColor="lawngreen" width="70">

							<font face="Verdana" size="2">7CFC00 </font></td>

							<td align="middle" bgColor="lemonchiffon" width="70">

							<font face="Verdana" size="2">FFFACD </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="lightblue" width="70">

							<font face="Verdana" size="2">ADD8E6 </font></td>

							<td align="middle" bgColor="lightcoral" width="70">

							<font face="Verdana" size="2">F08080 </font></td>

							<td align="middle" bgColor="lightcyan" width="70">

							<font face="Verdana" size="2">E0FFFF </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="lightgoldenrodyellow" width="70">

							<font face="Verdana" size="2">FAFAD2 </font></td>

							<td align="middle" bgColor="lightgreen" width="70">

							<font face="Verdana" size="2">90EE90 </font></td>

							<td align="middle" bgColor="lightgrey" width="70">

							<font face="Verdana" size="2">D3D3D3 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="lightpink" width="70">

							<font face="Verdana" size="2">FFB6C1 </font></td>

							<td align="middle" bgColor="lightsalmon" width="70">

							<font face="Verdana" size="2">FFA07A </font></td>

							<td align="middle" bgColor="lightseagreen" width="70">

							<font face="Verdana" size="2">20B2AA </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="lightskyblue" width="70">

							<font face="Verdana" size="2">87CEFA </font></td>

							<td align="middle" bgColor="lightslategray" width="70">

							<font face="Verdana" size="2">778899 </font></td>

							<td align="middle" bgColor="lightsteelblue" width="70">

							<font face="Verdana" size="2">B0C4DE </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="linen" width="70">

							<font face="Verdana" size="2">FAF0E6 </font></td>

							<td align="middle" bgColor="magenta" width="70">

							<font face="Verdana" size="2">FF00FF </font></td>

							<td align="middle" bgColor="maroon" width="70">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							800000</font> </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="mediumaquamarine" width="70">

							<font face="Verdana" size="2">66CDAA </font></td>

							<td align="middle" bgColor="mediumblue" width="70">

							<font face="Verdana" size="2" color="#FFFFFF">0000CD

							</font></td>

							<td align="middle" bgColor="mediumorchid" width="70">

							<font face="Verdana" size="2">BA55D3 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="mediumpurple" width="70">

							<font face="Verdana" size="2">9370D8 </font></td>

							<td align="middle" bgColor="mediumseagreen" width="70">

							<font face="Verdana" size="2">3CB371 </font></td>

							<td align="middle" bgColor="mediumslateblue" width="70">

							<font face="Verdana" size="2">7B68EE </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="mediumspringgreen" width="70">

							<font face="Verdana" size="2">00FA9A </font></td>

							<td align="middle" bgColor="mediumturquoise" width="70">

							<font face="Verdana" size="2">48D1CC </font></td>

							<td align="middle" bgColor="mediumvioletred" width="70">

							<font face="Verdana" size="2">C71585 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="midnightblue" width="70">

							<font face="Verdana" size="2" color="#FFFFFF">191970

							</font></td>

							<td align="middle" bgColor="mintcream" width="70">

							<font face="Verdana" size="2">F5FFFA </font></td>

							<td align="middle" bgColor="mistyrose" width="70">

							<font face="Verdana" size="2">FFE4E1 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="yellow" width="70">

							<font face="Verdana" size="2">FFFF00 </font></td>

							<td align="middle" bgColor="yellowgreen" width="70">

							<font face="Verdana" size="2">9ACD32 </font></td>

						</tr>

						<tr>

							<td width="70">&nbsp;</td>

						</tr>

					</table>

					</td>

					<td valign="top" width="60">

					<table border="1" width="100%" id="table21" bordercolor="#FFFFFF" cellpadding="3">

						<tr>

							<td align="middle" bgColor="navajowhite" width="60">

							<font face="Verdana" size="2">FFDEAD </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="olive" width="60">

							<font face="Verdana" size="2">808000 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="orangered" width="60">

							<font face="Verdana" size="2">FF4500 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="palegreen" width="60">

							<font face="Verdana" size="2">98FB98 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="papayawhip" width="60">

							<font face="Verdana" size="2">FFEFD5 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="pink" width="60">

							<font face="Verdana" size="2">FFC0CB </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="purple" width="60">

							<font face="Verdana" size="2">800080 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="royalblue" width="60">

							<font face="Verdana" size="2">4169E1 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="sandybrown" width="60">

							<font face="Verdana" size="2">F4A460 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="sienna" width="60">

							<font face="Verdana" size="2">A0522D </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="slateblue" width="60">

							<font face="Verdana" size="2">6A5ACD </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="springgreen" width="60">

							<font face="Verdana" size="2">00FF7F </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="teal" width="60">

							<font face="Verdana" size="2"><font color="#FFFFFF">

							008080</font> </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="turquoise" width="60">

							<font face="Verdana" size="2">40E0D0 </font></td>

						</tr>

						<tr>

							<td align="middle" bgColor="white" width="60">

							<font face="Verdana" size="2">FFFFFF </font></td>

						</tr>

						</table>

					</td>

				</tr>

			</table>

		</div>

		</td>

      <td width="3%">&nbsp;</td>

     </tr>



     </table>



     <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table56">



     <tr>

      <td align="center"><input type="submit" value="Save Changes"></td>

     </tr>



     <tr>

      <td align="center">&nbsp;</td>

     </tr>



     <tr>

      <td align="center">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" colspan="4" height="30"><hr></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" colspan="4" height="30">

		<p align="center"><font face="Verdana"><font size="1">&nbsp; 
		<a name="text"></a> </font><b><br>

		</b>

		<font color="#000080">

		<u><b>Make Your Text Choices</b></u>:</font><font size="1"><br>

&nbsp; <br>

&nbsp;</font></font></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td>&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top"><font face="Verdana" size="2">Enter a

		HEX color number for <br>

		your form text:</font></td>

      <td>&nbsp;</td>

      <td align="left">
		<input type="text" name="text_color" value="<?php echo $text_color; ?>" size="20"><br><font face="Verdana" size="2">

		example: enter <b>000000</b><br>

		for a <b>black</b> text color - recommended</font></td>

     </tr>



     <tr>

      <td>&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top">&nbsp;</td>

      <td>&nbsp;</td>

      <td align="left">
		&nbsp;</td>

     </tr>



     <tr>

      <td>&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top"><font face="Verdana" size="2">Enter a font 
		name for <br>

		the text style:</font></td>

      <td>&nbsp;</td>

      <td align="left">
		<input type="text" name="font_style" value="<?php echo $font_style; ?>" size="20"><br><font face="Verdana" size="2">

		example: enter <b>Verdana</b><br>

		It is our recommended text style.</font></td>

     </tr>



     <tr>

      <td>&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top">&nbsp;</td>

      <td>&nbsp;</td>

      <td align="left">
		&nbsp;</td>

     </tr>



     <tr>

      <td>&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top"><font face="Verdana" size="2">Enter a

		text size for <br>
		your form field names:</font></td>

      <td>&nbsp;</td>

      <td align="left">
		<input type="text" name="text_size" value="<?php echo $text_size; ?>" size="20"><br><font face="Verdana" size="2">

		example: enter <b>10pt</b><br>

		We recommend a 10pt text size.</font></td>

     </tr>



     <tr>

      <td width="3%" height="40">&nbsp;</td>

      <td align="right" width="4%" height="40">&nbsp;</td>

      <td colspan="3" height="40"><font face="Verdana" size="2">Below are common 
		Font names in order of popularity.</font></td>

     </tr>



     <tr>

      <td colspan="5" align="right">
		<table cellSpacing="3" cellPadding="0" summary="The latest Windows font survey results showing the percentage frequency and bar chart for each font, with extended text samples and image links" border="0" id="table184">
			<thead>
			</thead>
			<tr>
				<th width="30"><span style="font-weight: 400">1</span></th>
				<td class="MicrosoftSansSerif" width="150">
				<font size="2" face="Microsoft Sans Serif">Microsoft&nbsp;Sans&nbsp;Serif</font></td>
				<td class="MicrosoftSansSerif" width="30" align="left">11</td>
				<td class="Tahoma" width="150"><font size="2" face="Tahoma">
				Tahoma</font></td>
				<td class="MicrosoftSansSerif" width="30" align="left">21</td>
				<td class="ComicSansMS" width="150">
				<font size="2" face="Kartika">Kartika</font></td>
			</tr>
			<tr>
				<td class="MicrosoftSansSerif" width="30" align="center">2</td>
				<td class="FranklinGothicMedium" width="150">
				<font face="Franklin Gothic Medium" size="2">
				Franklin&nbsp;Gothic&nbsp;Medium</font></td>
				<td class="FranklinGothicMedium" width="30" align="left">12</td>
				<td class="Sylfaen" width="150"><font face="Sylfaen" size="2">
				Sylfaen</font></td>
				<td class="FranklinGothicMedium" width="30" align="left">22</td>
				<td class="LucidaConsole" width="150">
				<font size="2" face="Book Antiqua">Book&nbsp;Antiqua</font></td>
			</tr>
			<tr>
				<td class="FranklinGothicMedium" width="30" align="center">3</td>
				<td class="ArialBlack" width="150">
				<font face="Arial Black" size="2">Arial&nbsp;Black</font></td>
				<td class="ArialBlack" width="30" align="left">13</td>
				<td class="TrebuchetMS" width="150">
				<font size="2" face="Trebuchet MS">Trebuchet&nbsp;MS</font></td>
				<td class="ArialBlack" width="30" align="left">23</td>
				<td class="CourierNew" width="150">
				<font size="2" face="Monotype Corsiva">Monotype&nbsp;Corsiva</font></td>
			</tr>
			<tr>
				<td class="ArialBlack" width="30" align="center">4</td>
				<td class="PalatinoLinotype" width="150" height="20">
				<font face="Palatino Linotype" size="2">Palatino&nbsp;Linotype</font></td>
				<td class="PalatinoLinotype" height="20" width="30" align="left">
				14</td>
				<td class="TrebuchetMS" width="150">
				<font face="Bradley Hand ITC" size="2">Bradley Hand ITC</font></td>
				<td class="PalatinoLinotype" height="20" width="30" align="left">
				24</td>
				<td class="Impact" width="150"><font size="2" face="Garamond">
				Garamond</font></td>
			</tr>
			<tr>
				<td class="PalatinoLinotype" width="30" height="20" align="center">
				5</td>
				<td class="Verdana" width="150"><font face="Verdana" size="2">
				Verdana</font></td>
				<td class="Verdana" width="30" align="left">15</td>
				<td class="MicrosoftSansSerif" width="150">
				<font size="2" face="Georgia">Georgia</font></td>
				<td class="Verdana" width="30" align="left">25</td>
				<td class="Tahoma" width="150">
				<font face="Lucida Sans" size="2">Lucida&nbsp;Sans</font></td>
			</tr>
			<tr>
				<td class="Verdana" width="30" align="center">6</td>
				<td class="Arial" width="150"><font size="2" face="Arial">Arial</font></td>
				<td class="Arial" width="30" align="left">16</td>
				<td class="FranklinGothicMedium" width="150">
				<font face="Arial Narrow" size="2">Arial&nbsp;Narrow</font></td>
				<td class="Arial" width="30" align="left">26</td>
				<td class="Sylfaen" width="150">
				<font face="MS Reference Sans Serif" size="2">
				MS&nbsp;Reference&nbsp;Sans&nbsp;Serif</font></td>
			</tr>
			<tr>
				<td class="Arial" width="30" align="center">7</td>
				<td class="ComicSansMS" width="150">
				<font size="2" face="Comic Sans MS">Comic&nbsp;Sans&nbsp;MS</font></td>
				<td class="ComicSansMS" width="30" align="left">17</td>
				<td class="ArialBlack" width="150">
				<font face="Century Gothic" size="2">Century&nbsp;Gothic</font></td>
				<td class="ComicSansMS" width="30" align="left">27</td>
				<td class="Sylfaen" width="150">
				<font size="2" face="Script MT Bold">Script MT Bold</font></td>
			</tr>
			<tr>
				<td class="ComicSansMS" width="30" align="center">8</td>
				<td class="LucidaConsole" width="150">
				<font face="Lucida Console" size="2">Lucida&nbsp;Console</font></td>
				<td class="LucidaConsole" width="30" align="left">18</td>
				<td class="PalatinoLinotype" height="20" width="150">
				<font face="Bookman Old Style" size="2">Bookman&nbsp;Old&nbsp;Style</font></td>
				<td class="LucidaConsole" width="30" align="left">28</td>
				<td class="TrebuchetMS" width="150">
				<font size="2" face="Papyrus">Papyrus</font></td>
			</tr>
			<tr>
				<td class="LucidaConsole" width="30" align="center">9</td>
				<td class="CourierNew" width="150">
				<font size="2" face="Courier New">Courier&nbsp;New</font></td>
				<td class="CourierNew" width="30" align="left">19</td>
				<td class="Verdana" width="150"><font size="2" face="Vrinda">
				Vrinda</font></td>
				<td class="CourierNew" width="30" align="left">29</td>
				<td class="CourierNew" width="150">
				<font face="Franklin Gothic Book" size="2">Franklin&nbsp;Gothic&nbsp;Book</font></td>
			</tr>
			<tr>
				<td class="CourierNew" width="30" align="center">10</td>
				<td class="Impact" width="150"><font size="2" face="Impact">
				Impact</font></td>
				<td class="Impact" width="30" align="left">20</td>
				<td class="Arial" width="150">
				<font face="Times New Roman" size="2">Times&nbsp;New&nbsp;Roman</font></td>
				<td class="Impact" width="30" align="left">30</td>
				<td class="Impact" width="150"><font face="Perpetua" size="2">
				Perpetua</font></td>
			</tr>
		</table>
		</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" width="4%">&nbsp;</td>

      <td width="39%">&nbsp;</td>

      <td align="left">&nbsp;</td>

      <td width="46%">&nbsp;</td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" width="4%">&nbsp;</td>

      <td colspan="3">
		<p align="center"><input type="submit" value="Save Changes"></td>

     </tr>



     <tr>

      <td width="3%">&nbsp;</td>

      <td align="right" width="4%">&nbsp;</td>

      <td width="39%">&nbsp;</td>

      <td align="left">&nbsp;</td>

      <td width="46%">&nbsp;</td>

     </tr>



     </table>
		</td>

     </tr>



    </table>


    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">

     <tr>

      <td width="20">&nbsp;</td>

      <td width="300" align="right">&nbsp;</td>

      <td width="20">&nbsp;</td>

      <td align="left">&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><p align="center"><a name="terms"></a></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">
		<p align="center">&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">
		<p align="center"><font face="Verdana" color="#000080"><u><b>Agreement 
		To Terms Form</b></u>:</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     </table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table187">



     <tr>

      <td width="1%">&nbsp;</td>

      <td align="right" width="1%">&nbsp;</td>

      <td align="center" valign="top" width="56%"><font face="Verdana" size="2">&nbsp;<br>
		If using the 
		&quot;<b>Agreement To Terms Form</b>&quot;, <br>
		then enter your text in the below:<br>
&nbsp;</font></td>

      <td align="center" valign="top" width="42%"><font face="Verdana" size="2">
		Here are a few HTML commands:</font><font face="Verdana" size="1"><br>
&nbsp;</font><font face="Verdana" size="2"><br>
		for a line break<font color="#0000CC">&lt;br&gt;</font> </font>
		<font face="Verdana" size="1">
		<br>
&nbsp;</font><font face="Verdana" size="2">&nbsp;<font color="#0000CC">&lt;u&gt;</font>your <u>underlined</u> text<font color="#0000CC">&lt;/u&gt;<br>
		&lt;b&gt;</font>your <b>bold</b> text<font color="#0000CC">&lt;/b&gt;<br>
&nbsp;&lt;i&gt;</font>your <i>italics</i> text<font color="#0000CC">&lt;/i&gt;</font></font></td>

     </tr>



     <tr>

      <td width="1%">&nbsp;</td>

      <td align="right" width="1%">&nbsp;</td>

      <td align="right" valign="top" colspan="2">
		<p align="left"><font face="Verdana" size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Enter your 
		<b>Agreement To Terms</b> text here:</font></td>

     </tr>

     </table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><p align="center">
			<p align="center"><textarea rows="6" name="terms" cols="65"><?php echo $terms; ?></textarea></p>
		</td>

      <td width="20">&nbsp;</td>

     </tr>

     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">
		<p align="center"><font face="Verdana" size="2"><b>Note</b>: When using 
		the Agreement To Terms Form, the &quot;Thank You&quot; option<br>
		you select will direct the visitor to the next page of your choice.<br>
&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">
		<p align="center"><input type="submit" value="Save Changes"></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">
		<p align="center"><font face="Verdana" size="2"><b>&nbsp;<br>
		Also</b>: You will receive an email every time someone enters that 
		portion of your website.&nbsp; If your website gets a lot of traffic, 
		then you might want to turn off email notifications. Open the file 
		configbwf.php in a text editor and change the line</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3" bgcolor="#EEEEEE">
		<p align="center"><font face="Verdana" size="2">$send_emails = 'yes';&nbsp;&nbsp;
		<font color="#0000FF"><b>to</b></font>&nbsp;&nbsp; $send_emails = 'no';</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">
		<p align="center"><font face="Verdana" size="2">Although, this will turn off all emails from all your forms in that 
		directory.</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="5">
		<div align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table188">
				<tr>

      <td width="3%">&nbsp;</td>

      <td align="right" colspan="4" height="30">

		<p align="center"><font face="Verdana"><font size="1">&nbsp; 
		<a name="subject"></a> </font><b><br>

		</b>

		<font color="#000080">

		<u><b>Set Your Subject Text</b></u>:</font><font size="1"><br>

&nbsp; <br>

		</font><font size="2">If you are using a form that does not have a 
		subject field that the user fills in,<br>
		such as with the Subscription form, then this will define the subject 
		for <u><b>all</b></u><br>
		the web forms that do not have a subject field.<br>
&nbsp;</font></font></td>

      <td width="3%">&nbsp;</td>

     			</tr>
				<tr>

      <td>&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top"><font face="Verdana" size="2">Enter your 
		subject form text:</font></td>

      <td>&nbsp;</td>

      <td align="left" colspan="2">
		<input type="text" name="subject_hidden_field" value="<?php echo $subject_hidden_field; ?>" size="40"><br><font face="Verdana" size="2">

		<b>example</b>: Your online form has been submitted.</font></td>

     			</tr>
				<tr>

      <td>&nbsp;</td>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top">&nbsp;</td>

      <td>&nbsp;</td>

      <td align="left" colspan="2">
		&nbsp;</td>

     			</tr>
				<tr>
					<td colspan="6" height="30">
					<hr width="93%"></td>
				</tr>
			</table>
		</div>
		</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30">

		<font face="Verdana" color="#000080">&nbsp;<a name="password"></a><br>
		<b>

		<u>

		Change Your Password:</u></b><br>
&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td valign="top"><p align="right"><font face="Verdana" size="2">Change Your username:</font></td>

      <td>&nbsp;</td>

      <td><p><input type="text" name="admin_username" size="20"></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td valign="top"><p align="right"><font face="Verdana" size="2">Change Your Password:</font></td>

      <td>&nbsp;</td>

      <td><p><input type="text" name="admin_password" size="20"></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td valign="top" colspan="3"><p align="center"><font face="Verdana" size="1">Note: &quot;admin&quot; is the username 
		<u>and</u> password that originally is installed.</font></td>

      <td width="20">&nbsp;<br><br></td>

     </tr>



     <tr>

      <td colspan="5" align="center"><input type="submit" value="Save Changes"></td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td width="300" align="right">&nbsp;</td>

      <td width="20">&nbsp;</td>

      <td align="left">&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3" height="30"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">
		<p align="center"><a name="thanks"></a></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><p align="center"><u>

		<font face="Verdana" color="#000080"><b>

		Choose your Thank You page option:</b></font></u><font face="Verdana" size="2"><br>

&nbsp; <br>

		After a visitor sends an email using the web form, they can then be

		routed <br>

		to a &quot;thank you&quot; page, or see a &quot;thank you&quot; message.<br>

		Make your choice below:<br>
&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="5">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table185">
			<tr>
				<td width="35" valign="top">

		<p align="center"><b><font face="Verdana" size="2">1.</font></b></td>

      <td width="300" align="left" valign="top"><font face="Verdana" size="2">I

		choose my own custom page and URL. Then insert the full url path and

		page name here:</font></td>

      <td width="20">&nbsp;</td>

      <td align="left"><p><input type="radio" name="custom_thankyou_page" value="custom" <?php if ($custom_thankyou_page == 'custom' || $custom_thankyou_page == ''){echo 'checked';} ?>><br>

		<input type="text" name="thank_you_url" value="<?php echo $thank_you_url; ?>" size="40"><br>
		<font face="Verdana" size="2">&quot;<b>absolute path</b>&quot; link example: <br>
		http://bestwebforms.com/testthankyou.php<br>
		&quot;<b>relative path</b>&quot; link example:<br>
		../../formthankyou.php</font></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="6" height="25">&nbsp;</td>

     </tr>



     <tr>

      <td width="35" valign="top">

		<p align="center"><b><font face="Verdana" size="2">2.</font></b></td>

       <td width="300" align="left" valign="top"><font face="Verdana" size="2">I choose to use a

		&quot;system pop-up&quot; box.

		Then redirect the sender to a page

		of my choice. Enter the page URL:</font></td>

      <td width="20">&nbsp;</td>

      <td align="left"><p><input type="radio" name="custom_thankyou_page" value="popup" <?php if ($custom_thankyou_page == 'popup'){echo 'checked';} ?>><br>

		<input type="text" name="popup_thankyou_location" value="<?php echo $popup_thankyou_location; ?>" size="40"><br>

		<font face="Verdana" size="2">example: <br>

		http://bestwebforms.com/testthankyou.php</font></p></td>

      <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td colspan="6" height="25">

		<p align="center"><font size="1"><font color="#C0C0C0">&nbsp;&nbsp;

		</font>&nbsp;</font></td>

     </tr>



     <tr>

      <td width="35" valign="top">

		<p align="center"><b><font face="Verdana" size="2">3.</font></b></td>

       <td width="300" align="left"><font face="Verdana" size="2">I choose to use the default

		&quot;thank you&quot; page called <a href='./thank_youbwf.php' target='window.open'>thank_youbwf.php</a>.<br>

		This choice loads the thank you page

		within the iFrame.</font></td>

      <td width="20">&nbsp;</td>

      <td align="left"><p><input type="radio" name="custom_thankyou_page" value="default" <?php if ($custom_thankyou_page == 'default'){echo 'checked';} ?>>

		<font face="Verdana" size="2">Most people choose this option.</font></p></td>

      <td width="20">&nbsp;</td>

      </tr>



     <tr>

      <td colspan="6" height="25">&nbsp;</td>

     </tr>



     <tr>

      <td width="35" valign="top">

		<p align="center"><b><font face="Verdana" size="2">4.</font></b></td>

      <td width="300" align="left"><font face="Verdana" size="2">I will have no

		&quot;thank you&quot; page. Just have my visitors return to my home page.</font></td>

      <td width="20">&nbsp;</td>

      <td align="left"><p><input type="radio" name="custom_thankyou_page" value="no" <?php if ($custom_thankyou_page == 'no'){echo 'checked';} ?>></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="35" height="25">&nbsp;</td>

      <td valign="top" colspan="3" height="25">&nbsp;</td>

      <td width="20" height="25">&nbsp;<br><br></td>

     </tr>



     <tr>

      <td colspan="6" align="center"><input type="submit" value="Save Changes"></td>
			</tr>
		</table>
		</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="5">

		<p align="center"><table border="0" cellpadding="0" cellspacing="0" width="100%" id="table7">



     <tr>

      <td colspan="3" align="center"><b><font face="Verdana" size="1">&nbsp;</font><font face="Verdana" size="2"><br>

		Note</font></b><font face="Verdana" size="2">: To use &quot;Thank You&quot;

		options 1 and 4, you need to paste into <br>

		your &quot;thank you&quot; or &quot;return&quot; page the &quot;<b>break-out</b>&quot; code. <br>

		This will force the page to &quot;<b>break-out</b>&quot; of the iFrame.<br>

		The file &quot;<b>formthankyou.php</b>&quot; has it already inserted.<br>

&nbsp;</font><br>

		<font size="2" face="Verdana">Paste this code above the<br>

									<b>&lt;head&gt;</b> tag on the <b>thank you</b> page on your

		server.</font></td>

      </tr>

		<tr align="center">

      <td colspan="3" align="center">

									<font size="2" face="Verdana">

									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table182">

										<tr>

											<td width="73">&nbsp;</td>

											<td>

									<font size="2" face="Verdana"><b>

											Code:</b></td>

										</tr>

										<tr>

											<td width="73">&nbsp;</td>

											<td>

											<table border="1" cellpadding="3" cellspacing="0" width="84%" bgcolor="#F5F5F5" id="table183" bordercolor="#CCCCCC">

												<tr>

													<td>

													<font size="2">&lt;script

													language=&quot;Javascript&quot;&gt; <br>

													&lt;!-- <br>

													if (top.location!=

													self.location) { <br>

													top.location =

													self.location.href <br>

													} <br>

													//--&gt; <br>

													&lt;/script&gt; &lt;a name=&quot;top&quot;&gt;&lt;/a&gt;<br>

&nbsp;</font></td>

												</tr>

											</table>

											</td>

										</tr>

									</table>

									</td>

      </tr>



     <tr>

      <td colspan="3" align="center">&nbsp;</td>

      </tr>



     <tr>

      <td colspan="3" align="center"><table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">



     <tr>

      <td width="2%">&nbsp;</td>

      <td align="right" colspan="4" height="30"><hr></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="2%">&nbsp;</td>

      <td align="right" colspan="4"><p align="center">
		<font face="Verdana" size="2">

		&nbsp;<br>

		</font><font face="Verdana" size="1">&nbsp; <a name="forms"></a> </font></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="2%">&nbsp;</td>

      <td align="right" colspan="4">
		<p align="center">

		<font face="Verdana" color="#000080"><u><b>Create Your iFrame Code 
		Snippet</b></u>:</font><font face="Verdana" size="1"><br>

&nbsp;&nbsp; </font><font face="Verdana" size="2"><br>

		Now save all of your changes/preferences. Then click one of the <br>

		below buttons to generate your

		<b>iFrame Code Snippet</b>.<br>
		The code will appear in the text window near the bottom of this page. </font>
		<font face="Verdana" size="1"><a href="#iframe">here</a></font><font face="Verdana" size="2"><br>
&nbsp;</font></td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td width="2%" height="25">&nbsp;</td>
      <td align="right" width="79%" height="25" colspan="4">
		<p align="center"><font face="Verdana"><b>

		<font color="#000080">

		<u>Preview Your 41 Forms</u></font></b><font color="#000080">:</font></font></td>
      <td width="3%" align="left" height="25">&nbsp;</td>
     </tr>



     <tr>

      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50">
		<p align="left"><b><font face="Verdana" color="#800000"><u>Contact Forms</u>:</font></b></td>
      <td width="12%" align="center" height="50" colspan="2" valign="bottom">
		<font face="Verdana" size="2">Form #</font></td>
      <td align="center" height="50" width="32%">&nbsp;</td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>



     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=33">Contact Form</a> - Basic<br>
		</font><font face="Verdana" size="1">
		contactus-basic.html</font><font face="Verdana" size="2"> </td>
      <td width="7%" align="center" height="50">= 33</td>
      <td align="left" height="50" width="5%"><input type="radio" value="33" name="default_form" <?php if ($default_form == 33){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode33(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>



     <tr>

      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=1">Contact Form</a> - 
		Classic<br>
		</font><font face="Verdana" size="1">
		contactus-classic.html</font></td>
      <td width="7%" align="center" height="50">= 1</td>
      <td align="left" height="50" width="5%"><input type="radio" value="1" name="default_form" <?php if ($default_form == 1){echo "checked";}?>></td>
      <td align="center" height="50" width="32%"><input type="button" onClick="generateCode1(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=2">Contact Form</a> - 
		Complete<br>
		</font><font face="Verdana" size="1">
		contactus-complete.html</font></td>
      <td width="7%" align="center" height="50">= 2</td>
      <td align="left" height="50" width="5%"><input type="radio" value="2" name="default_form" <?php if ($default_form == 2){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode2(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=3">Contact Form</a> - 
		Alternate<br>
		</font><font face="Verdana" size="1">
		contactus-alternate.html</font></td>
      <td width="7%" align="center" height="50">= 3</td>
      <td align="left" height="50" width="5%"><input type="radio" value="3" name="default_form" <?php if ($default_form == 3){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode3(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=4">Contact Form</a> - 
		Attachment<br>
		</font><font face="Verdana" size="1">
		contactus-attachment.html</td>
      <td width="7%" align="center" height="50">= 4</td>
      <td align="left" height="50" width="5%"><input type="radio" value="4" name="default_form" <?php if ($default_form == 4){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode4(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=5">Contact Form</a> - Narrow<br>
		</font><font face="Verdana" size="1">
		contactus-narrow.html</td>
      <td width="7%" align="center" height="50">= 5</td>
      <td align="left" height="50" width="5%"><input type="radio" value="5" name="default_form" <?php if ($default_form == 5){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode5(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=6">Contact Form</a> - 
		Shorter<br>
		</font><font face="Verdana" size="1">
		contactus-short.html</td>
      <td width="7%" align="center" height="50">= 6</td>
      <td align="left" height="50" width="5%"><input type="radio" value="6" name="default_form" <?php if ($default_form == 6){echo "checked";}?>></td>
      <td align="center" height="50" width="20%">
		<input type="button" onClick="generateCode6(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=10">Tech Support Form</a></font><br>
		<font face="Verdana" size="1">support.html</font></td>
      <td width="7%" align="center" height="50">= 10</td>
      <td align="left" height="50" width="5%"><input type="radio" value="10" name="default_form" <?php if ($default_form == 10){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode10(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=23">Skinny</a> - Contact 
		Form<br>
		</font><font face="Verdana" size="1">
		skinny-contact-form.html</td>
      <td width="7%" align="center" height="50">= 23</td>
      <td align="left" height="50" width="5%"><input type="radio" value="23" name="default_form" <?php if ($default_form == 23){echo "checked";}?>></td>
      <td align="center" height="50" width="20%">
		<input type="button" onClick="generateCode23(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=24">Skinny</a> - Contact 
		Form Complete<br>
		</font><font face="Verdana" size="1">
		skinny-contact-form-complete.html</td>
      <td width="7%" align="center" height="50">= 24</td>
      <td align="left" height="50" width="5%"><input type="radio" value="24" name="default_form" <?php if ($default_form == 24){echo "checked";}?>></td>
      <td align="center" height="50" width="20%">
		<input type="button" onClick="generateCode24(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=26">Contact Form</a> - 
		w/Javascript Validation<br>
		</font><font face="Verdana" size="1">
		contactus-classic-javascript.html</td>
      <td width="7%" align="center" height="50">= 26</td>
      <td align="left" height="50" width="5%"><input type="radio" value="26" name="default_form" <?php if ($default_form == 26){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode26(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=30">Contact Form</a> - with 
		Subject Menu<br>
		</font><font face="Verdana" size="1">
		contactus-subject-menu.html</td>
      <td width="7%" align="center" height="50">= 30</td>
      <td align="left" height="50" width="5%"><input type="radio" value="30" name="default_form" <?php if ($default_form == 30){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode30(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=38">Contact Form with Fax</a></font><br>
		<font face="Verdana" size="1">contactus-with-fax.html</font></td>
      <td width="7%" align="center" height="50">= 38</td>
      <td align="left" height="50" width="5%"><input type="radio" value="38" name="default_form" <?php if ($default_form == 38){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode38(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=39">Contact Form Super Skinny w/JavaScript</a></font><br>
		<font face="Verdana" size="1">contactus-super-skinny-javascript.html</font></td>
      <td width="7%" align="center" height="50">= 39</td>
      <td align="left" height="50" width="5%"><input type="radio" value="39" name="default_form" <?php if ($default_form == 39){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode39(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50">
		<p align="left"><b><font face="Verdana" color="#800000"><u>Marketing</u>:</font></b></td>
      <td width="7%" align="center" height="50">&nbsp;</td>
      <td align="left" height="50" width="5%">&nbsp;</td>
      <td align="center" height="50" width="20%">&nbsp;</td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=7">Send To A Friend Form</a></font><br>
		<font face="Verdana" size="1">sendtofriend.html</font></td>
      <td width="7%" align="center" height="50">= 7</td>
      <td align="left" height="50" width="5%"><input type="radio" value="7" name="default_form" <?php if ($default_form == 7){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode7(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" align="left" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=8">Registration Form</a></font><br>
		<font face="Verdana" size="1">registration.html</font></td>
      <td width="7%" align="center" height="50">= 8</td>
      <td align="left" height="50" width="5%"><input type="radio" value="8" name="default_form" <?php if ($default_form == 8){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode8(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=11">Booking Form</a> - Event<br>
		</font><font face="Verdana" size="1">
		booking-event.html</font></td>
      <td width="7%" align="center" height="50">= 11</td>
      <td align="left" height="50" width="5%"><input type="radio" value="11" name="default_form" <?php if ($default_form == 11){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode11(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=16">Subscription Form</a></font><br>
		<font face="Verdana" size="1">subscribe.html</font></td>
      <td width="7%" align="center" height="50">= 16</td>
      <td align="left" height="50" width="5%"><input type="radio" value="16" name="default_form" <?php if ($default_form == 16){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode16(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=25">Skinny</a> - 
		Subscription Form<br>
		</font><font face="Verdana" size="1">
		skinny-subscribe.html</td>
      <td width="7%" align="center" height="50">= 25</td>
      <td align="left" height="50" width="5%"><input type="radio" value="25" name="default_form" <?php if ($default_form == 25){echo "checked";}?>></td>
      <td align="center" height="50" width="20%">
		<input type="button" onClick="generateCode25(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=29">Subscription Form</a> - 
		For the UK<br>
		</font><font face="Verdana" size="1">
		subscription-form-UK.html</td>
      <td width="7%" align="center" height="50">= 29</td>
      <td align="left" height="50" width="5%"><input type="radio" value="29" name="default_form" <?php if ($default_form == 29){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode29(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=34">Subscribe</a> - Newsletter<br>
		</font><font face="Verdana" size="1">
		subscribe-newsletter.html</font><font face="Verdana" size="2"> </td>
      <td width="7%" align="center" height="50">= 34</td>
      <td align="left" height="50" width="5%"><input type="radio" value="34" name="default_form" <?php if ($default_form == 34){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode34(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50">
		<p align="left"><b><font face="Verdana" color="#800000"><u>General 
		Business</u>:</font></b></td>
      <td width="7%" align="center" height="50">&nbsp;</td>
      <td align="left" height="50" width="5%">&nbsp;</td>
      <td align="center" height="50" width="20%">&nbsp;</td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=9">Product Order Form</a></font><br>
		<font face="Verdana" size="1">product.html</font></td>
      <td width="7%" align="center" height="50">= 9</td>
      <td align="left" height="50" width="5%"><input type="radio" value="9" name="default_form" <?php if ($default_form == 9){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode9(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=31">Agreement To Terms Form</a><br>
		</font><font face="Verdana" size="1">
		agreement-to-terms.html</font><font face="Verdana" size="2"> </td>
      <td width="7%" align="center" height="50">= 31</td>
      <td align="left" height="50" width="5%"><input type="radio" value="31" name="default_form" <?php if ($default_form == 31){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode31(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>

     

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=14">Estimate Form</a></font><br>
		<font face="Verdana" size="1">estimate.html</font></td>
      <td width="7%" align="center" height="50">= 14</td>
      <td align="left" height="50" width="5%"><input type="radio" value="14" name="default_form" <?php if ($default_form == 14){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode14(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=18">Survey Form</a></font><br>
		<font face="Verdana" size="1">survey.html</font></td>
      <td width="7%" align="center" height="50">= 18</td>
      <td align="left" height="50" width="5%"><input type="radio" value="18" name="default_form" <?php if ($default_form == 18){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode18(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>
     
     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=41">Admission File Update</a></font><br>
		<font face="Verdana" size="1">admission-file-update.html</font></td>
      <td width="7%" align="center" height="50">= 41</td>
      <td align="left" height="50" width="5%"><input type="radio" value="41" name="default_form" <?php if ($default_form == 41){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode41(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50">
		<p align="left"><b><font face="Verdana" color="#800000"><u>Specific 
		Business</u>:</font></b></td>
      <td width="7%" align="center" height="50">&nbsp;</td>
      <td align="left" height="50" width="5%">&nbsp;</td>
      <td align="center" height="50" width="20%">&nbsp;</td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=19">Survey Form</a> - Radio<br>
		</font><font face="Verdana" size="1">
		survey-radio.html</font></td>
      <td width="7%" align="center" height="50">= 19</td>
      <td align="left" height="50" width="5%"><input type="radio" value="19" name="default_form" <?php if ($default_form == 19){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode19(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=20">Menu Sample Form</a></font><br>
		<font face="Verdana" size="1">lunch-order.html</font></td>
      <td width="7%" align="center" height="50">= 20</td>
      <td align="left" height="50" width="5%"><input type="radio" value="20" name="default_form" <?php if ($default_form == 20){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode20(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=21">Prescription Drug Form</a></font><br>
		<font face="Verdana" size="1">prescription.html</font></td>
      <td width="7%" align="center" height="50">= 21</td>
      <td align="left" height="50" width="5%"><input type="radio" value="21" name="default_form" <?php if ($default_form == 21){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode21(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=22">Card Store Order Form</a></font><br>
		<font face="Verdana" size="1">card-store.html</font></td>
      <td width="7%" align="center" height="50">= 22</td>
      <td align="left" height="50" width="5%"><input type="radio" value="22" name="default_form" <?php if ($default_form == 22){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode22(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=12">Booking Form</a> - Hotel<br>
		</font><font face="Verdana" size="1">
		booking-hotel.html</font></td>
      <td width="7%" align="center" height="50">= 12</td>
      <td align="left" height="50" width="5%"><input type="radio" value="12" name="default_form" <?php if ($default_form == 12){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode12(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=13">Property Search Form</a> 
		- Vacation<br>
		</font><font face="Verdana" size="1">
		property-vacation.html</font></td>
      <td width="7%" align="center" height="50">= 13</td>
      <td align="left" height="50" width="5%"><input type="radio" value="13" name="default_form" <?php if ($default_form == 13){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode13(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>



<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=15">Estimate Form</a> - 
		Contractor<br>
		</font><font face="Verdana" size="1">
		estimate-contractor.html</font></td>
      <td width="7%" align="center" height="50">= 15</td>
      <td align="left" height="50" width="5%"><input type="radio" value="15" name="default_form" <?php if ($default_form == 15){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode15(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>

     

     <tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=17">Subscription Form</a> - 
		Church<br>
		</font><font face="Verdana" size="1">
		subscribe-church.html</font></td>
      <td width="7%" align="center" height="50">= 17</td>
      <td align="left" height="50" width="5%"><input type="radio" value="17" name="default_form" <?php if ($default_form == 17){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode17(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>
     </tr>



<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=27">Auto Shipping Order</a></font><br>
		<font face="Verdana" size="1">auto-shipping-order.html</font></td>
      <td width="7%" align="center" height="50">= 27</td>
      <td align="left" height="50" width="5%"><input type="radio" value="27" name="default_form" <?php if ($default_form == 27){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode27(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>



<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		Product -
		<a target="window.open" href="formbwf.php?f=28">Quote Request Form</a></font><br>
		<font face="Verdana" size="1">quote-request-form.html</font></td>
      <td width="7%" align="center" height="50">= 28</td>
      <td align="left" height="50" width="5%"><input type="radio" value="28" name="default_form" <?php if ($default_form == 28){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode28(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>
     
<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=32">Estimate</a> - 
		Refinishing<br>
		</font><font face="Verdana" size="1">
		estimate-refinishing.html </td>
      <td width="7%" align="center" height="50">= 32</td>
      <td align="left" height="50" width="5%"><input type="radio" value="32" name="default_form" <?php if ($default_form == 32){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode32(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>
          
<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=35">Product Order</a> - Form #2<br>
		</font><font face="Verdana" size="1">
		product-order2.html</font><font face="Verdana" size="2"> </td>
      <td width="7%" align="center" height="50">= 35</td>
      <td align="left" height="50" width="5%"><input type="radio" value="35" name="default_form" <?php if ($default_form == 35){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode35(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>
     
<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=36">Quote and Product Info Form</a></font><br>
		<font face="Verdana" size="1">quote-and-product-info-form.html</font></td>
      <td width="7%" align="center" height="50">= 36</td>
      <td align="left" height="50" width="5%"><input type="radio" value="36" name="default_form" <?php if ($default_form == 36){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode36(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>
     
<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=37">Garment Quote Form</a></font><br>
		<font face="Verdana" size="1">garment-quote-form.html</font></td>
      <td width="7%" align="center" height="50">= 37</td>
      <td align="left" height="50" width="5%"><input type="radio" value="37" name="default_form" <?php if ($default_form == 37){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode37(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>
     
<tr>
      <td width="2%" height="50">&nbsp;</td>
      <td align="right" width="42%" height="50"><font face="Verdana" size="2">
		<a target="window.open" href="formbwf.php?f=40">Camcorder Repair Estimate</a></font><br>
		<font face="Verdana" size="1">estimate-camcorder-repair.html</font></td>
      <td width="7%" align="center" height="50">= 40</td>
      <td align="left" height="50" width="5%"><input type="radio" value="40" name="default_form" <?php if ($default_form == 40){echo "checked";}?>></td>
      <td align="center" height="50" width="20%"><input type="button" onClick="generateCode40(<?php echo $default_form; ?>);return false;" value="Generate iFrame Code"></td>
      <td width="3%" height="50">&nbsp;</td>

     </tr>
     
     <tr>

      <td colspan="6" height="3"></td>

     </tr>



     <tr>

      <td width="2%">&nbsp;</td>

      <td align="right" width="42%">&nbsp;</td>

      <td width="7%" align="center">&nbsp;</td>

      <td align="left" width="36%" colspan="2">&nbsp;</td>

      <td width="3%">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center"><font face="Verdana" size="2">&nbsp;</font></td>

      <td align="center" colspan="4"><input type="submit" value="Save Changes"></td>

      <td colspan="1" align="center"><font face="Verdana" size="2">&nbsp;</font></td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right"><p align="left"><font face="Verdana" size="2">&nbsp;&nbsp;

		<br>

		If you press &quot;<b>Save Changes</b>&quot; and you get an error message, then 
		make sure that you have set the &quot;permissions&quot; to 
		<font color="#0000FF">read/write/execute</font> <font color="#0000CC"><b>777</b></font> on the sub-directory

		<b>folder</b> that you loaded the forms package into <b>AND</b> make 
		sure that

		<b>configbwf.php</b> is set to <font color="#0000FF"> <b>777</b></font>. Also make sure the <b>temp</b> 
		folder is set to <font color="#0000FF"> <b>777</b></font>.<br>
		<br>
		<b>Note</b>: If setting the permissions to <b>777</b> does not work on 
		your server, then try setting the permissions to <font color="#0000CC">
		<b>755</b></font>.<br>

		&nbsp;<br>If your website hosting company does not allow you to set 
		permissions, then see&nbsp;
		<a target="window.open" href="instructions-bwf.html">instructions-bwf.html</a><b> </b>to read how to 
		make changes directly to the <b>configbwf.php</b> file, skipping this 
		Web Form Designer.<br>
&nbsp;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="6" align="center"><table border="0" cellpadding="0" cellspacing="0" width="100%" id="table191">
				<tr>

      <td width="20">&nbsp;</td>

      <td width="300" align="right" valign="top"><a name="iframe"></a></td>

      <td width="20">&nbsp;</td>

      <td align="left"><p></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3">

		<font face="Verdana" color="#000080"><b>- <u>Using the iFrame Method</u> 
		-<u> <br>
		Create Your iFrame Code 
		Snippet</u></b>:</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center" colspan="3">

		&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3">

		<p align="center"><font size="1">&nbsp;<br>

		</font>&nbsp;<font face="Verdana" size="2">When you click the above

		<b><a href="#forms">Generate</a> iFrame Code</b> button,<br>
		then your <b>iFrame Code Snippet</b> will appear below.</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right" colspan="3"><p align="center">

		<textarea rows="6" name="code_snippet" cols="65"></textarea></p></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20" align="center">&nbsp;</td>

      <td align="center" colspan="3">
		<p align="left"><font face="Verdana" size="2">
		<font color="#0000FF"><b>Paste the code snippet</b></font> you see in the above text window into your 
		webpage.<br>
		That will make your form appear on your page when you upload it.<br>
&nbsp;<br>
		<b>Tip</b>: After you have your form on your website, make sure to test 
		it by filling in all the fields and then enter the <b>wrong</b> security 
		code. Look at the bottom of the form. Is the complete form still 
		showing? If not, you need to adjust the <b>cell height</b> that you pasted the 
		iFrame Code Snippet into to be taller. You may <b>also</b> need to adjust the 
		<b>height</b> of the <b>iFrame</b> Code Snippet itself. Usually, the 
		cell height needs<br>
		to be about 150 pixels taller than the iFrame height.<br>
&nbsp;<br>
		<font color="#0000FF"><b>Highly Recommended:</b></font>
		Make the above iFrame Code Snippet <b>path</b>
		&quot;<b>relative</b>&quot; by deleting the first part of the URL. This is a 
		very good 
		thing to do, because some people's browsers might see the &quot;<b>http</b>&quot; as a 
		&quot;<b>3rd party script</b>&quot; and choose to not display your form. See below 
		example:<br>
&nbsp;</font></p>
		<div align="center">

		<table border="1" cellpadding="3" cellspacing="0" width="500" bgcolor="#CCCCCC" bordercolor="#999999" id="table58">

			<tr>

				<td><font face="Verdana" size="2">&lt;iframe name=&quot;bwfIFRAME&quot;

				src=&quot;../forms/formbwf.php?f=5&amp;iframe=yes&quot; width=&quot;425&quot;

				height=&quot;1000&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot;&gt;&lt;/iframe&gt;</font></td>

			</tr>

		</table>

		</div>

		</td>

      <td width="20" align="center">&nbsp;</td>

     </tr>
			</table></td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center">&nbsp;</td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><hr></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><a name="non-iframe"></a></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><font face="Verdana">The Below Is For Those 
		Who Do Not Wish <br>
		To Use The iFrame Code Snippet Method Above.</font><br>
&nbsp; </td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><font face="Verdana" color="#000080"><b>
		Header and Footer for<u><br>
		Using the Non-iFrame Method</u></b>:</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center">&nbsp;</td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><font face="Verdana" size="2">To use the 
		<b>non</b>-iFrame Code Snippet method, you will <b>not</b> be using<br>
		a page from your website. You will instead be using the &quot;<b>header.html</b>&quot;<br>
		file located in the &quot;<b>inc</b>&quot; directory of our forms package folder.<br>
&nbsp;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><font face="Verdana" size="2">You will insert the full url 
		path of your header image and/or header menu into the<br>
		header field below. Then when someone views your form,<br>
		your header image and/or menu will appear just above your form.<br>
		&nbsp;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center">
		<font face="Verdana" color="#000080"><u><b>
		Header Code for the Non-iFrame Method</b></u>:</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center">
		<p align="left"><font face="Verdana" size="2"><b>&nbsp;<br>
		&nbsp;&nbsp;&nbsp; Example to insert below</b>: <br>
		&nbsp;&nbsp;
		&lt;img 
		border=&quot;0&quot; src=&quot;http://bestwebforms.com/header-image-example.jpg&quot;&gt;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center">
			<textarea rows="3" name="formtop" cols="65"><?php echo base64_decode( $formtop ); ?></textarea></td><td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center"><font face="Verdana" size="2">Using this
		<font color="#0000CC">Non-iFrame Method</font>, if you put our forms 
		package into a <br>
		folder/directory called &quot;forms&quot;, then the url path<br>
		to your form would be: <b>
		<a target="window.open" href="/forms/formbwf.php">/forms/formbwf.php</a></b></font><font face="Verdana" size="1"><br>
		or: <font color="#0000FF">/forms/formbwf.php?f=1</font> for form #1, or:
		<font color="#0000FF">/forms/formbwf.php?f=2 </font>, and so on.<br>
		Note: You may need to adjust the url path code in the above example.<br>
		</font><font face="Verdana" size="2"><b>&nbsp;</b></font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>

     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center"><font face="Verdana" size="2"><b>Also Note</b>:
									Using the included /inc/header-sample.html 
									as an example, <br>
		the new header code should not 
									&quot;end&quot;.<br>
									Our example header ends with:<br>
									<br>
									<b>&lt;tr&gt;<br>
									&lt;td valign=&quot;bottom&quot;&gt;&amp;nbsp;&lt;/td&gt;<br>
									&lt;td valign=&quot;bottom&quot;&gt;</b><br>
									<br>
									<u><b>Do not</b></u> end your new header.html file with 
									code like:<br>
									<br>
									<b>&lt;/body&gt;<br>
									<br>
									&lt;/html&gt;<br>
&nbsp;<br>
&nbsp;</b>If you do, then the form with want to load 
									&quot;outside&quot; or &quot;next to&quot; the page.<br>
									If you make this mistake, you will see what 
									we mean. End it similar to header-sample.html.<br>
&nbsp;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center"><input type="submit" value="Save Changes"></p></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">&nbsp;</td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right"><hr></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>

	   <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center">&nbsp;</td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><font face="Verdana" color="#000080"><u><b>
		Footer Code for the Non-iFrame Method</b></u>:</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center">&nbsp;</td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><font face="Verdana" size="2">To use the 
		<b>non</b>-iFrame Code Snippet method, you will <b>not</b> be using<br>
		a page from your website. You will instead be using the &quot;<b>footer.html</b>&quot;<br>
		file located in the &quot;<b>inc</b>&quot; directory of our forms package folder.<br>
&nbsp;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center"><font face="Verdana" size="2">You will insert the full url 
		path of your footer into the<br>
		footer field below. Then when someone views your form,<br>
		your footer and/or footer menu will appear just below your form.<br>
		&nbsp;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="center">
		<p align="left"><font face="Verdana" size="2"><b>&nbsp;&nbsp;&nbsp; Example 
		to insert below</b>: <br>
		&nbsp;&nbsp;
		&lt;p align=&quot;center&quot;&gt;your-website.com © 2008&lt;/p&gt;</font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center">
			<textarea rows="3" name="formbottom" cols="65"><?php echo base64_decode( $formbottom ); ?></textarea></td><td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center"><font face="Verdana" size="2">Using this
		<font color="#0000CC">Non-iFrame Method</font>, if you put our forms 
		package into a <br>
		folder/directory called &quot;forms&quot;, then the url path<br>
		to your form would be: <b>
		<a target="window.open" href="/forms/formbwf.php">/forms/formbwf.php</a></b></font><font face="Verdana" size="1"><br>
		or: <font color="#0000FF">/forms/formbwf.php?f=1</font> for form #1, or:
		<font color="#0000FF">/forms/formbwf.php?f=2 </font>, and so on.<br>
		Note: You may need to adjust the url path code in the above example.<br>
		</font><font face="Verdana" size="2"><b>&nbsp;</b></font></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>
     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center">&nbsp;</td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">
		<p align="center"><input type="submit" value="Save Changes"></p></form></td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     <tr>

      <td colspan="1" align="center">&nbsp;</td>

      <td colspan="4" align="right">&nbsp;</td>      <td colspan="1" align="center">&nbsp;</td>

     </tr>



     </table></td>

      </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right"><p align="center"><font face="Verdana" size="2"><font color="#0000FF"><b>&nbsp;Note:</b></font> If you place the

		Web Forms package into more than one <br>

		sub-directory, then you can use more than one form template. <br>

		(You

		can use all 31 with 31 sub-directory/folders.)<br>

		Or, if you don't need different borders and email settings,<br>

		you can just use a single directory/folder for all the forms.<br>
		&nbsp;</font></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right"><p align="center"><hr></td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="center">&nbsp;</td>

      <td width="20">&nbsp;</td>

     </tr>



     <tr>

      <td width="20">&nbsp;</td>

      <td align="right"><p align="center">

		<font face="Verdana" size="1">

		<a target="window.open" href="http://bestwebforms.com">

		<font color="#000000">BestWebForms.com</font></a> &copy 2008</font></td>

      <td width="20">&nbsp;</td>

     </tr>



    </table></div>

   </td>

  </tr>

 </table></td>

		</tr>

	</table>

</div>

</div>

</body>

</html>



<?php



}



///////////////////////////////////////////////////////////////////////////////////////////////////////

function update_settings ($new_settings) {

///////////////////////////////////////////////////////////////////////////////////////////////////////


if( array_key_exists( 'formtop', $new_settings ) )
{
    $new_settings['formtop'] = str_replace('\r', '', str_replace('\n', '', $new_settings['formtop']));
    $new_settings['formtop'] = str_replace(chr(10), " ", $new_settings['formtop']); //remove carriage returns
    $new_settings['formtop'] = str_replace(chr(13), " ", $new_settings['formtop']);
    // encoding for quotes and special chars compatibility
    $new_settings['formtop'] = base64_encode( $new_settings['formtop'] );
}
if( array_key_exists( 'formbottom', $new_settings ) )
{
    $new_settings['formbottom'] = str_replace('\r', '', str_replace('\n', '', $new_settings['formbottom']));
    $new_settings['formbottom'] = str_replace(chr(10), " ", $new_settings['formbottom']); //remove carriage returns
    $new_settings['formbottom'] = str_replace(chr(13), " ", $new_settings['formbottom']);
    // encoding for quotes and special chars compatibility
    $new_settings['formbottom'] = base64_encode( $new_settings['formbottom'] );

}
if( array_key_exists( 'terms', $new_settings ) )
{
    $new_settings['terms'] = str_replace('\r', '', str_replace('\n', '', $new_settings['terms']));
    $new_settings['terms'] = str_replace(chr(10), " ", $new_settings['terms']); //remove carriage returns    
    $new_settings['terms'] = str_replace(chr(13), " ", $new_settings['terms']);
}  


global $missing_image_url;



$config_vars = array (



"admin_email",

"admin_cc_email",

"admin_from_email",

"admin_override_from",

"google_conversion_id",



"google_adsense_code",

"missing_fields_message",



"turing_image_url",

"turing_text_font",

"turing_image_font",

"security_level",



"use_border",



"validation_arrow",

"validation_star",

"text_color",

"font_style",

"text_size",

"form_background_color",

"iframe_background_color",

"form_border_color",

"terms",

"formtop",

"formbottom",

"subject_hidden_field",


"custom_thankyou_page",

"popup_thankyou_location",

"thank_you_url",



"num_guesses",

"length",

"path_to_border_images",

"default_form",

"admin_username",

"admin_password"



);

if (!isset($new_settings['admin_override_from'])) $new_settings['admin_override_from'] = "false" ;



$temp = array ('use_border'=>'');



if (!isset ($new_settings['use_border'])){

	$new_settings = array_merge ($new_settings, $temp);

}



$temp = array ('custom_thankyou_page'=>'');



if (!isset ($new_settings['custom_thankyou_page'])){

	$new_settings = array_merge ($new_settings, $temp);

}



$old_settings = file('./configbwf.php');

$new_data = '';



foreach ($old_settings as $line_num => $line) {

	foreach ($new_settings as $var_name_to_update => $value){

		foreach ($config_vars as $k => $config_var_name){

    //echo "<pre>";print_r ($new_settings); exit;

			if ($var_name_to_update == $config_var_name && ($config_var_name == 'admin_cc_email' || $config_var_name == "admin_from_email" || $config_var_name == "formtop" || $config_var_name == "formbottom")){

			// allow empty value

        if (preg_match("/^\\$$var_name_to_update.+;(.*)$/",$line)){

          //preg_match("/^\\$$var_name_to_update.+;(.+)$/",$line)){

          //echo "matched: ";

          //echo "Replacing $config_var_name with $value in Line $line<br>";



          $line = preg_replace("/^\\$$var_name_to_update.+;(.*)$/",("\$"."$config_var_name = \"".trim($value)."\";"."$1"),$line);

          //echo "$var_name_to_update --- $line<br>";

        }



				//$line = preg_replace("/.$var_name_to_update.+;(.*)/","$1",$line);

			}else if ($var_name_to_update == $config_var_name && ($config_var_name == 'use_border' || $config_var_name == 'custom_thankyou_page') && $new_settings["$config_var_name"] == ''){



        if (preg_match("/^\\$$config_var_name.+;(.*)$/",$line)){

          //echo "Replacing $config_var_name with YES in Line $line<br>";

          //echo "VAR NAME:$var_name_to_update === $config_var_name in Line: $line<br>";



          $line = preg_replace("/^\\$$config_var_name.+;(.*)$/",("\$"."$config_var_name = \"yes\";"."$1"),$line);



        }



			}else if ($var_name_to_update == $config_var_name && ($config_var_name != 'admin_username' && $config_var_name != 'admin_password') && $value != ""){

  			// && $value != "" otherwise it removes admin username and password

        if (preg_match("/^\\$$var_name_to_update.+;(.*)$/",$line)){

          //preg_match("/^\\$$var_name_to_update.+;(.+)$/",$line)){

          //	echo "matched: ";



          //echo "Replacing $config_var_name with $value in Line $line<br>";



          $line = preg_replace("/^\\$$var_name_to_update.+;(.*)$/",("\$"."$config_var_name = \"".trim($value)."\";"."$1"),$line);

          //echo "$var_name_to_update --- $line<br>";



        }



				//$line = preg_replace("/.$var_name_to_update.+;(.*)/","$1",$line);



			}else if ($var_name_to_update == $config_var_name && ($config_var_name == 'admin_username' || $config_var_name == 'admin_password') && $value != ""){

			  // overwrite admin username and password

        if (preg_match("/^\\$$var_name_to_update.+;(.*)$/",$line)){

          //preg_match("/^\\$$var_name_to_update.+;(.+)$/",$line)){

          //	echo "matched: ";

          //echo "Replacing $config_var_name with $value in Line $line<br>";

          $line = preg_replace("/^\\$$var_name_to_update.+;(.*)$/",("\$"."$config_var_name = \"".trim($value)."\";"."$1"),$line);

          //echo "$var_name_to_update --- $line<br>";

        }



				//$line = preg_replace("/.$var_name_to_update.+;(.*)/","$1",$line);

			}

		}

	}



  $new_data .= trim( $line )."\n";



}



//$new_data = preg_replace ("/\\$"."google_adsense_code \= <<<End.+?End\;/s","\$google_adsense_code = <<<End\n".$new_settings['google_adsense_code']."\nEnd;",$new_data);



$pattern = preg_quote ($missing_image_url);

$sTestBuffer = ob_get_contents();
if( $sTestBuffer != false ) ob_end_clean();
$fp = fopen('./configbwf-new.php', 'w') or die ('Cannot open file for writing');

fputs($fp,$new_data);

fclose($fp);

unlink ("./configbwf.php");

rename ("./configbwf-new.php","./configbwf.php");

chmod('./configbwf.php', 0777);



}





?>