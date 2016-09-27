<?php

/*
 * (C) Copyright 2008 BestWebForms.com
 * For information visit http://www.bestwebforms.com/
 * All rights reserved. Used only by permission under license agreement.
 */

if (!session_is_registered('turing_string')){
	session_start();
}

if (!isset($_SESSION['turing_guesses'])){
	$_SESSION['turing_guesses'] = 0;
}

include ("./configbwf.php");
include ("./funcbwf.php");

$is_iframe = get_var('iframe');
$form_get_short = get_var ('f');
$form_get_long = get_var ('form');

if (isset($_SERVER['PATH_INFO'])){
	$form_server_path = $_SERVER['PATH_INFO'];
	$form_server_path = preg_replace("/^\//","",$form_server_path);
}

$f = "";

if (isset ($form_get_short) && $form_get_short != ""){
	$f = $form_get_short;
}else if (isset ($form_get_long) && $form_get_long != ""){
	foreach ($forms as $key => $form_name){
		if ($form_get_long == $form_name){
			$f = $key;
		}
	}
}else if (isset ($form_server_path) && $form_server_path != ""){
	foreach ($forms as $key => $form_name){
		if ($form_server_path == $form_name){
			$f = $key;
		}
	}
}else{
	$f = $default_form;
}


if (!isset($forms[$f]) || $forms[$f] == ''){
	$f = $default_form;
}

//$f is used in the templates, it must be 'f'

$form_to_use = "$path_to_form/$forms[$f]";

if (isset($_POST['required_fields'])){
	$required_fields = preg_split("/\,\s*/",trim($_POST['required_fields']));
        //$required_fields[] = "Security_Code";
}


$action = $_SERVER['PHP_SELF'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset ($required_fields)){
		// otherwise do not check

		foreach ($required_fields as $key=>$value){

			if ($value == 'Security_Code' && ($security_level != "highest" || $security_level != "medium")){
				// do not look for security code if security setting is 'lowest'
				continue;
			}

                        if (!isset ($_POST["$value"]) ){
				$is_empty = 1;
				$aKeys = array_keys( $_POST );
				foreach( $aKeys as $sKey )
				{				         
				         if( strpos( $sKey, $value ) === 0 )
				         {
				             $is_empty = 0;
				         }    
				 }            
			
				if ($is_empty == 1){

					redisplay(null,$form_to_use,null,null,$is_iframe);
					exit;
				}

			}else{
				if (!isset($_POST["$value"]) || trim($_POST["$value"]) == ""){
					redisplay(null,$form_to_use,null,null,$is_iframe);
				exit;
				}
			}
		}
	}

	if ($security_level == "highest"){
		if (!isset ($_POST['Security_Code']) || trim($_POST['Security_Code']) == ""){
			$message = "Please enter the security code";
			$show_missing_fields_message = "yes";
			redisplay ($message,$form_to_use,null,$show_missing_fields_message,$is_iframe);
			exit;
		}
	}

