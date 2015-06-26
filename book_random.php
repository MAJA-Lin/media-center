<?php

	include_once("mysql_connect.inc.php");
	include_once("my_func.php");

	$sql = "SELECT * FROM books_info ORDER BY RAND() LIMIT 3";
	$result = mysqli_query($link, $sql);
	$i = 0;

	while($row = mysqli_fetch_array($result)) {

		$array_random[$i]=$row;
		//var_dump($array_random[$i]);
		$i++;
	}

	if(isset($array_random)) {

		//$array_random = base64_encode(json_encode($array_random));
		$array_random = json_encode($array_random);
		setcookie("random", $array_random, time()+3600 );
		$_COOKIE['random'] = $array_random;
	}

?>