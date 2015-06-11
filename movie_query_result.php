<?php
	session_start();
	include_once("my_func.php");
	ini_set( "display_errors", 0);
	login_check($_COOKIE['login_chk']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Movie Query</title>
</head>
<body>
	<div><h2>Movie Query</h2></div>
</body>
</html>