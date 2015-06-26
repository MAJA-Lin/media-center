<?php

	include_once("mysql_connect.inc.php");
	include_once("my_func.php");

	$isbn = $books['isbn'];

	$sql = "SELECT * FROM books_comment WHERE isbn = '$isbn'";
	$result = mysqli_query($link, $sql);
	$i = 0;

	while($row = @mysqli_fetch_array($result)) {

		$array_comment[$i]=$row;
		//var_dump($array_random[$i]);
		$i++;
	}

	if(!isset($array_comment)) {

		$array_comment = array(
			"SID" => null,
			"isbn" => $isbn,
			"comment" => null,
			"score" => null
		);

	}

	$array_comment = json_encode($array_comment);
	setcookie("comment", $array_comment, time()+3600 );
	$_COOKIE['comment'] = $array_comment;


	/*
	*The subfuncion which can show the book comment.
	*
	*/

	Function book_comment_detail($comment) {

		$i = 0;

		if(isset($comment)) {

			/*
			*To verify if the array is multidimensional or not.
			*/
			if( count($comment) == count($comment, COUNT_RECURSIVE)) {
				/*
				*If the array is not multidimensional, then do the print here.
				*And check SID to print "No Comment".
				*/
				if($comment['SID'] == null) {
					echo "<h2>No comment. How about add some comment?</h2>";
				}
				else {
					echo "Score: ".$comment['score']."<br>Comment: ".$comment['comment']."<br>";
				}
			}

			/*
			*If the array is multidimensional, do normally print and the counter $i will work.
			*/
			else {
				while( $i < count($comment) ) {
					echo "Score: ".$comment[$i]['score']."<br>Comment: ".$comment[$i]['comment']."<br>";
					$i++;
				}
			}
		}
		else {
			echo "<h2>No comment. How about add some comment?</h2>";
		}

		var_dump($comment);
	}








?>