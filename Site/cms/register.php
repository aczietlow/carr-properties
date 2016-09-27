<?php
//roor/cms/register.php
//http://tinsology.net/2009/06/creating-a-secure-login-system-the-right-way/
$showForm=true;
$err="";
var_dump($server = ini_get("mysql.default_host"));
if(isset($_POST["submit"]))
{
	$showForm=false;
	$userName = $_POST['username'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	if(empty($userName)||empty($pass1)||empty($pass2))
	{
		$showForm=true;
		$err=$err.'<div class="error"> Empty field(s)</div>';
	}
	if($pass1 != $pass2)
	{
		$err = $err.'<div class="error"> Passwords dont match </div>';
		$showForm=true;
	}
	    
	if(strlen($userName) > 30)
	{
		$err = $err. '<div class="error"> Username is too long </div>';
		$showForm=true;
	}
	
	$hash = hash('sha256', $pass1);
	//creates a 3 character sequence
	function createSalt()
	{
	    $string = md5(uniqid(rand(), true));
	    return substr($string, 0, 3);
	}
	$salt = createSalt();
	$hash = hash('sha256', $salt . $hash);
	
	
	//connect to db
	/*
	$dbhost = 'localhost';
	$dbname = 'tinsology';
	$dbuser = 'tinsley';
	$dbpass = 'myrealpassword'; //not really
	*/
	$dbhost = 'localhost';
	$dbname = 'carr-p';
	$dbuser = 'root';
	$dbpass = 'qwer4321'; //not really
	$conn = mysql_connect("$dbhost", "$dbuser", "$dbpass");
	mysql_select_db($dbname, $conn);
	//sanitize username
	$userName = mysql_real_escape_string($userName);
	$query = "INSERT INTO users ( username, password, salt )
	        VALUES ( '$userName' , '$hash' , '$salt' );";
	//mysql_query($query);
	mysql_close();
	echo "q = ".$query;//echo"\n<br />\n";//echo"username = $userName";
	//header('Location: main_login.php');
	
}
if($showForm)
{
	if(!empty($err))
	{
		echo "<br />\n"."Errors\n <br> \n".$err;
	}
?>
<br />
<form name="register" action="<?php  echo $_SERVER["PHP_SELF"]; ?>" method="post"><br />
    Username: <input type="text" name="username" maxlength="30" /><br />
    Password: <input type="password" name="pass1" /><br />
    Password Again: <input type="password" name="pass2" /><br />	
    <input name="submit" type="submit" value="Register" /><br />
</form>
<?php 
}
?>