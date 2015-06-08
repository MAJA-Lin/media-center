<?php
	session_start();
	include_once("mysql_connect.inc.php");
	include_once("my_func.php");

	$userid = $_SESSION['userid'];
	$current_pw = $_SESSION['password'];

	//regular expression, to check the pw ( 4-12 digits, alphabets and numbers only)
	$std_pw = "/^[a-zA-Z0-9]{3,11}+$/";


	$old_pw = $_POST['old_password'];
	$new_pw = $_POST['new_password'];
	$new_pw2 = $_POST['new_password2'];

	if( $old_pw == $current_pw && $new_pw == $new_pw2) {

		if(!preg_match($std_pw, $new_pw)) {
			js_alert("Error! Password should be 4 - 12 length, alphabets & numbers","user_profile.php");
		}
		else {
			$sql = "UPDATE user SET password = '$new_pw' WHERE userid = '$userid'";
			$result = mysqli_query($link, $sql) or die("Error in the consult.." . mysqli_error($link));
			$_SESSION['password'] = $new_pw;
			js_alert("Password updated successful!","user_profile.php");
		}
	}
	elseif ($new_pw != $new_pw2) {
		js_alert("Password should be as same as your typed before!", "user_profile.php");
	}
	else {
		js_alert("Your current password is wrong!", "user_profile.php");
	}

?>