<?php

/*
 * (C) Copyright 2008 BestWebForms.com
 * For information visit http://www.bestwebforms.com/
 * All rights reserved. Used only by permission under license agreement.
 */

session_start();
session_unset();
session_destroy();

header("Location: loginbwf.php");
exit;

?>