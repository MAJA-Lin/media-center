<?php
	include_once("my_func.php");
	start_without_error();
	login_check($_COOKIE['login_chk']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Add Book</title>
	</head>
	<body>
		<div><h2>Add Book</h2></div>
		<div>
			<ul>
				<li>
					<form action="book_update.php" method="get">
						Book name: <input type="varchar" name="book_cht_name" placeholder="in Chinese" /><br>
						Original Title: <input type="varchar" name="book_original_name" placeholder="in English or so on...." /><br>
						ISBN: <input type="varchar" name="isbn" /><br>
						Author: <input type="varchar" name="author" /><br>
						Purchased date: <input type="date" name="purchased_date" /><br>
						Purchased way: <input type="varchar" name="purchased_way" /><br>
						Price: <input type="int" name="price" /><br>
						tag: <input type="varchar" name="tag" /><br>
						Description: <textarea rows="3" cols="50" name="description" placeholder="comment here"></textarea><br>
						<input type="hidden" name="update_check" value="insert">
						<input type="submit" name="button" value="submit" /><br>
					</form>
				</li>
				<li><a href="books_index.php">
					<h3>Book Menu</h3>
				</a></li>
				<li><a href="simple_index.php">
					<h3>Main Menu</h3>
				</a></li>
			</ul>
		</div>
	</body>
</html>