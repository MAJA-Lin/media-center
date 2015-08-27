<?php

	//include_once("my_func.php");
	/*
	*Sometimes the data of query is too large. To prevent such things happened,
	*fist I modify the query result I get in book_query.php ( select every column -> select name, isbn and author).
	*Here I will do one more sql query to get the full data.
	*
	*Cookie 裝不下太大筆的查詢資料(4096 byte的空間限制)，就算更改伺服器這邊的設定，也不代表使用者端的瀏覽器支援過大的cookie
	*因此，將原本book_query.php 所得資料限制只取name, isbn 跟 author;
	*在使用者點擊進入各別網頁時，再做一次sql query 以取得完整資料。
	*
	*/
	include_once("mysql_connect.inc.php");

	$books = $_GET['books'];


	//var_dump($books);
	$isbn = $books['isbn'];
	$sql = "SELECT * FROM books_info WHERE isbn = '$isbn'";
	$result = mysqli_query($link, $sql);

	if (!$result) {
	    printf("Error: %s\n", mysqli_error($link));
	    exit();
	}

	$array_result = mysqli_fetch_array($result);
	//var_dump($array_result);

	//ob_start();
	header('location: book_profile.php?'.http_build_query(array('books' => $array_result)));
	//ob_end_flush();



?>