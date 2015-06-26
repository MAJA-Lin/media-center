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
	<title>Book Profile</title>
</head>
<body>
	<div>
		<ui>
			<li><a href="book_index.php"><h3>Book index</h3></a></li>
		</ui>
	</div>
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
			<li><a href="#">Update books profile</a></li>
			<li><a href="#">Write new comment</a></li>
		</ui>
	</div>
	<div>
		<form action="book_query.php" method="get">
			<input type="varchar" name="search" placeholder="Search">
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