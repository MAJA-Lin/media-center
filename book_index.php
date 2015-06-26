<?php

	include_once("my_func.php");
	start_without_error();
	include_once("book_random.php");
	include_once("book_func.php");

	$random = $_COOKIE['random'];
	$random = json_decode($random, true);
	$i = 0;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Books</title>
	</head>
	<body>
		<div>
			<h1>Books</h1>
		</div>
		<div>
			<h2>Choice</h2>
			<li><?php book_profile( $random[$i] ); $i++; ?></li>
			<li><?php book_profile( $random[$i] ); $i++; ?></li>
			<li><?php book_profile( $random[$i] ); $i++; ?></li>
		</div>
		<div>
			<form action="book_query.php" method="get">
				<input type="varchar" name="search" placeholder="Search">
				<input type="submit" name="button" value="submit">
			</form>
			<a href="book_progress.php">
				<h2>What am I reading?</h2>
			</a>
			<a href="book_add.php">
				<h2>Add Books</h2>
			</a>
			<a href="simple_index.php">
				<h2>Main Menu</h2>
			</a>
		</div>
	</body>
</html>