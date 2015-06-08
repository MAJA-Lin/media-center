<?php
	session_start();
	session_unset();
	session_destroy();
	// set the expiration date to one hour ago
	setcookie("login_chk", "", time()-3600);
	include_once("my_func.php");
	include("mysql_connect.inc.php");
	mysqli_close($link);
	js_alert("Log out successfully!","before_index.html");

?>