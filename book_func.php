<?php

	/*
	*This is func to echo book names with Hyperlink.
	*Which means your can see and click on it.
	*
	*/
	Function book_profile($row) {

		/*
		*Default setting is showing the chinese book name. If the name is null, show original title instead.
		*/

		//The following variable pass is based on AJAX.
		/*
		if (isset($row['book_cht_name'])) {
			echo "<a href=\"books_profile.php\" onclick=\"book_porefile_redir(".$row.")\"><h3>".$row['book_cht_name']."</h3></a>";
		}
		else {
			echo "<a href=\"books_profile.php\" onclick=\"book_porefile_redir(".$row.")\"><h3>".$row['book_original_name']."</h3></a>";
		}
		*/

		//This is pass var using http_build_query
		if ($row['book_cht_name'] == null && $row['book_original_name'] == null ) {
			echo "<h3>No data</h3>";
		}
		else {
			if (isset($row['book_cht_name'])) {
				echo "<a href=\"book_profile.php?".http_build_query(array('books' => $row))."\"><h3>".$row['book_cht_name']."</h3></a>";
			}
			else {
				echo "<a href=\"book_profile.php?".http_build_query(array('books' => $row))."\"><h3>".$row['book_original_name']."</h3></a>";
			}
		}


	}

	Function echoname($row) {

		if (isset($row['book_cht_name'])) {
			echo $row['book_cht_name'];
		}
		else {
			echo $row['book_original_name'];
		}
	}

	/*
	*To pass variable (book name, auther name...and so on)
	*/
	Function book_profile_redir($row) {

		$_GET['book'] = $row;
		return $_GET['book'];
	}

	/*
	*To show the comleted infomation of books
	*
	*/
	Function book_detail($books) {

		if (isset($books['book_cht_name'])) {
			echo "<li><h2>Title: ".$books['book_cht_name']."</h2>";

			if (isset($books['book_original_name'])) {
				echo "<li><h3>Original Title: ".$books['book_original_name']."</h3></li></li>";
			}
			else {
				echo "</li>";
				var_dump($books);
			}
		}
		else {
			echo "<li><h2>".$books['book_original_name']."</h2></li>";
		}

		/*
		echo "Author: ".$books['author'];
		echo "Tag: ".$books['tag1']." ".$books['tag2']." ".$books['tag3']." ".$books['tag4']." ".$books['tag5'];
		echo "Purchased date".$books['purchased_date']."Price: ".$books['price']." Purchased way: ".$books['purchased_way'];
		echo "Plot: ".$books['description'];
		*/
		var_dump($books);
	}

	Function book_query_detail ($row) {

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

		if ($row['book_cht_name'] == null && $row['book_original_name'] == null ) {
			echo "<h3>No data</h3>";
		}
		else {
			if (isset($row['book_cht_name'])) {
				echo "<a href=\"book_query_result_detail.php?".http_build_query(array('books' => $row))."\"><h3>".$row['book_cht_name']."</h3></a>";
			}
			else {
				echo "<a href=\"book_query_result_detail.php?".http_build_query(array('books' => $row))."\"><h3>".$row['book_original_name']."</h3></a>";
			}
		}

	}




?>