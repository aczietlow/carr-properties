<?php

/*
 * (C) Copyright 2008 BestWebForms.com
 * For information visit http://www.bestwebforms.com/
 * All rights reserved. Used only by permission under license agreement.
 */

session_start();

require ("../configbwf.php");
require ("../funcbwf.php");

$letter_num = get_var ('n');

$chars = preg_split ("//",$_SESSION['turing_string']);

$image_path = "../fonts/$turing_image_font/$chars[$letter_num].gif";

$imginfo = getimagesize($image_path);
$content_length = filesize($image_path);

// array of getimagesize() mime types
$getimagesize_mime = array(1=>'image/gif',2=>'image/jpeg',3=>'image/png',
                           4=>'application/x-shockwave-flash',5=>'image/psd',
                           6=>'image/bmp',7=>'image/tif',8=>'image/tiff',
                           9=>'image/jpeg',
                           13=>'application/x-shockwave-flash',
                           14=>'image/iff');

header('Cache-Control: max-age=1, must-revalidate');
header('Content-Length: '.$content_length);

if (isset($getimagesize_mime[$imginfo[1]])) {
	header('Content-Type: '.$getimagesize_mime[$imginfo[1]]);
}else if (isset($getimagesize_mime[$imginfo[2]])) {
	header('Content-Type: '.$getimagesize_mime[$imginfo[2]]);
} else {
	// send generic header
	header('Content-Type: application/octet-stream');
}

readfile($image_path);

?>