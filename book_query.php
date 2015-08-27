<?php

	include_once("my_func.php");
	start_without_error();
	include_once("mysql_connect.inc.php");
	include_once("book_func.php");

	$search = $_GET['search'];
	$type = $_GET['type'];


	switch ($type) {
		case 'book_name':
			$sql = "SELECT book_cht_name, book_original_name, author, isbn
				FROM books_info WHERE book_original_name LIKE '%$search%' OR book_cht_name LIKE N'%$search%'";
			break;
		case 'author':
			$sql = "SELECT book_cht_name, book_original_name, author, isbn
				FROM books_info WHERE author LIKE N'%$search%'";
			break;
		case 'purchased_year':
			$sql = "SELECT book_cht_name, book_original_name, author, purchased_date, isbn FROM books_info WHERE purchased_date LIKE '%$search%'";
			break;
		case 'isbn':
			$sql = "SELECT book_cht_name, book_original_name, author, isbn FROM books_info WHERE isbn LIKE '%$search%'";
			break;
		default:
			# code...
			break;
	}

	$result = mysqli_query($link,$sql);
	$i = 0;
	ob_start();

	while($row = mysqli_fetch_array($result)) {

		$array_query[$i] = $row;
		//var_dump($array_query[$i]);
		$i++;
	}

	if(isset($array_query)) {
		//$array_query = base64_encode(json_encode($array_query));

		$array_query = json_encode($array_query);
		setcookie("book_query", $array_query, time()+3600 );
		$_COOKIE['book_query'] = $array_query;

		//echo "<br>Here is cookie ver.<br>";
		//var_dump($_COOKIE['book_query']);
		redir("book_query_result.php");
		//js_alert("wait", "book_query_result.php");
		ob_end_flush();
	}
	else {

		//$array_query = null;

		$array_query[$i]['book_cht_name'] = null;
		$array_query[$i]['book_original_name'] = null;
		$array_query[$i]['isbn'] = null;

		//$array_query = base64_encode(json_encode($array_query));
		$array_query = json_encode($array_query);
		setcookie("book_query", $array_query, time()+3600 );
		redir("book_query_result.php");
	}


?>