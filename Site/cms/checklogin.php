
<?php
function validateUser()
{
    session_regenerate_id (); //this is a security measure
    $_SESSION['valid'] = 1;
    //$_SESSION['userid'] = $userid;
}
var_dump($_POST);echo"<br />\n\n<br />";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
//connect to the database here
	$dbhost = 'localhost';
	$dbname = 'carr-p';
	$dbuser = 'root';
	$dbpass = 'qwer4321'; //not really
	$conn = mysql_connect("$dbhost", "$dbuser", "$dbpass");
	mysql_select_db($dbname, $conn);
$username = mysql_real_escape_string($username);
$query = "SELECT password, salt
        FROM users
        WHERE username = '$username';";
$result = mysql_query($query);
if(mysql_num_rows($result) < 1) //no such user exists
{
    //header('Location: main_login.php');
    //var_dump($_POST);
	echo "no such user exist";
}
else 
{
	$userData = mysql_fetch_array($result, MYSQL_ASSOC);
	$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
	if($hash != $userData['password']) //incorrect password
	{
	    //header('Location:index2.php');
	    //var_dump($_POST);
	    echo"Incorrect Password";
	}
	else 
	{
		validateUser();
		//var_dump($_SESSION);
		header('Location:index.php');
		
		//echo '<a href="index2.php">Home</a>';
		
	}
}

//All this came from SnoCap
//TODO: FIX IT!
/* 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="members"; // Table name 
*/
/*
$host="db368844496.db.1and1.com"; // Host name 
$username="dbo368844496"; // Mysql username 
$password="jogabonito_1&1"; // Mysql password 
$db_name="db368844496"; // Database name 
$tbl_name="mambers"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect aarrrggghhhhh"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword"); 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
*/
?>