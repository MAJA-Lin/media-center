<?php
	include_once("my_func.php");
	include_once("mysql_connect.inc.php");

	/*
	$cname = trim($_GET['cht_name']);
	$ename = trim($_GET['eng_name']);
	$ryear = $_GET['release_year'];
	$bd_date = $_GET['bd_date'];
	$drive = $_GET['drive'];
	$size = $_GET['size'];
	$desc = trim($_GET['description']);
	*/
	//Trim the space out first!!

	$check = $_GET['update_check'];
	$array_cookie = array(
		"cht_name" => trim($_GET['cht_name']),
		"eng_name" => trim($_GET['eng_name']),
		"ryear" => trim($_GET['release_year']),
		"bd_date" => trim($_GET['bd_date']),
		"drive" => trim($_GET['drive']),
		"size" => trim($_GET['size']),
		"desc" => trim($_GET['description']),
		"score" => trim($_GET['imdbScore']),
	);

	if( $check == 'insert') {

		//Add N before the var in unicode so that the sql action will work fine.
		$sql = "SELECT * FROM movie_info WHERE movie_Cht_name= N'$array_cookie[cht_name]' OR movie_Eng_name='$array_cookie[eng_name]'";
		$result = mysqli_query($link,$sql);
		$row = @mysqli_fetch_array($result);


		if( ($row['movie_Eng_name'] == $array_cookie['eng_name'] || $row['movie_Cht_name'] == $array_cookie['cht_name'])
				&& ( isset($row['movie_Eng_name']) || isset($row['movie_Cht_name'])) ) {
			js_alert("The movie already exists in the database","movie_add.php");
		}

		elseif ( empty($_GET['cht_name']) && empty($_GET['eng_name']) ) {
			js_alert("Name of the movie cannot be empty!","movie_add.php");
		}

		else {

			if( empty($array_cookie['ryear'])){
				/*
				*The release year of the first movie in history,"L'arrivée d'un train à La Ciotat",is 1895.
				*So make default ryear 1895.
				*/
				$array_cookie['ryear'] = "1895";
			}

			//$sql2 = "SELECT MAX(movie_no) FROM movie_info WHERE movie_no LIKE '$ryear%'";
			/*
			*For some reason, I cannot use SELECT MAX() to search the maximum.
			*So I use ORDER BY instead.
			*/
			$sql_max = "SELECT movie_no FROM movie_info WHERE movie_no LIKE '$array_cookie[ryear]%' ORDER BY movie_no DESC LIMIT 1";
			$result_max = mysqli_query($link,$sql_max);
			$row_max = @mysqli_fetch_array($result_max);

			//echo "This is $row_max:".$row_max['movie_no'];

			//Here, generate 'movie_no' automatically with release year

			if ( isset($row_max['movie_no'])) {
				$array_cookie['movie_no'] = $row_max['movie_no'] + 1;
				echo "Max + 1<br>";
				echo $array_cookie['movie_no'];

			}
			else {
				$array_cookie['movie_no'] = $array_cookie['ryear'].'0001';
				echo "Hey, new year and 1895 here.<br>";
				echo $array_cookie['movie_no'];
			}

			/*
			*Old version.
			*/
			/*
			$sql_insert = "INSERT INTO movie_info (movie_no, movie_Cht_name, movie_Eng_name, release_year, bd_date, drive, size, description) 
				VALUES ('{$array_cookie["new_movie_no"]}', '{$array_cookie["cname"]}', '{$array_cookie["ename"]}','{$array_cookie["ryear"]}',
							'{$array_cookie["bd_date"]}', '{$array_cookie["drive"]}', '{$array_cookie["size"]}', '{$array_cookie["desc"]}')";
			$result_insert = mysqli_query($link, $sql_insert);
			*/

			/*
			*Here is the Prepared Statements version
			*Object oriented style
			*/
			$sql_insert = $link->prepare("INSERT INTO movie_info (movie_no, movie_Cht_name, movie_Eng_name, release_year, bd_date, drive,
					size, imdbScore, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$sql_insert -> bind_param('ississdds', $movie_no, $cht_name, $eng_name, $ryear, $bd_date, $drive, $size, $score, $desc);

			$movie_no = $array_cookie['movie_no'];
			$cht_name = $array_cookie['cht_name'];
			$eng_name = $array_cookie['eng_name'];
			$ryear = $array_cookie['ryear'];
			$bd_date = $array_cookie['bd_date'];
			$drive = $array_cookie['drive'];
			$size = $array_cookie['size'];
			$score = $array_cookie['score'];
			$desc = $array_cookie['desc'];

			$sql_insert -> execute();

			var_dump($array_cookie);

			$array_cookie = base64_encode(json_encode($array_cookie));
			setcookie("Movie", $array_cookie, time()+3600 );
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