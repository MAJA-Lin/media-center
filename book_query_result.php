<?php

	include_once("my_func.php");
	//start_without_error();
	start_error();
	include_once("book_func.php");
	$query = $_COOKIE['book_query'];
	$query = json_decode($query, true);
	//var_dump($query);
	$i = 0;

?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Query result</title>
	</head>
	<body>
		<div>
			<h1>Books query result</h1>
		</div>
		<div>
			<ul>
				<?php
					for ($i = 0; $i < count($query); $i++) {
						echo "<li>";
						//book_profile($query[$i]);
						book_query_detail($query[$i]);
						echo "</li>";
					}
				?>
			</ul>
		</div>
		<div>
			<form action="book_query.php" method="get">
				<input type="varchar" name="search" placeholder="Search books">
				<select id="type" name="type">
					<option value="book_name">Books name</option>
					<option value="author">Author name</option>
					<option value="purchased_year">Purchased date</option>
					<option value="isbn">ISBN</option>
				</select>
				<input type="submit" name="button" value="submit">
			</form>
			<a href="simple_index.php">
				<h2>Main Menu</h2>
			</a>
			<a href="book_index.php">
				<h2>Book index</h2>
			</a>

		</div>
	</body>
</html>