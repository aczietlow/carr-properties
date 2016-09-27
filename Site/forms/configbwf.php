<?php

/*
* (C) Copyright 2008 BestWebForms.com
* For information visit http://www.bestwebforms.com/
* All rights reserved. Used only by permission under license agreement.
*/

$admin_username = "admin";
$admin_password = "admin";

$security_level = "highest";
$turing_text_font = "verdana";

$turing_image_font = "timesroman";
$use_border = "yes";
$custom_thankyou_page = "default";

$send_emails = 'yes';

$thank_you_url = "http://bestwebforms.com/formthankyou.php";
$default_thank_you_url = "./thank_youbwf.php";
$popup_thank_you_url = "pop_thank_youbwf.php";

$popup_thankyou_location = "http://www.bestwebforms.com";

$path_to_border_images = "./Border/border18";

$use_trans_borders = "yes";

$subject_hidden_field = "Your online form has been submitted.";

$text_color = "000000";

$font_style = "verdana";

$text_size = "10pt";

$subject_hidden_field = "Your online form has been submitted.";

$terms = "<u>Sample Agreement</u><br><br>The terms of agreement are as follows...<br> <br><i>write your agreement text here</i>...<br><br>1. The pages that follow are copyright protected. By agreeing to the below and entering you acknowledge this and will not copy or reproduce it in any way.<br><br>2. You also state that you are an authorized person.<br><br>Thank you.";
$formtop = "";
$formbottom = "";

$validation_arrow = "missing.gif";
$validation_star = "required-red-asterisk.gif";

$missing_image_url = "./arrow_images/$validation_arrow";
$required_image_url = "./star_images/$validation_star";

$popup_thankyou_message = "Thank you!\nYour email has been sent.\nWe will reply to you soon!";

$missing_fields_message = <<<End
<font color="#FF0000">Some required information is
missing!</font>
End;

$form_background_color = "F5F5F5";
$iframe_background_color = "FFFFFF";
$form_border_color = "808080";

$default_form = "1";

$forms = array (

1	=>	"contactus-classic.html",
2	=>	"contactus-complete.html",
3	=>	"contactus-alternate.html",
4	=>	"contactus-attachment.html",
5	=>	"contactus-narrow.html",
6	=>	"contactus-short.html",
7	=>	"sendtofriend.html",
8	=>	"registration.html",
9	=>	"product.html",
10	=>	"support.html",
11	=>	"booking-event.html",
12	=>	"booking-hotel.html",
13	=>	"property-vacation.html",
14	=>	"estimate.html",
15	=>	"estimate-contractor.html",
16	=>	"subscribe.html",
17	=>	"subscribe-church.html",
18	=>	"survey.html",
19	=>	"survey-radio.html",
20	=>	"lunch-order.html",
21	=>	"prescription.html",
22	=>	"card-store.html",
23	=>	"skinny-contact-form.html",
24	=>	"skinny-contact-form-complete.html",
25	=>	"skinny-subscribe.html",
26	=>	"contactus-classic-javascript.html",
27	=>	"auto-shipping-order.html",
28	=>	"quote-request-form.html",
29	=>	"subscription-form-UK.html",
30	=>	"contactus-subject-menu.html",
31	=>	"agreement-to-terms.html",
32	=>	"estimate-refinishing.html",
33	=>	"contactus-basic.html",
34	=>	"subscribe-newsletter.html",
35	=>	"product-order2.html",
36	=>	"quote-and-product-info-form.html",
37	=>	"garment-quote-form.html",
38	=>	"contactus-with-fax.html",
39	=>	"contactus-super-skinny-javascript.html",
40	=>	"estimate-camcorder-repair.html",
41	=>	"admission-file-update.html",
42	=>	"sample.html",

);



$num_guesses = "10";				// how many guesses before blocking visitor

$admin_email = "mike@carr-properties"; 	// email address to send emails to
$admin_cc_email = "mike@carr-properties"; 	// email address to send a copy to
$admin_override_from = "false";
$admin_from_email = "";

$default_subject = 'Online form submission'; 	// default subject

$font = "verdana";				// font to use (must be uploaded to /inc folder)
$length = "4";					// how many digits/letters to display in the code

$path_to_form = "./templates";
$path_to_header = "./inc/header.html";
$path_to_footer = "./inc/footer.html";

$turing_image_url = "./inc/turing-image3.php";

$google_conversion_id = "1234567890";

$sep = "	";

$google_adsense_code = "";

?>
