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
		<title>Simple Index</title>
	</head>
	<body>
		<div>
			<h2>Welcome! <?php echo $_SESSION['userid']; ?></h2>
		</div>
		<div>
			<ul>
				<li><a href="user_profile.php">
					<h3>User Profile</h3>
				</a></li>
				<li><a href="logout.php">
					<h3>Sign Out</h3>
				</a></li>
				<li><a href="movie_index.php">
					<h3>Movie Database</h3>
				</a></li>
				<li><a href="#">
					<h3>Book Database</h3>
				</a></li>
				<li><a href="#">
					<h3>HardDrive Database</h3>
				</a></li>
			</ul>
		</div>
	</body>
</html>