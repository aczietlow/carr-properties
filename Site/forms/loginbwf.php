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
    $check = eval('?>' . $tmp . '<?php return true ;') ;
} 
else
{   $check = false;
} 

if ($check) {
  include ("./configbwf.php");
  
  if (isset($_POST['login']) || (isset($_POST['login_x']) && isset($_POST['login_y']))){

	$form_username = trim($_POST['username']);
	$form_password = trim($_POST['password']);

	if ($form_username && $form_password){

		if ($form_username == $admin_username && $form_password == $admin_password){

			$valid_username = $form_username;
			session_register("valid_username");
			$_SESSION["valid_username"] = $valid_username;

			$valid_password = md5($form_password);
			session_register("valid_password");

			$_SESSION["valid_password"] = $valid_password;
			ob_end_clean();
			header ("Location: adminbwf.php");	
			exit;
		}else{

			login_form ();	
			exit;
		}
	}else{

		login_form ();	
		exit;
	}
}else{

	login_form ();	
	exit;
}
}else{
  ?>
  <center>
  <p>THE CONFIG FILE IS BROKEN! WOULD YOU LIKE TO FIX IT?</p>
  <a href="resetconfig.php"><input type="button" value="Yes"></a>
	</center>
  <?php
}


function login_form () {

?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Admin Panel - login</title>
</head>

<body onLoad="document.forms[0].username.focus();">

<form method="POST">
<input type="hidden" name="login" value="login">

<div align="center">
	<table border="1" cellpadding="0" cellspacing="0" width="500" bordercolor="#003366" id="table1">
		<tr>
			<td>
			<div align="center">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">
					<tr>
						<td colspan="5">

		<font face="Verdana" size="1">

		<a target="window.open" href="http://bestwebforms.com">

		<font color="#000000">BestWebForms.com</font></a> &copy 2008<br>
&nbsp;</font></td>
					</tr>
					<tr>
						<td colspan="5" height="35">
						<p align="center"><b>

		<font face="Verdana" color="#000080"> <u>Web Form Designer Login</u></font></b></td>
					</tr>
					<tr>
						<td width="20"><font face="Verdana" size="2">&nbsp;</font></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td width="20">&nbsp;</td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td width="200" align="right">&nbsp;</td>
						<td width="20">&nbsp;</td>
						<td align="left">&nbsp;</td>
						<td width="20">&nbsp;</td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td valign="top">
						<p align="right"><font face="Verdana" size="2">Your 
						username:</font></td>
						<td>&nbsp;</td>
						<td>
							<p><input type="text" name="username" size="26"></p>
						</td>
						<td width="20">&nbsp;</td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td valign="top">
						<p align="right"><font face="Verdana" size="2">Your Password:</font></td>
						<td>&nbsp;</td>
						<td>
							<p><input type="password" name="password" size="26"></p>
						</td>
						<td width="20">&nbsp;</td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td valign="top">
						<p align="right">&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<p><input type="submit" name="submit" value="Login"></p>
						</td>
						<td width="20">&nbsp;</td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td valign="top" colspan="3">
						&nbsp;</td>
						<td width="20">&nbsp;</td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td align="right" colspan="3">
						<p align="center"><font face="Verdana" size="1">Note: 
						&quot;admin&quot; is the username AND password that originally is 
						installed.</font></td>
						<td width="20">&nbsp;</td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td width="200" align="right">&nbsp;</td>
						<td width="20">&nbsp;</td>
						<td align="left">&nbsp;</td>
						<td width="20">&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>

</form>

</body>

</html>

<?php

}

?>