// CHECK FOR EMPTY VALUES

	if ($security_level == "highest" || $security_level == "high" || $security_level == "medium"){

		if (isset($_SESSION['turing_string']) && isset($_POST['Security_Code'])){

			if ( (strtolower($_SESSION['turing_string']) == strtolower($_POST['Security_Code'])) && ($_SESSION['turing_guesses'] < $num_guesses)) {

        			unset($_SESSION['turing_guesses']);
		        	$_SESSION['turing_pass'] = true;


				if (preg_match ("/^yes$/i",$send_emails)){

					$Email_Address = stripslashes(trim($_POST['Email_Address']));

					if(isset($_POST['Subject'])){
						$subject = stripslashes(trim($_POST['Subject']))?stripslashes(trim($_POST['Subject'])):$default_subject;
					}else{
						$subject = $default_subject;
					}

					$message = "";

					foreach ($_POST as $key=>$value){

						if ($key == 'Subject' ||
						$key == 'required_fields' ||
						$key == 'PHPSESSID' ||
						$key == 'Security_Code' ||
						$key == 'Send_To_Me' ||
						$key == 'f'){
							continue;
						}
						// field message patch 20080728 - START
						$cTrail = substr($key, -1);
        					if( is_numeric( $cTrail ) )
						{
							$key = preg_replace("/[0-9]/","", $key);
							$key = preg_replace("/_/"," ",$key);
							$key = rtrim( $key );
							$value = preg_replace("/_/"," ",$value);
							$message .= "$key: $value\n";
						}
						else
						{
							$key = preg_replace("/_/"," ",$key);
							$value = preg_replace("/_/"," ",$value);
							$message .= "$key: $value\n";					
		   				}
         					// field message patch 20080728 - END
					}

					$message = stripslashes($message);
					$headers = "From: $Email_Address";

					if ($admin_cc_email != ''){
						$headers .= "\r\nCc: $admin_cc_email";
					}

					if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
						// hacking attempt
					}else{
						if ($admin_email != ''){

							if (isset ($_POST['Friend_1_Email_Address']) && trim ($_POST['Friend_1_Email_Address']) != ''){
								if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
									// hacking attempt
								}else{
									$tmp = $message;
									$tmp = preg_replace ("/Friend\s+2\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+3\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+4\s+Email Address.+?\n/s",'',$tmp);
									send_mail(trim ($_POST['Friend_1_Email_Address']),$subject,$tmp,$headers,null,null);
									//echo ("<pre><hr>$_POST[Friend_1_Email_Address],$subject,$tmp,$headers<br>");
								}
							}

							if (isset ($_POST['Friend_2_Email_Address']) && trim ($_POST['Friend_2_Email_Address']) != ''){
								if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
									// hacking attempt
								}else{
									$tmp = $message;
									$tmp = preg_replace ("/Friend\s+1\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+3\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+4\s+Email Address.+?\n/s",'',$tmp);
									send_mail(trim ($_POST['Friend_2_Email_Address']),$subject,$tmp,$headers,null,null);
									//echo ("<hr>$_POST[Friend_2_Email_Address],$subject,$tmp,$headers<br>");
								}
							}

							if (isset ($_POST['Friend_3_Email_Address']) && trim ($_POST['Friend_3_Email_Address']) != ''){
								if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
									// hacking attempt
								}else{
									$tmp = $message;
									$tmp = preg_replace ("/Friend\s+1\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+2\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+4\s+Email Address.+?\n/s",'',$tmp);
									send_mail(trim ($_POST['Friend_3_Email_Address']),$subject,$tmp,$headers,null,null);
									//echo ("<hr>$_POST[Friend_3_Email_Address],$subject,$tmp,$headers<br>");
								}
							}

							if (isset ($_POST['Friend_4_Email_Address']) && trim ($_POST['Friend_4_Email_Address']) != ''){
								if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
									// hacking attempt
								}else{
									$tmp = $message;
									$tmp = preg_replace ("/Friend\s+1\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+2\s+Email Address.+?\n/s",'',$tmp);
									$tmp = preg_replace ("/Friend\s+3\s+Email Address.+?\n/s",'',$tmp);
									send_mail(trim ($_POST['Friend_4_Email_Address']),$subject,$tmp,$headers,null,null);
									//echo ("<hr>$_POST[Friend_4_Email_Address],$subject,$tmp,$headers<br>");
								}
							}

							list ($uploaded_file2,$uploaded_file1) = send_mail($admin_email,$subject,$message,$headers,null,null);
							//echo "<pre>$admin_email<br>$subject<br>$message<br>$headers<br>";
						}else{
							error ("Form cannot be submitted. Admin email address has not been configured");
							exit;
						}

						if(isset($_POST['Send_To_Me']) && $_POST['Send_To_Me'] == "Yes"){


							$headers = "From: $Email_Address";
							//$message .= "Send to Yourself: Yes\n";
							//$message .= "Security Code: $_POST[Security_Code]\n";


							$website_name = $_SERVER['HTTP_REFERER'];

							$website_name = preg_replace ("/(http\:\/\/.+?)\/.+/","$1",$website_name);

							if ($f == 6){
								// send to friend

								$user_message = <<<End
This is a copy of the email

Message:

$message
End;
							}else{
								$user_message = <<<End
This is a copy of the email sent to $website_name

Message:

$message
End;
							}

							send_mail($Email_Address,$subject,$user_message,$headers,$uploaded_file1,$uploaded_file2);
							//echo "<pre>$Email_Address<br>$subject<br>$user_message<br>$headers<br>";exit;

						}

         					thank_you ();
						exit;

					}
				}

			}else{


				if (($security_level == "highest" || $security_level == "high" || $security_level == "medium") && isset($_SESSION['turing_guesses'])){

					if (++$_SESSION['turing_guesses'] >= $num_guesses ) {

					$message = '<font color = "#CC0000"><b><center>You made too many wrong guesses.  Sorry.</font>';
					error ($message);
	        			exit;
					}
				}

				if (($security_level == "highest" || $security_level == "high" || $security_level == "medium") && isset($_SESSION['turing_guesses'])){

					$message = '<p><font color="#CC0000"><b>Sorry, the security code did not match.<br>You have ' .
			        	($num_guesses - $_SESSION['turing_guesses']) .
				        ' more attempts.</font></p>';

					$show_missing_fields_message = "no";
					redisplay($message,$form_to_use,null,$show_missing_fields_message,$is_iframe);
					exit;
				}else{

					$show_missing_fields_message = "no";
					redisplay(null,$form_to_use,null,$show_missing_fields_message,$is_iframe);
				exit;

				}
			}
		}

	}else{

		// don't check for CAPTCHA, security level is lowest

		if (preg_match ("/^yes$/i",$send_emails)){

			$Email_Address = stripslashes(trim($_POST['Email_Address']));

			if(isset($_POST['Subject'])){
				$subject = stripslashes(trim($_POST['Subject']))?stripslashes(trim($_POST['Subject'])):$default_subject;
			}else{
				$subject = $default_subject;
			}

			$message = "";

			foreach ($_POST as $key=>$value){

				if ($key == 'subject' ||
				$key == 'required_fields' ||
				$key == 'PHPSESSID' ||
				$key == 'Security_Code' ||
				$key == 'Send_To_Me' ||
				$key == 'f'){
					continue;
				}
				// field message patch 20080728 - START
                                $cTrail = substr($key, -1);
        			if( is_numeric( $cTrail ) )
				{
                                        $key = preg_replace("/[0-9]/","", $key);
					$key = preg_replace("/_/"," ",$key);
					$key = rtrim( $key );
					$value = preg_replace("/_/"," ",$value);
					$message .= "$key: $value\n";
				}
				else
				{
					$key = preg_replace("/_/"," ",$key);
					$value = preg_replace("/_/"," ",$value);
					$message .= "$key: $value\n";					
				}
				// field message patch 20080728 - END
			}

			$message = stripslashes($message);
			$headers = "From: $Email_Address";

			if ($admin_cc_email != ''){
				$headers .= "\r\nCc: $admin_cc_email";
			}

			if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
				// hacking attempt
			}else{
				if ($admin_email != ''){

					if (isset ($_POST['Friend_1_Email_Address']) && trim ($_POST['Friend_1_Email_Address']) != ''){
						if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
							// hacking attempt
						}else{
							$tmp = $message;
							$tmp = preg_replace ("/Friend\s+2\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+3\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+4\s+Email Address.+?\n/s",'',$tmp);
							send_mail(trim ($_POST['Friend_1_Email_Address']),$subject,$tmp,$headers,null,null);
							//echo ("<pre><hr>$_POST[Friend_1_Email_Address],$subject,$tmp,$headers<br>");
						}
					}

					if (isset ($_POST['Friend_2_Email_Address']) && trim ($_POST['Friend_2_Email_Address']) != ''){
						if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
							// hacking attempt
						}else{
							$tmp = $message;
							$tmp = preg_replace ("/Friend\s+1\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+3\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+4\s+Email Address.+?\n/s",'',$tmp);
							send_mail(trim ($_POST['Friend_2_Email_Address']),$subject,$tmp,$headers,null,null);
							//echo ("<hr>$_POST[Friend_2_Email_Address],$subject,$tmp,$headers<br>");
						}
					}

					if (isset ($_POST['Friend_3_Email_Address']) && trim ($_POST['Friend_3_Email_Address']) != ''){
						if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
							// hacking attempt
						}else{
							$tmp = $message;
							$tmp = preg_replace ("/Friend\s+1\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+2\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+4\s+Email Address.+?\n/s",'',$tmp);
							send_mail(trim ($_POST['Friend_3_Email_Address']),$subject,$tmp,$headers,null,null);
							//echo ("<hr>$_POST[Friend_3_Email_Address],$subject,$tmp,$headers<br>");
						}
					}

					if (isset ($_POST['Friend_4_Email_Address']) && trim ($_POST['Friend_4_Email_Address']) != ''){
						if (preg_match(' /[\r\n,;\'"]/ ', $Email_Address)){
							// hacking attempt
						}else{
							$tmp = $message;
							$tmp = preg_replace ("/Friend\s+1\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+2\s+Email Address.+?\n/s",'',$tmp);
							$tmp = preg_replace ("/Friend\s+3\s+Email Address.+?\n/s",'',$tmp);
							send_mail(trim ($_POST['Friend_4_Email_Address']),$subject,$tmp,$headers,null,null);
							//echo ("<hr>$_POST[Friend_4_Email_Address],$subject,$tmp,$headers<br>");
						}
					}

					list ($uploaded_file1,$uploaded_file2) = send_mail($admin_email,$subject,$message,$headers,null,null);
					//echo "<pre>$admin_email<br>$subject<br>$message<br>$headers<br>";
				}else{
					error ("Form cannot be submitted. Admin email address has not been configured");
					exit;
				}

				if(isset($_POST['Send_To_Me']) && $_POST['Send_To_Me'] == "Yes"){

					$headers = "From: $Email_Address";

						//$message .= "Send to Yourself: Yes\n";
					//$message .= "Security Code: $_POST[Security_Code]\n";


					$website_name = $_SERVER['HTTP_REFERER'];

					$website_name = preg_replace ("/(http\:\/\/.+?)\/.+/","$1",$website_name);

					if ($f == 6){
						// send to friend

						$user_message = <<<End
This is a copy of the email

Message:

$message
End;
					}else{
						$user_message = <<<End
This is a copy of the email sent to $website_name

Message:

$message
End;
					}

					send_mail($Email_Address,$subject,$user_message,$headers,$uploaded_file1,$uploaded_file2);
					//echo "<pre>$Email_Address<br>$subject<br>$user_message<br>$headers<br>";exit;

				}
			}
		}

  		thank_you ();
		exit;

		if (($security_level == "highest" || $security_level == "high" || $security_level == "medium") && isset($_SESSION['turing_guesses'])){
			if (++$_SESSION['turing_guesses'] >= $num_guesses ) {

				$message = '<font color = "#CC0000"><b><center>You made too many wrong guesses.  Sorry.</font>';
				error ($message);
		        	exit;
			}
		}

		if (($security_level == "highest" || $security_level == "high" || $security_level == "medium") && isset($_SESSION['turing_guesses'])){

			$message = '<p><font color="#CC0000"><b>Sorry, the security code did not match.<br>You have ' .
			        	($num_guesses - $_SESSION['turing_guesses']) .
				        ' more attempts.</font></p>';

			$show_missing_fields_message = "no";
			redisplay($message,$form_to_use,null,$show_missing_fields_message,$is_iframe);
			exit;
		}else{

			$show_missing_fields_message = "no";
			redisplay(null,$form_to_use,null,$show_missing_fields_message,$is_iframe);
			exit;

		}
	}

}else{

	$first_time = "Yes";
	redisplay(null,$form_to_use,$first_time,null,$is_iframe);
	exit;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
function redisplay ($security_code_error_message,$form_to_use,$first_time,$show_missing_fields_message,$is_iframe){
/////////////////////////////////////////////////////////////////////////////////////////////////////

global $_POST;
global $security_level;

global $use_border;
global $turing_text_font;
global $turing_image_font;

global $required_fields;
global $iframe_background_color;
global $form_background_color;
global $form_border_color;
global $f;
global $missing_fields_message;
global $path_to_border_images;
global $text_color;
global $font_style;
global $text_size;
global $terms;
global $formtop;
global $formbottom;
global $subject_hidden_field;

global $content1;

global $missing_image_url;
global $required_image_url;

global $turing_image_url;

if ($security_level == 'high') {
	// save in session variable
	$letters = generate_turing_letters ($turing_image_font);
}else if ($security_level == 'medium') {
	// save in session variable
	generate_turing_text ();
}

$header = "";
$footer = "";

$Security_Code_Required = "";
$security_code_HTML = "";

if (!isset ($is_iframe) || $is_iframe != 'yes'){
	$header = get_header();
	$footer = get_footer();
}

$image_to_display = "";

if ($first_time == "Yes"){
	$image_to_display = "<img src='".$required_image_url."' border='0' alt='Required Field'>";
}else{
	$image_to_display = "<img src='".$missing_image_url."' border='0' alt='Required Field'>";
}


if ($required_fields[0] == ""){
	$required_fields = get_required_fields($form_to_use);
}

$fp = fopen($form_to_use,"r") or die("Cannot open form file $form_to_use");
while (!feof($fp)) {

	$line = fgets ($fp, 1024);
	$line = preg_replace("/%%header%%/i",$header,$line);
	$line = preg_replace("/%%footer%%/i",$footer,$line);


if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	// form has been submitted

	foreach ($_POST as $posted_field_name=>$posted_value){

		if (isset($_POST['Email_Address']) && isset($_POST['Confirm_Email_Address'])){
			if (trim($_POST['Email_Address']) != "" && trim($_POST['Confirm_Email_Address']) != ""){
				if (trim($_POST['Email_Address']) != trim($_POST['Confirm_Email_Address'])){

					$pattern = "Email_Address_Mismatch";
					$line = preg_replace("/%%$pattern%%/i","<font color='#CC0000'><b>Your email address and confirm email address are not the same</b></font>",$line);
					$pattern = "";

				}
			}
		}

		if($posted_field_name == "State"){

			$posted_value = stripslashes($posted_value);

			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","selected",$line);
			$pattern = "";
			//state as text input field
			$line = preg_replace("/%%$posted_field_name%%/i",$posted_value,$line);

		}else if ($posted_field_name == "Birth_Month"
			|| $posted_field_name == "Birth_Day"
			|| $posted_field_name == "Birth_Year"
            || $posted_field_name == "Bedrooms"
            || $posted_field_name == "Bathrooms"
            || $posted_field_name == "Card_Design"
            || $posted_field_name == "Quantity"
            || $posted_field_name == "Alteration"
            || $posted_field_name == "Best_Contact_Time"
            || $posted_field_name == "Best_Contact_Time_Alternate"
            || $posted_field_name == "Shipping_Instructions"
            || $posted_field_name == "Contact_Patient_Via"
            || $posted_field_name == "Payment_Type"
            || $posted_field_name == "Listen_More_On"
            || $posted_field_name == "Children"
            || $posted_field_name == "Room_Type"
            || $posted_field_name == "Adults"
            || $posted_field_name == "Discounts"
            || $posted_field_name == "Vehicles"
            || $posted_field_name == "Origin_State"
            || $posted_field_name == "Origin_Best_Contact_Time"
            || $posted_field_name == "Origin_Best_Contact_Time_Alternate"
            || $posted_field_name == "Destination_State"
            || $posted_field_name == "Destination_Best_Contact_Time"
            || $posted_field_name == "Destination_Best_Contact_Time_Alternate"
            || $posted_field_name == "Priority"
            || $posted_field_name == "Email_Subject"
            || $posted_field_name == "Support_Category"
            || $posted_field_name == "How_Did_You_Find_Our_Website"
            || $posted_field_name == "Property_Refinish_Type"
            || $posted_field_name == "Request_Complete_When"
            || $posted_field_name == "Project_Status"
            || $posted_field_name == "Newsletter"
            || $posted_field_name == "How_did_you_find_us"
            || $posted_field_name == "Garment_Type"
            || $posted_field_name == "Print_Location"
            || $posted_field_name == "Nbr_Colors_Front"
            || $posted_field_name == "Nbr_Colors_Back"
            || $posted_field_name == "Nbr_Colors_Sleeve"            
            ){

			$posted_value = stripslashes($posted_value);

			$pattern = $posted_field_name."_".$posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","selected",$line);
			$pattern = "";


/*
 Note: To add a different "drop-down" field to your form, copy the above block of code:

 || $posted_field_name == "Bedrooms"

 Then paste it below the others.
 Then rename "Bedrooms" to the name of the "drop down" field
 on your form that you are adding.
 */


		}else if($posted_field_name == "Method_Of_Payment"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";

/*
 Note: To add a different "radio-button" field to your form, copy the above block of code:

 }else if($posted_field_name == "Method_Of_Payment"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";

 Then paste it below the others.
 Then rename "Method_Of_Payment" to the name of the "radio-button" field
 on your form that you are adding.
 */

 	}else if($posted_field_name == "Envelope"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "The_Vehicle_Condition"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";

		}else if($posted_field_name == "Card_Style"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";

		}else if($posted_field_name == "Envelope"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Gender"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Level_of_Preparation"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "After_Hours"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Insurance_Claim"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Commercial_Location"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Own_This_Property"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Preferred_Communication"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Dedicated_Fax"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Send_Quote"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Ship_to_is"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Preferred_Method_Of_Contact"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Same_As"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Customer_Service"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Rate_Website"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		}else if($posted_field_name == "Do_Business_With_Us_Again"){
			//radio button

			$posted_value = stripslashes($posted_value);
			$pattern = $posted_value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
			
		
 		}else if(strpos( $posted_field_name, "Suitable_For" ) === 0
		|| strpos( $posted_field_name, "Activities" ) === 0
		|| strpos( $posted_field_name, "Work_Needed" ) === 0
		|| $posted_field_name == "Mostly"
		|| $posted_field_name == "How_Often"
		|| strpos( $posted_field_name, "I_Listen_To" ) === 0
		|| strpos( $posted_field_name, "Room_Details" ) === 0
		|| $posted_field_name == "Subscription_Plan"
		|| $posted_field_name == "Agreement_To_Terms"
		|| strpos( $posted_field_name, "Website_Needs" ) === 0
		|| strpos( $posted_field_name, "Refinishing_Rooms" ) === 0
		|| strpos( $posted_field_name, "Types_of_Refinishing" ) === 0
		|| strpos( $posted_field_name, "Refinish_Work_Needed" ) === 0
		|| strpos( $posted_field_name, "Mothers_Phone" ) === 0
		){
     	 		$value = preg_replace("/ /i","_",$posted_value);
	         	// echo $value;
			$pattern = $posted_field_name."_".$value."_selected";
			$line = preg_replace("/%%$pattern%%/i","checked",$line);
			$pattern = "";
/*
 Note: To add a different "check box" field to your form, copy the above block of code:

 To add your new RADIO BUTTON (mutually exclusive options) field/value to the above code:

 		}else if(strpos( $posted_field_name, "Suitable_For" ) === 0
		|| strpos( $posted_field_name, "Activities" ) === 0
		|| strpos( $posted_field_name, "Work_Needed" ) === 0
                || $posted_field_name == "My_New_Radio_Button"
                ){

 Then paste it below the others.
 Of course, name "My_New_Radio_Button" the actual name of your radio button.
 
 ------
 
 To add your new check box field/value to the above code:

 		}else if(strpos( $posted_field_name, "Suitable_For" ) === 0
		|| strpos( $posted_field_name, "Activities" ) === 0
		|| strpos( $posted_field_name, "Work_Needed" ) === 0
                || strpos( $posted_field_name, "My_New_Checkbox" ) === 0
                ){

 Then paste it below the others.
 Of course, name "My_New_Check_Box" the actual name of your check box.
 */
		}else{
			$posted_value = stripslashes($posted_value);
			$line = preg_replace("/%%$posted_field_name%%/i",$posted_value,$line);

			if (isset($posted_value)){

				// check if we have any more radio buttons left
				$posted_value = stripslashes($posted_value);
				$posted_value = preg_replace("/\//","_",$posted_value);

				if (!preg_match("/\//",$posted_value)){
					$pattern = "$posted_field_name"."_$posted_value"."_selected";
					$line = preg_replace("/%%$pattern%%/i","checked",$line);
				}
				$pattern = "";
				//echo "$pattern<hr>";

			}
		}
	}

	foreach ($required_fields as $key=>$req_field_name){

		if (($req_field_name == 'Birth_Month' || $req_field_name == 'Birth_Day' || $req_field_name == 'Birth_Year') &&
			(isset ($_POST[$req_field_name]) && $_POST[$req_field_name] == "")){

			$missing = $image_to_display;
			//$missing = '<font color="#CC0000"><b>required<!-- field--></b></font>';

			$pattern = "Birth_Date_Required";


			$line = preg_replace("/%%$pattern%%/i",$missing,$line);

		}else{

			$pattern = $req_field_name."_Required";
			$temp =	$req_field_name;
			$temp = preg_replace("/_/"," ",$temp);

			// check radio buttons and input fields

			if(isset ($_POST["$req_field_name"]) /*&& is_array ($_POST["$req_field_name"]) && $_POST["$req_field_name"][0] != "" */){
                           if( trim($_POST[$req_field_name]) == "" )
                               $missing = $image_to_display;
//OK
			}else{
			        $is_empty = true;
           			$aKeys = array_keys( $_POST );
				foreach( $aKeys as $sKey )
				{				         
				         if( strpos( $sKey, $req_field_name ) === 0 )
				         {
				             $is_empty = false;
				         }    
				}  
				if( $is_empty === true ) $missing = $image_to_display;
				 
			/*
				if (!isset($_POST[$req_field_name]) || (isset($_POST[$req_field_name]) && (trim($_POST[$req_field_name]) == "" || count ($_POST[$req_field_name]) <= 0))){

					$missing = $image_to_display;
				} */
				
			}
//
//			if (!isset($_POST[$req_field_name]) || (isset($_POST[$req_field_name]) && (trim($_POST[$req_field_name]) == "" || count ($_POST[$req_field_name]) <= 0))){

//				$missing = $image_to_display;

//				//$missing = '<font color="#CC0000"><b>required<!-- field--></b></font>';
//			}
//
			if (isset($missing)){
				$line = preg_replace("/%%$pattern%%/i",$missing,$line);
				if ($pattern == "Security_Code_Required"){
					$Security_Code_Required = $image_to_display;
				}
			}
		}

		$pattern = "";
		$missing = "";

	}


	$line = preg_replace("/%%background_color%%/","bgcolor=\"$form_background_color\"",$line);
	$line = preg_replace("/%%iframe_background_color%%/",$iframe_background_color,$line);
	$line = preg_replace("/%%text_color%%/",$text_color,$line);
	$line = preg_replace("/%%font_style%%/",$font_style,$line);
	$line = preg_replace("/%%text_size%%/",$text_size,$line);
	$line = preg_replace("/%%terms%%/",$terms,$line);
	$line = preg_replace("/%%formtop%%/",base64_decode($formtop),$line);
	$line = preg_replace("/%%subject_hidden_field%%/",$subject_hidden_field,$line);
	$line = preg_replace("/%%content1%%/",$content1,$line);

	$line = preg_replace("/%%border_color%%/","bgcolor=\"$form_border_color\"",$line);
	$line = preg_replace("/%%form_to_use%%/",$f,$line);
	$line = preg_replace("/%%formbottom%%/",base64_decode($formbottom),$line);

	if ($security_level == 'highest'){

		$security_code_HTML = <<<End
   <table>
    <tr>
     <td align="center" colspan="3">&nbsp;$security_code_error_message&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><img src="$turing_image_url" width="173" height="80"></td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><p align="center">Enter the security code you see above.</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
				<td>
				<p align="right">Security Code: &nbsp;
				</td>
				<td><input name="Security_Code" maxlength="50" size="6"></td>
				<td align="left"> &nbsp;$Security_Code_Required</td>
			</tr>
   </table>
End;

	}else if ($security_level == 'high'){

		$security_code_HTML = <<<End
   <table>
    <tr>
     <td align="center" colspan="3">&nbsp;$security_code_error_message&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3">$letters</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><p align="center">Enter the security code you see above.</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
				<td>
				<p align="right">Security Code: &nbsp;
				</td>
				<td><input name="Security_Code" maxlength="50" size="6"></td>
				<td align="left"> &nbsp;$Security_Code_Required</td>
			</tr>
   </table>
End;

	}else if ($security_level == 'medium'){

		$turing_text = "<h2><font face='$turing_text_font'>".$_SESSION['turing_string']."</font></h2>";

		$security_code_HTML = <<<End
   <table>
    <tr>
     <td align="center" colspan="3">&nbsp;$security_code_error_message&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3">$turing_text</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><p align="center">Enter the security code you see above.</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
				<td>
				<p align="right">Security Code: &nbsp;
				</td>
				<td><input name="Security_Code" maxlength="50" size="6"></td>
				<td align="left"> &nbsp;$Security_Code_Required</td>
			</tr>
   </table>
End;

	}else if ($security_level == 'lowest'){

	}

	$line = preg_replace("/%%Security_Code_HTML%%/",$security_code_HTML,$line);


	if ($show_missing_fields_message != "no"){
		$line = preg_replace("/%%missing_fields_message%%/",$missing_fields_message,$line);
	}

	if ($use_border == 'yes'){

		$top_left = '<img src="'.$path_to_border_images.'/top_left.gif" width="25" height="24">';
		$line = preg_replace("/%%top_left%%/",$top_left,$line);

		$top_bar = 'style="width: 100%; background-image: url(\''.$path_to_border_images.'/top_bar.gif\'); background-repeat: repeat-x"';
		$line = preg_replace("/%%top_bar%%/",$top_bar,$line);

		$top_right = '<img src="'.$path_to_border_images.'/top_right.gif" width="25" height="24">';
		$line = preg_replace("/%%top_right%%/",$top_right,$line);

		$left_bar = 'style="background-image: url(\''.$path_to_border_images.'/left_bar.gif\'); background-repeat: repeat-y"';
		$line = preg_replace("/%%left_bar%%/",$left_bar,$line);

		$right_bar = 'style="background-image: url(\''.$path_to_border_images.'/right_bar.gif\'); background-repeat: repeat-y"';
		$line = preg_replace("/%%right_bar%%/",$right_bar,$line);

		$btm_left = '<img src="'.$path_to_border_images.'/btm_left.gif" width="25" height="24">';
		$line = preg_replace("/%%btm_left%%/",$btm_left,$line);

		$btm_bar = 'style="width: 100%; background-image: url(\''.$path_to_border_images.'/btm_bar.gif\'); background-repeat: repeat-x"';
		$line = preg_replace("/%%btm_bar%%/",$btm_bar,$line);

		$btm_right = '<img src="'.$path_to_border_images.'/btm_right.gif" width="25" height="24">';
		$line = preg_replace("/%%btm_right%%/",$btm_right,$line);
	}

if ($content1 == 'yes'){

		$field1 = '<tr>
     <td align="center" colspan="2">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table23">
			<tr>
				<td width="5">%%required_image_star%%</td>
				<td width="90">
				<p align="right">Name test:&nbsp; 
				 </td>
				<td>
				
				<input name="Name" maxlength="50" size="25" value="%%Name%%"> 
				%%Name_Required%%</td>
			</tr>
		</table>
		</td>
    </tr>';
    $line = preg_replace("/%%field1%%/",$field1,$line);

	}



	$line = preg_replace("/%%required_image_star%%/","<img src='".$required_image_url."' border='0'>",$line);
	$line = preg_replace("/%%.+?%%/","",$line); // remove anything still left

}else{
	// displaying the form for the first time


	if ($security_level == 'highest'){

		$security_code_HTML = <<<End
   <table>
    <tr>
     <td align="center" colspan="3">&nbsp;$security_code_error_message&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><img src="$turing_image_url" width="173" height="80"></td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><p align="center">Enter the security code you see above.</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
				<td>
				<p align="right">Security Code: &nbsp;
				</td>
				<td><input name="Security_Code" maxlength="50" size="6"></td>
				<td align="left"> &nbsp;$Security_Code_Required</td>
			</tr>
   </table>
End;

	}else if ($security_level == 'high'){

		$security_code_HTML = <<<End
   <table>
    <tr>
     <td align="center" colspan="3">&nbsp;$security_code_error_message&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3">$letters</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><p align="center">Enter the security code you see above.</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
				<td>
				<p align="right">Security Code: &nbsp;
				</td>
				<td><input name="Security_Code" maxlength="50" size="6"></td>
				<td align="left"> &nbsp;$Security_Code_Required</td>
			</tr>
   </table>
End;

	}else if ($security_level == 'medium'){

		$turing_text = "<h2><font face='$turing_text_font'>".$_SESSION['turing_string']."</font></h2>";

		$security_code_HTML = <<<End
   <table>
    <tr>
     <td align="center" colspan="3">&nbsp;$security_code_error_message&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3">$turing_text</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
     <td align="center" colspan="3"><p align="center">Enter the security code you see above.</td>
    </tr>

    <tr>
     <td align="center" colspan="3">&nbsp;</td>
    </tr>

    <tr>
				<td>
				<p align="right">Security Code: &nbsp;
				</td>
				<td><input name="Security_Code" maxlength="50" size="6"></td>
				<td align="left"> &nbsp;$Security_Code_Required</td>
			</tr>
   </table>
End;

	}else if ($security_level == 'lowest'){

	}

	$line = preg_replace("/%%Security_Code_HTML%%/",$security_code_HTML,$line);

	$line = preg_replace("/%%background_color%%/","bgcolor=\"$form_background_color\"",$line);
	$line = preg_replace("/%%iframe_background_color%%/",$iframe_background_color,$line);
	$line = preg_replace("/%%text_color%%/",$text_color,$line);
	$line = preg_replace("/%%font_style%%/",$font_style,$line);
	$line = preg_replace("/%%text_size%%/",$text_size,$line);
	$line = preg_replace("/%%terms%%/",$terms,$line);
	$line = preg_replace("/%%formtop%%/",base64_decode($formtop),$line);
	$line = preg_replace("/%%formbottom%%/",base64_decode($formbottom),$line);
	$line = preg_replace("/%%subject_hidden_field%%/",$subject_hidden_field,$line);
	$line = preg_replace("/%%content1%%/",$content1,$line);

	$line = preg_replace("/%%border_color%%/","bgcolor=\"$form_border_color\"",$line);
	$line = preg_replace("/%%form_to_use%%/",$f,$line);

	foreach ($required_fields as $key=>$req_field_name){

		if (isset($_POST["$req_field_name"])){

			if (($req_field_name == 'Birth_Month' || $req_field_name == 'Birth_Day' || $req_field_name == 'Birth_Year') &&

				$_POST[$req_field_name] == ""){

				$missing = $image_to_display;
				//$missing = '<font color="#CC0000"><b>required<!-- field--></b></font>';

				$pattern = "Birth_Date_Required";

				$line = preg_replace("/%%$pattern%%/i",$missing,$line);

			}else{

				$pattern = $req_field_name."_Required";
				$temp =	$req_field_name;
				$temp = preg_replace("/_/"," ",$temp);

				if (isset($_POST[$req_field_name]) && trim($_POST[$req_field_name]) == ""){
					$missing = $image_to_display;
					//$missing = '<font color="#CC0000"><b>required<!-- field--></b></font>';
				}

				if (isset($missing)){
					$line = preg_replace("/%%$pattern%%/i",$missing,$line);
				}
			}
		}

		$pattern = "";
		$missing = "";

	}

	$line = preg_replace("/%%required_image_msg%%/","(<img src='".$required_image_url."' border='0'> indicates a required field)",$line);

	if ($use_border == 'yes'){

		$top_left = '<img src="'.$path_to_border_images.'/top_left.gif" width="25" height="24">';
		$line = preg_replace("/%%top_left%%/",$top_left,$line);

		$top_bar = 'style="width: 100%; background-image: url(\''.$path_to_border_images.'/top_bar.gif\'); background-repeat: repeat-x"';
		$line = preg_replace("/%%top_bar%%/",$top_bar,$line);

		$top_right = '<img src="'.$path_to_border_images.'/top_right.gif" width="25" height="24">';
		$line = preg_replace("/%%top_right%%/",$top_right,$line);

		$left_bar = 'style="background-image: url(\''.$path_to_border_images.'/left_bar.gif\'); background-repeat: repeat-y"';
		$line = preg_replace("/%%left_bar%%/",$left_bar,$line);

		$right_bar = 'style="background-image: url(\''.$path_to_border_images.'/right_bar.gif\'); background-repeat: repeat-y"';
		$line = preg_replace("/%%right_bar%%/",$right_bar,$line);

		$btm_left = '<img src="'.$path_to_border_images.'/btm_left.gif" width="25" height="24">';
		$line = preg_replace("/%%btm_left%%/",$btm_left,$line);

		$btm_bar = 'style="width: 100%; background-image: url(\''.$path_to_border_images.'/btm_bar.gif\'); background-repeat: repeat-x"';
		$line = preg_replace("/%%btm_bar%%/",$btm_bar,$line);

		$btm_right = '<img src="'.$path_to_border_images.'/btm_right.gif" width="25" height="24">';
		$line = preg_replace("/%%btm_right%%/",$btm_right,$line);
	}

	
	if ($content1 == 'yes'){

		$field1 = '<tr>
     <td align="center" colspan="2">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table23">
			<tr>
				<td width="5">%%required_image_star%%</td>
				<td width="90">
				<p align="right">Name test:&nbsp; 
				 </td>
				<td>
				
				<input name="Name" maxlength="50" size="25" value="%%Name%%"> 
				%%Name_Required%%</td>
			</tr>
		</table>
		</td>
    </tr>';
    $line = preg_replace("/%%field1%%/",$field1,$line);
    
	}


	$line = preg_replace("/%%required_image_star%%/","<img src='".$required_image_url."' border='0'>",$line);

	$line = preg_replace("/%%.+?%%/","",$line); // remove anything still left

}

	echo "$line";

}

fclose ($fp);

}

