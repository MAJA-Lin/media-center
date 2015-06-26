<?php
	include_once("my_func.php");
	start_without_error();
	//start_error();

	$movie = $_COOKIE['Movie_query'];
	//$movie = json_decode(base64_decode($movie));
	$movie = json_decode($movie,true);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Movie Query</title>
	</head>
	<body>
		<div>
			<h1>Movie Query</h1>
			<h4>
			<?php
					$i = 0;
					//var_dump($movie);

					while($i < count($movie)) {
						echo "<li><h3>".$movie[$i]['eng_name']."\t".$movie[$i]['cht_name']."</h3>".$movie[$i]['ryear']."</li>";
						//var_dump($movie[$i]);
						$i++;

					}
			?>
			</h4>
		</div>
		<div>
			<ul>
				<li><a href="movie_index.php">
					<h3>Movie index</h3>
				</a></li>
				<li><a href="simple_index.php">
					<h3>Main menu</h3>
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