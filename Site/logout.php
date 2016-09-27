<?php
function logout()
{
    $_SESSION = array(); //destroy all of the session variables
    session_destroy();
}
session_start();
logout();
header('location:index2.php');
?>