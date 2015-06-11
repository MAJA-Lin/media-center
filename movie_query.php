<?php
	session_start();
	include_once("mysql_connect.inc.php");
	include_once("my_func.php");


	$search = $_GET['search'];
	$sql = "SELECT * FROM movie_info WHERE movie_Eng_name LIKE '%$search%' OR movie_Cht_name LIKE '%$search%' OR release_year LIKE '%$search%'";
	$result = mysqli_query($link,$sql);

	while($row = mysqli_fetch_array($result)) {
		var_dump($row);
	}











?>
