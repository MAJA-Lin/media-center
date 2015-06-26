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

		if (isset($row['book_cht_name'])) {
			echo "<a href=\"books_profile.php?".http_build_query(array('books' => $row))."\"><h3>".$row['book_cht_name']."</h3></a>";
		}
		else {
			echo "<a href=\"books_profile.php?".http_build_query(array('books' => $row))."\"><h3>".$row['book_original_name']."</h3></a>";
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






?>