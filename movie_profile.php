<?php
	include_once("my_func.php");
	ini_set( "display_errors", 0);
	login_check($_COOKIE['login_chk']);
	$movie = $_COOKIE['Movie'];
	$movie = json_decode(base64_decode($movie));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Moive profile</title>
</head>
<body>
	<div>
		<ul>
			<li>
				<h2>Movie Name:</h2>
				<h3><?php
					var_dump($movie);
					echo "This is:".$movie["eng_name"]; ?></h3>
			</li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</body>
</html>