/////////////////////////////////////////////////////////////////////////////////////////////////////
function error ($message){
/////////////////////////////////////////////////////////////////////////////////////////////////////

echo <<<End
<html>
<head>
<title>Error</title>
<link href="./inc/stylesbwf.css" rel="stylesheet" type="text/css">
</head>
<body>
End;

echo ("$message");
echo ("<br>");
echo ("<a href='javascript:history.go(-1)'><< back</a>");

echo <<<End
</form>
</body>
</html>
End;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////
function get_required_fields ($form_to_use) {
/////////////////////////////////////////////////////////////////////////////////////////////////////

$required_fields = array();

$fp = fopen($form_to_use,"r") or die("Cannot open form file $form_to_use");
$contents = fread ($fp, filesize ($form_to_use));
fclose ($fp);

if (preg_match("/required_fields.+?\"(.+?)\"/si",$contents,$matches)){
	$required_fields = preg_split("/\s*,\s*/si",$matches[1]);
}

return ($required_fields);

}


// email rewrite 20080728 - START  

/////////////////////////////////////////////////////////////////////////////////////////////////////
function send_mail( $send_to, $subject, $message, $headers, $uploaded_file1, $uploaded_file2 ) {
/////////////////////////////////////////////////////////////////////////////////////////////////////
global $admin_override_from ;
global $admin_from_email ;

if ($admin_override_from == "true") {
  preg_match("/(From:\s)(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/", $headers, $tmp, PREG_OFFSET_CAPTURE) ;

  $match = $tmp[0][0] ;
  $headers = str_replace($match, "From: {$admin_from_email}", $headers) . "\r\nReply-To:" . str_replace("From:", "", $match) ;
}

$destination_file = '';
$destination_file2 = '';
$data = '';
$data2 = '';
$filename = '';
$filename2 = '';

$isfile1 = false;
$isfile2 = false;

$upload_path = substr ($_SERVER['SCRIPT_FILENAME'],0,strrpos ($_SERVER['SCRIPT_FILENAME'],'/'));

if ((isset ($_FILES['File']['tmp_name']) && is_uploaded_file ($_FILES['File']['tmp_name']))
|| (file_exists ("$uploaded_file1") && is_file ("$uploaded_file1"))){

	//echo "<h1>".$_FILES['File']['name']." $uploaded_file1</h1>";
	//echo $upload_path;

	$filename = $_FILES['File']['name'];

	$destination_file = $uploaded_file1?$uploaded_file1:$upload_path."/temp/$filename";

	if( $uploaded_file1 == null ){
            move_uploaded_file ($_FILES['File']['tmp_name'],$destination_file) or die ("Cannot move uploaded file");
            $rawdata = file_get_contents( $destination_file );
            $data = chunk_split( base64_encode( $rawdata ) ); 

	}
	else
	{
            $rawdata = file_get_contents( $destination_file );
            $data = chunk_split( base64_encode( $rawdata ) ); 
            $fileinfo = pathinfo( $destination_file );
            $filename = $fileinfo["basename"];
            @unlink ($destination_file);                     
        }
        $isfile1 = true; 
}

$upload_path2 = substr ($_SERVER['SCRIPT_FILENAME'],0,strrpos ($_SERVER['SCRIPT_FILENAME'],'/'));

if ((isset ($_FILES['File2']['tmp_name']) && is_uploaded_file ($_FILES['File2']['tmp_name']))
|| (file_exists ("$uploaded_file2") && is_file ("$uploaded_file2"))){

	//echo $_FILES['File2']['name'];
	//echo $upload_path2;

	$filename2 = $_FILES['File2']['name'];

	$destination_file2 = $uploaded_file2?$uploaded_file2:$upload_path2."/temp/$filename2";
	
//	$mimetype2 = mime_content_type( $destination_file2 );

	if( $uploaded_file2 == null )
	{
	    move_uploaded_file ($_FILES['File2']['tmp_name'],$destination_file2) or die ("Cannot move uploaded file");
	    $rawdata = file_get_contents( $destination_file2 );
            $data2 = chunk_split( base64_encode( $rawdata ) );
  	} 
  	else
  	{
            $rawdata = file_get_contents( $destination_file2 );
            $data2 = chunk_split( base64_encode( $rawdata ) );
            $fileinfo = pathinfo( $destination_file2 );
            $filename2 = $fileinfo["basename"];
            @unlink ($destination_file2);
        }
        $isfile2 = true;
	
}

if( $isfile1 || $isfile2 )
{   // start multipart email with attachments
    // Generate a boundary string
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    $headers .= "\r\nMIME-Version: 1.0\r\n" .
                "Content-Type: multipart/mixed;\r\n" .
                " boundary=\"{$mime_boundary}\"\r\n\r\n";

    $message = "This is a multi-part message in MIME format.\r\n" .
                "--{$mime_boundary}\r\n" .
                "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n" .
                "Content-Transfer-Encoding: 7bit\r\n\r\n" .
                 $message . "\r\n";

    if( $isfile1 && ( strlen( $data ) > 0 ) )
    {

	$message .= "--{$mime_boundary}\r\n" .
                    "Content-Type: application/octet-stream;\r\n" .
                    " name=\"{$filename}\"\r\n" .
                    "Content-Transfer-Encoding: base64\r\n".
                    "Content-Disposition: inline;\r\n".
                    " filename=\"{$filename}\"\r\n\r\n".
                    $data;
    }

    if( $isfile2 && ( strlen( $data2 ) > 0 ) )
    {
	$message .= "\r\n--{$mime_boundary}\r\n".
                    "Content-Type: application/octet-stream;\r\n" .
                    " name=\"{$filename2}\"\r\n" .
                    "Content-Transfer-Encoding: base64\r\n" .
                    "Content-Disposition: inline;\r\n".
                    " filename=\"{$filename2}\"\r\n\r\n" .
                    $data2;
    } 
    
    $message .=  "--{$mime_boundary}--";

}   // end multi-part attachment email composition
else
{   // no attached files -> start plain text email
    $headers .= "\r\nMIME-Version: 1.0\r\n".
                "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n".
                "Content-Transfer-Encoding: 8bit\r\n";
}    // end plain text email

// guarantee conformity to email standard line break
$message = str_replace("\r\n","\n",$message);
$message = str_replace("\r","\n",$message);
$message = str_replace("\n","\r\n",$message);
// $message .= "\r\n.\r\n";

// echo ("<pre>$send_to $subject <hr>$message<hr> $headers <br><hr><hr>$destination_file<br>"); 

mail($send_to,$subject,$message,$headers);

// echo "<pre>$message</pre>"; die();
// die();



return array ($destination_file,$destination_file2);

}

// email rewrite 20080728 - END 

/////////////////////////////////////////////////////////////////////////////////////////////////////
function thank_you () {
/////////////////////////////////////////////////////////////////////////////////////////////////////

global $custom_thankyou_page;
global $popup_thank_you_url;
global $thank_you_url;
global $default_thank_you_url;
global $f;

if ($custom_thankyou_page == 'default'){

	if (isset ($_POST['Security_Code'])){

		header("Location: $default_thank_you_url?t=".$_POST['Security_Code']."&f=".$f);
		exit;
	}else{
		header("Location: $default_thank_you_url?t=&f=".$f);
		exit;
	}

}else if ($custom_thankyou_page == 'custom') {

	if (isset ($_POST['Security_Code'])){

		header("Location: $thank_you_url?t=".$_POST['Security_Code']."&f=".$f);
		exit;
	}else{
		header("Location: $thank_you_url?t=&f=".$f);
		exit;
	}

}else if ($custom_thankyou_page == 'popup') {

	if (isset ($_POST['Security_Code'])){

		header("Location: $popup_thank_you_url?t=".$_POST['Security_Code']."&f=".$f);
		exit;
	}else{
		header("Location: $popup_thank_you_url?t=&f=".$f);
		exit;
	}

}else if ($custom_thankyou_page == 'no') {

	header("Location: /");
	exit;

}else{
	header("Location: /");
	exit;
}

}

?>
