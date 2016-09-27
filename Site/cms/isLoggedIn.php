<?php
function isLoggedIn()
{
    if(isset($_SESSION['valid']))
        return true;
    return false;
}
?>