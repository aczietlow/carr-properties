<?php

/*
 * (C) Copyright 2008 BestWebForms.com
 * For information visit http://www.bestwebforms.com/
 * All rights reserved. Used only by permission under license agreement.
 */

// compatibility patches start

// file_get_contents 4.2.x compatibility 
if (!function_exists('file_get_contents')) {
      function file_get_contents($filename, $incpath = false, $resource_context = null)
      {
          if (false === $fh = fopen($filename, 'rb', $incpath)) {
              trigger_error('file_get_contents() failed to open stream: No such file or directory', E_USER_WARNING);
              return false;
          }
 
          clearstatcache();
          if ($fsize = @filesize($filename)) {
              $data = fread($fh, $fsize);
          } else {
              $data = '';
              while (!feof($fh)) {
                  $data .= fread($fh, 8192);
              }
          }
 
          fclose($fh);
          return $data;
      }
  }
  
  
// magic quotes override

if(  ( function_exists( "get_magic_quotes_gpc" )  &&  
       ( get_magic_quotes_gpc() == 1 ) 
     )  
  )
{
       foreach( $_POST as $sKey => $sValue ) 
                $_POST[$sKey] = stripslashes( $sValue );
} /* else
       foreach( $_POST as $sKey => $sValue ) 
                $_POST[$sKey] = stripslashes( $sValue );
 */


/////////////////////////////////////////////////////////////////////////////////////////////////////
function get_header (){
/////////////////////////////////////////////////////////////////////////////////////////////////////

global $path_to_header;

$header = "";

$fp = fopen($path_to_header,"r") or die("Cannot open header file $path_to_header");
while (!feof($fp)) {

	$header .= fgets ($fp, 1024);


}

$header = stripslashes( $header );

return $header;

}

/////////////////////////////////////////////////////////////////////////////////////////////////////
function get_footer (){
/////////////////////////////////////////////////////////////////////////////////////////////////////

global $path_to_footer;

$footer = "";

$fp = fopen($path_to_footer,"r") or die("Cannot open footer file $path_to_footer");
while (!feof($fp)) {

	$footer .= fgets ($fp, 1024);

}

$footer = stripslashes( $footer );

return $footer;

}

////////////////////////////////////////////////////////////////////////////////////////////////////
function get_var ($varname) {
////////////////////////////////////////////////////////////////////////////////////////////////////

$retval = null;

if (isset($_POST["$varname"])){

	$retval = trim(preg_replace("/<.+>/","",$_POST["$varname"]));

}else if (isset($_GET["$varname"])){

	$retval = trim(preg_replace("/<.+>/","",$_GET["$varname"]));
}

/*

if(  ( function_exists( "get_magic_quotes_gpc" )  &&  
       ( get_magic_quotes_gpc() == 1 ) 
     )  
  )
{
       foreach( $_POST as $sKey => $sValue ) 
                $_POST[$sKey] = stripslashes( $sValue );
} 
 */


/*
if (!ini_get('magic_quotes_gpc')){

	if (is_array($retval)){

		$temp = array();

		foreach ($retval as $key=>$value){
			$temp["$key"] = addslashes($value);
		}

		$retval = $temp;

	}else{
		$retval = addslashes($retval);
	}
}
 */
return ($retval);

}

/////////////////////////////////////////////////////////////////////////////////////////////////////
function generate_turing_text () {
/////////////////////////////////////////////////////////////////////////////////////////////////////

global $length;

$src = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
$src .= '23456789';

if (mt_rand(0,1)==0) {
    $src = strtoupper($src);
}

$srclen = strlen($src)-1;

$_SESSION['turing_string'] = '';

$data = array();

for($i=0; $i<$length; $i++) {

    $char = substr($src, mt_rand(0,$srclen), 1);
    $_SESSION['turing_string'] .= $char;

}

return ($char);

}


/////////////////////////////////////////////////////////////////////////////////////////////////////
function generate_turing_letters ($font) {
/////////////////////////////////////////////////////////////////////////////////////////////////////

global $length;

$src = 'ABCDEFGHJIKLMNPOQRSTUVWXYZ';

if (mt_rand(0,1)==0) {
    $src = strtoupper($src);
}

$srclen = strlen($src)-1;

$_SESSION['turing_string'] = '';

$data = array();

$letters = "<table border='0' cellpadding='1' cellspacing='1'><tr>";

for($i=0; $i<$length; $i++) {

	$char = substr($src, mt_rand(0,$srclen), 1);
	$_SESSION['turing_string'] .= $char;

	$letter_num = $i+1;
        $letters .= "<td><img src='./inc/turing-letter.php?n=$letter_num'></td>";

}

$letters .= "</tr></table>";

return ($letters);

}

?>
