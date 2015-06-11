<?php
	include_once("my_func.php");
	ini_set( "display_errors", 0);
	login_check($_COOKIE['login_chk']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Movie Datebase : Add new movie</title>
	</head>
	<body>
		<div><h2>Movie Datebase : Add new movie</h2></div>
		<div>
			<ul>
				<li>
					<form action="movie_update.php" method="get">
						Movie name: <input type="varchar" name="eng_name" placeholder="in English" /><br>
						Movie name: <input type="varchar" name="cht_name" placeholder="in Chinese" /><br>
						Release year: <input type="year" name="release_year" /><br>
						Blu-ray released date: <input type="date" name="bd_date" /><br>
						IMDb score: <input type="float" name="imdbScore" /><br>
						Drive: <input type="varchar" name="drive" /><br>
						size: <input type="float" name="size" /><br>
						Description: <textarea rows="3" cols="50" name="description" placeholder="comment here"></textarea><br>
						<input type="hidden" name="update_check" value="insert">
						<input type="submit" name="button" value="submit" /><br>
					</form>
				</li>
				<li><a href="movie_index.php">
					<h3>Movie Database Menu</h3>
				</a></li>
				<li><a href="simple_index.php">
					<h3>Main Menu</h3>
				</a></li>
			</ul>
		</div>
	</body>
</html>