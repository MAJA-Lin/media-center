<?php
	session_start();
	include_once("mysql_connect.inc.php");
	include_once("my_func.php");


	$search = $_GET['search'];
	$sql = "SELECT * FROM movie_info WHERE movie_Eng_name LIKE '%$search%' OR movie_Cht_name LIKE N'%$search%' OR release_year LIKE '%$search%'";
	$result = mysqli_query($link,$sql);
	$i = 0;

	ob_start();

	while($row = mysqli_fetch_array($result)) {
		//var_dump($row);

		/*
		*Here can use for and $array_query[$i][$j] = $row[$j] to set value (NUM).
		*But I use ASSOC instead to improve readability.
		*
		*And here can simply modified to  $array_query[$i] = $row
		*See the detail in book_random.php
		*/
		$array_query[$i]['movie_no'] = $row['movie_no'];
		$array_query[$i]['cht_name'] = $row['movie_Cht_name'];
		$array_query[$i]['eng_name'] = $row['movie_Eng_name'];
		$array_query[$i]['score'] = $row['imdbScore'];
		$array_query[$i]['bd_date'] = $row['bd_date'];
		$array_query[$i]['drive'] = $row['drive'];
		$array_query[$i]['size'] = $row['size'];
		$array_query[$i]['desc'] = $row['description'];
		$array_query[$i]['ryear'] = $row['release_year'];
		$array_query[$i]['image'] = $row['image'];

		var_dump($array_query[$i]);
		$i++;
	}

	if(isset($array_query)) {
		//$array_query = base64_encode(json_encode($array_query));

		$array_query = json_encode($array_query);
		setcookie("Movie_query", $array_query, time()+3600 );
		ob_end_flush();
		js_alert("jump","movie_query_result.php");
	}
	else {
		$array_query[$i]['movie_no'] = null;
		$array_query[$i]['cht_name'] = null;
		$array_query[$i]['eng_name'] = null;
		//$array_query = base64_encode(json_encode($array_query));
		$array_query = json_encode($array_query);
		setcookie("Movie_query", $array_query, time()+3600 );
		js_alert("null!","movie_query_result.php");
	}



?>
