<!--Session Start should be on the top of page-->
<?php
	session_start();
	include_once("mysql_connect.inc.php");
	include_once("my_func.php");
	//ini_set( "display_errors", 0);
	$userid = $_POST['userid'];
	$pw = $_POST['password'];

	$sql= "SELECT * FROM user WHERE userid = '$userid'";
	$result = mysqli_query($link, $sql);
	$row = @mysqli_fetch_array($result);

	if($userid != null && $pw != null && $row['userid'] == $userid && $row['password'] == $pw) {
		$_SESSION['userid'] = $row['userid'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['status'] = $row['user_level'];

		//Save other data into cookies
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['last_name'] = $row['last_name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['address'] = $row['address'];

		if ($row['user_level'] == "admin") {
			setcookie("login_chk", "admin", time()+3600);
		}
		else {
			setcookie("login_chk", "normal", time()+3600);
		}

		//Or just send $_GET[msg] to the index
		/*
		echo "Login Successfully!";
		echo "<a href=\"javascript:history.back()\">返回</a>";
		*/
		js_alert("Login Successfully!", "simple_index.php");
		exit();
	}
	else {
		//Or just send $_GET[msg] to the index
		/*
		echo "Login Failed!";
		echo "<a href=\"javascript:history.back()\">返回</a>";
		*/
		js_alert("Login Failed!", "before_index.html");
		exit();
	}
?>
<!--
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<body>
		//PHP here
	</body>
</html>
-->
