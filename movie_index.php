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
		<title>Movie Database</title>
	</head>
	<body>
		<div>
			<h2>Today's Movie</h2>(Random recommend 5 movies)
		</div>
		<div>
			<ul>
				<li><a href="simple_index.php"><h3>Main menu</h3></a></li>
				<li><a href="movie_add.php">
					<h3>Add Movie Info</h3>
				</a></li>
				<li>
					<h3>Query</h3>
					<form action="movie_query.php" method="get">
						<input type="varchar" name="search" placeholder="Search">
						<input type="submit" name="button" value="submit">
					</form>
				</li>
			</ul>
		</div>
	</body>
</html>