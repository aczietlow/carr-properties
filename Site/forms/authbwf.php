<?php

/*
 * (C) Copyright 2008 BestWebForms.com
 * For information visit http://www.bestwebforms.com/
 * All rights reserved. Used only by permission under license agreement.
 */

if (isset($_SESSION["valid_username"])){

	if ($_SESSION["valid_username"] != ""){

		if ($_SESSION["valid_username"] == $admin_username){

			if (md5($admin_password) != $_SESSION["valid_password"]){
				header ("Location: loginbwf.php");
			}
		}else{
			header ("Location: loginbwf.php");
	
		}
	}else{
		header ("Location: loginbwf.php");
	}
}else{
		header ("Location: loginbwf.php");
}

?>