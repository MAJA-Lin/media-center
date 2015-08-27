<?php
	include_once("my_func.php");
	//start_without_error();
	start_error();
	include_once("book_func.php");
	$books = $_GET['books'];
	include_once("book_comment.php");

	$comment = $_COOKIE['comment'];
	$comment = json_decode($comment, true);
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echoname($books); ?></title>
</head>
<body>
	<div id="profile">
		<?php
			book_detail($books);
			book_comment_detail($comment);
		?>
	</div>
	<div id="comment">
		<!-- -->
	</div>
	<div>
		<ui>
			<li><a href="#"><h2>Update books profile</h2></a></li>
			<li><a href="#"><h2>Write new comment</h2></a></li>
		</ui>
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
		<a href="book_index.php">
			<h2>Book index</h2>
		</a>
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