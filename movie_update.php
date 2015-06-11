<?php
	include_once("my_func.php");
	include_once("mysql_connect.inc.php");

	$check = $_GET['update_check'];
	$cname = trim($_GET['cht_name']);
	$ename = trim($_GET['eng_name']);
	$ryear = $_GET['release_year'];
	$bd_date = $_GET['bd_date'];
	$drive = $_GET['drive'];
	$size = $_GET['size'];
	$desc = trim($_GET['description']);
	//Trim the space out first!!

	$array_cookie = array(
		"cname" => trim($_GET['cht_name']),
		"ename" => trim($_GET['cht_name']),
		"ryear" = $_GET['release_year'],
		"bd_date" = $_GET['bd_date'],
		"drive" = $_GET['drive'],
		"size" = $_GET['size'],
		"desc" = trim($_GET['description']),
	);

	if( $check == 'insert') {

		$sql = "SELECT * FROM movie_info WHERE movie_Cht_name='$cname' OR movie_Eng_name='$ename'";
		$result = mysqli_query($link,$sql);
		$row = @mysqli_fetch_array($result);


		if( ($row['movie_Eng_name'] == $ename || $row['movie_Cht_name'] == $cname) && ( isset($row['movie_Eng_name']) || isset($row['movie_Cht_name'])) ) {
			js_alert("The movie already exists in the database","movie_add.php");
		}

		elseif ( empty($_GET['cht_name']) && empty($_GET['eng_name']) ) {
			js_alert("Name of the movie cannot be empty!","movie_add.php");
		}

		else {

			if( empty($ryear)){
				/*
				*The release year of the first movie in history,"L'arrivée d'un train à La Ciotat",is 1895.
				*So make default ryear 1895.
				*/
				$ryear = "1895";
			}

			//$sql2 = "SELECT MAX(movie_no) FROM movie_info WHERE movie_no LIKE '$ryear%'";
			/*
			*For some reason, I cannot use SELECT MAX() to search the maximum.
			*So I use ORDER BY instead.
			*/
			$sql_max = "SELECT movie_no FROM movie_info WHERE movie_no LIKE '$ryear%' ORDER BY movie_no DESC LIMIT 1";
			$result_max = mysqli_query($link,$sql_max);
			$row_max = @mysqli_fetch_array($result_max);

			echo "This is $row_max:".$row_max['movie_no'];

			//Here, generate 'movie_no' automatically with release year

			if ( isset($row_max['movie_no'])) {
				$new_movie_no = $row_max['movie_no'] + 1;
				echo "Max + 1<br>";
				echo $new_movie_no;

			}
			else {
				$new_movie_no = $ryear.'0001';
				echo "Hey, new year and 1895 here.<br>";
				echo $new_movie_no;
			}

			$sql_insert = "INSERT INTO movie_info (movie_no, movie_Cht_name, movie_Eng_name, release_year, bd_date, drive, size, description) 
				VALUES ('$new_movie_no', '$cname', '$ename', '$ryear', '$bd_date, '$drive', '$size', '$desc')";
			$result_insert = mysqli_query($link, $sql_insert);

			setcookie();
			js_alert("Add successfully!","movie_profile.php");
		}
	}
	elseif($check == 'update') {
		echo "Dong!";
	}
	else {
		js_alert("Something went wrong!","movie_index.php");
	}
?>