<?php

/*
 * (C) Copyright 2008 BestWebForms.com
 * For information visit http://www.bestwebforms.com/
 * All rights reserved. Used only by permission under license agreement.
 */

session_start();

putenv('GDFONTPATH=' . realpath('.'));

require "../configbwf.php";

$src = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
$src .= '23456789';

if (mt_rand(0,1)==0) {
    $src = strtoupper($src);
}

$srclen = strlen($src)-1;

$output_type='png';

$min_font_size = 30;
$max_font_size = 30;
$min_angle = -15;
$max_angle = 15;
$char_padding = 2;

$_SESSION['turing_string'] = '';
$data = array();
$image_width = $image_height = 0;

for($i=0; $i<$length; $i++) {

    $char = substr($src, mt_rand(0,$srclen), 1);
    $_SESSION['turing_string'] .= $char;

    $size = mt_rand($min_font_size, $max_font_size);
    $angle = mt_rand($min_angle, $max_angle);

    $bbox = imagettfbbox( $size, $angle, $font, $char );

    $char_width = max($bbox[2],$bbox[4]) - min($bbox[0],$bbox[6]);
    $char_height = max($bbox[1],$bbox[3]) - min($bbox[7],$bbox[5]);

    $image_width = 149;
    $image_height = 52;

    $data[] = array(
        'char'        => $char,
        'size'        => $size,
        'angle'        => $angle,
        'height'    => $char_height,
        'width'        => $char_width,
    );
}


$x_padding = 12;
$image_width += ($x_padding * 2);
$image_height = ($image_height * 1.5) + 2;

$im = imagecreate($image_width, $image_height);

$r = 215;
$g = 211;
$b = 231;

$color_bg        = imagecolorallocate($im,  $r,  $g,  $b );

$color_line0     = imagecolorallocate($im,  0,  0,  0 );
$color_line1     = imagecolorallocate($im,  0,  0,  0 );

$color_text    	 = imagecolorallocate($im,   1,   4,   148 );

$color_border    = imagecolorallocate($im,   91,   82,   143 );
$color_border    = imagecolorallocate($im,  255,  255,  255 );

$num_lines = 10;

$line_color = imagecolorallocate ($im, 0, 0, 0); 
$line_color = imagecolorallocate ($im, 255, 255, 255); 
$line_color = imagecolorallocate($im,   1,   4,   148 );

for($i=0;$i<=$num_lines;$i=$i+1){

	$y1 = round(rand(0,$image_height));
	$y2 = round(rand(0,$image_height));
	imageline($im, 0, $y1, $image_width, $y2, $line_color); 
} 

for($i=0;$i<=$num_lines;$i=$i+1){

	$x1 = round(rand(0,$image_width));
	$x2 = round(rand(0,$image_width));
	imageline($im, $x1, 0, $x2, $image_height, $line_color); 
} 
  

$pos_x = $x_padding + ($char_padding / 2);

foreach($data as $key=>$d) {

	$pos_y = ( ( $image_height + $d['height'] ) / 2 );

	imagettftext($im, $d['size'], $d['angle'], $pos_x, $pos_y, $color_text, $font, $d['char'] );

	$pos_x += $d['width'] + $char_padding;

}


imagerectangle($im, 0, 0, $image_width-1, $image_height-1, $color_border);

// deactivate Cache
header("Expires: Mon, 01 Jul 1990 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") ." GMT"); 
header("Pragma: no-cache"); 
header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");

switch ($output_type) {
	case 'jpeg':
	header('Content-type: image/jpeg','true');
	imagejpeg($im,NULL,100);
	break;

	case 'png':
	default:
	header('Content-type: image/png','true');
	imagepng($im);
	break;
} 

imagedestroy($im);

?>
