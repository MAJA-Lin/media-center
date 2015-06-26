<?php
	include_once("my_func.php");
	//start_without_error();
	start_error();
	include_once("book_func.php");
	$books = $_GET['books'];
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
			<li><a href="simple_index.php"><h3>Main menu</h3></a></li>
		</ui>
	</div>
	<div id="profile">
		<?php
			book_detail($books);
			//book_comment($books);
		?>
	</div>
	<div>
		<ui>
			<li><a href="#">Add books</a></li>
			<li><a href="#">Update Book Mark</a></li>
			<li><a href="#">Update book info</a></li>
			<li><a href="#">Write new comment</a></li>
			<li><form action="book_query.php" method="get">
				<input type="varchar" name="search" placeholder="Search">
				<input type="submit" name="button" value="submit">
			</form></li>
		</ui>
	</div>
</body>
</html>